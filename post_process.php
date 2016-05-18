<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();
	if(!isset($_SESSION['username'])){
		// you arent logged in goodbye
		header('Login: login.php');
		exit;
	}
	require_once 'includes/meekrodb.2.3.class.php';
	DB::$user = 'x';
	DB::$password = 'x';
	DB::$dbName = 'mantaray';
	DB::$host = '127.0.0.1';

	DB::insert('posts', array(
		'username' => $_SESSION['username'],
		'postText' => $_POST['postText']
	));
	header('Location: index.php?success');
?>


