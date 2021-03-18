<?php

class Restricted extends Controller {

	public function __construct($controller, $action) {
		parent::__construct($controller, $action);
	} // end of contstruct

	public function indexAction() {
		$this->view->render('restricted/index');
	} // end of method index

} // end of class restricted