<?php
session_start();
require_once 'includes/meekrodb.2.3.class.php';
DB::$user = 'x';
DB::$password = 'x';
DB::$dbName = 'mantaray';
DB::$host ='127.0.0.1';
	
	if(!isset($_SESSION['username'])){
		print ("notLoggedIn");
	}else{
	$json_received = file_get_contents('php://input');
	$decoded_json = json_decode($json_received, true);
	$post_id = $decoded_json['idOfPost'];
	$vote_direction = $decoded_json['voteDirection'];
	// $poster_username = $decoded_json['username'];
	$did_vote = DB::query("SELECT * FROM votes WHERE username = %s AND pid = %i", $_SESSION['username'], $post_id);
	
		if(DB::count() != 0){
			//We found a record. This person has voted on this post before.
			//If they upvoted and have already upvoted...
			if(($vote_direction == 1) && ($did_vote[0]['voteDirection'] == 1)){
				print 'Already Voted!';
				exit;
			//if they downvoted and have already downvoted
			}else if(($vote_direction == -1) && ($did_vote[0]['voteDirection'] == -1)){
				print 'Already Voted!';
				exit;
			}else{
				DB::update('votes', array(
					'voteDirection' => $vote_direction
				), "username=%s", "pid=%i", $_SESSION['username'], $post_id);
			}
		}else{
			DB::insert('votes', array(
				'username' => $_SESSION['username'],	
				'voteDirection' => $vote_direction,
				'pid' => $post_id
			));
		}
		$total_votes = DB::query("SELECT SUM(voteDirection) AS voteTotal FROM votes WHERE pid =".$post_id);
		print json_encode(intval($total_votes[0]['voteTotal']));
	}
