<?php 

$con = mysqli_connect('127.0.0.1', 'root', '', 'advertisements');
mysqli_query($con, "SET NAMES 'utf8'");

session_start();
error_reporting(E_ERROR | E_PARSE);

function redirect($location = '/') {
	header('location: ' . $location);
	exit();
}

function logged_in_check() {
	if(!isset($_SESSION['logged_user'])) 
		redirect('/');
}

function return_answer($array) {
	echo json_encode($array);
	exit();
}

?>