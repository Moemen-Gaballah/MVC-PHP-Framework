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
	} // end of login


} // end of controller