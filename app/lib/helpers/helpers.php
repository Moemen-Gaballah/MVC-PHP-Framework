<?php 

function dd($data) {
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
	die();
} // end function dd meaning die and dump;

function sanitize($dirty) {
	return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
}