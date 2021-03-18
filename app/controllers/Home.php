<?php 

class Home extends Controller {

	public function __construct($Controller, $action) {
		parent::__construct($Controller, $action);
	}
	
	public function indexAction(){
		$this->view->render('home/index');
	} // end of method indexAction 

}