<?php 

function dd($data) {
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
	die();
} // end function dd meaning die and dump;

function sanitize($dirty) {
	return htmlentities($dirty, ENT_QUOTES, 'UTF-8');
} // end of function sanitize 

function currentUser() {
	return Users::currentLoggedInUser();
} // end of function current User

function posted_values($post) {
	$clean_ary = [];
	foreach ($post as $key => $value) {
		$clean_ary[$key] = sanitize($value);
	}
	return $clean_ary;
}