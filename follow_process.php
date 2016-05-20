<?php
session_start();
require_once 'includes/meekrodb.2.3.class.php';
DB::$user = 'x';
DB::$password = 'x';
DB::$dbName = 'mantaray';
DB::$host ='127.0.0.1';
	
	if(!isset($_SESSION['username'])){
		print "notLoggedIn";
		exit;
	}else{
		$json_received = file_get_contents('php://input');
		$decoded_json = json_decode($json_received, true);
		$poster_username = $decoded_json['username'];
		$followMethod = $decoded_json['followMethod'];
		
		DB::insert('following', array(
			'follower' => $_SESSION['username'],
			'poster' => $poster_username
		));
		print 'success';
	}
?>