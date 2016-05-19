<?php
session_start();
require_once 'includes/meekrodb.2.3.class.php';
DB::$user = 'x';
DB::$password = 'x';
DB::$dbName = 'mantaray';
DB::$host ='127.0.0.1';
	

	$json_received = file_get_contents('php://input');

	$decoded_json = json_decode($json_received, true);
	$post_id = $decoded_json['idOfPost'];
	$voteDirection = $decoded_json['voteDirection'];

	DB::insert('votes', array(	
	'username' => $_SESSION['username'],
	'voteDirection' => $voteDirection,
	'pid' => $post_id
		));

	print ('llll');
	// $total_votes = DB("SELECT SUM(voteDirection) FROM votes WHERE pid =".$post_id);
	// print json_encode('success');
	// 1. voteDirection
	// 2. post_id
	// 3. Who are they




	// print ($total_votes[0]['voteTotal']);

