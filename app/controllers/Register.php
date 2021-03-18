<?php 

class Register extends Controller {
	public function __construct($controller, $action) {
		parent::__construct($controller, $action);
		$this->load_model('Users');
		$this->view->setLayout('default');
	} // end of construct

	public function loginAction() {
		$validation = new Validate();
		if($_POST) {
			// form validation 
			$validation->check($_POST, [
				'username' => [
					'display' => 'Username',
					'required' => true
				],
				'password' => [
					'display' => 'Password',
					'required' => true
				]

			]);
			if($validation->passed()) {
				$user = $this->UsersModel->findByUsername($_POST['username']);
				if($user && password_verify(Input::get('password'), $user->password)) {
					$remember = (isset($_POST['remember_me']) && Input::get('remember_me')) ? true : false;
					$user->login($remember);
					Router::redirect('');
				}else {
					$validation->addError("There is an error with your username or password.");
				}
			}
		}
		$this->view->displayErrors = $validation->displayErrors();
		$this->view->render('register/login');
	} // end of method login

	public function logoutAction() {
		if(currentUser()){
			currentUser()->logout();
		}
		Router::redirect('register/login');
	} // end of method logout 

	public function registerAction() {
		$validation = new Validate();
		$posted_values = ['username' => '', 'email' => '', 'password' => '', 'confirm' => ''];
		if($_POST) {
			$posted_values = posted_values($_POST);
			$validation->check($_POST, [
				'username' => [
					'display' => 'Username',
					'required' => true,
					'unique' => 'users',
					'min' => 4,
					'max' => 100
				],
				'email' => [
					'display' => 'Email',
					'required' => true,
					'unique' => 'users',
					'min' => 6,
					'max' => 100,
					'valid_email' => true
				],
				'password' => [
					'display' => 'Password',
					'required' => true,
					'min' => 5,
					'max' => 100
				],
				'confirm' => [
					'display' => 'Confirm Password',
					'required' => true,
					'matches' => 'password',
				]
			]);

			if($validation->passed()) {
				$newUser = new Users();
				$newUser->registerNewUser($_POST);
				Router::redirect('register/login');
			}
		}
		$this->view->post = $posted_values;
		$this->view->displayErrors = $validation->displayErrors();
		return $this->view->render('register/register');
	} // end of method register


} // end of controller