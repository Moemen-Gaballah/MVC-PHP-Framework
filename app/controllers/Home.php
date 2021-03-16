<?php 

class Home extends Controller {

	public function __construct($Controller, $action) {
		parent::__construct($Controller, $action);
	}
	
	public function indexAction(){
		$db = DB::getInstance();
		// $columns = $db->get_columns('contacts');
		$contacts = $db->find('contacts', [
			'conditions' => ['firstname = ?'],
			'bind' => ['mo\'men'],
			'order' => "firstname", 
			'limit' => 5
		]);

		dd($contacts);
		// $fields = [
		// 	'firstname' => 'mo\'men',
		// 	'lastname' => 'Essam',
		// 	'email' => 'moemenessam19@gmail.com'
		// ];

		// $contactsQ = $db->insert('contacts',$fields);
		// $contactsQ = $db->delete('contacts', 4);
		$contact = $db->query("SELECT * FROM contacts ORDER BY id")->first();
		dd($contact->email);
		$this->view->render('home/index');
	} // end of method indexAction 

}