<?php
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);
	require_once'includes/head.php';
	require_once'includes/header.php';
	$all_posts = DB::query("SELECT * FROM posts");
?>
<body ng-controller="mantaController">
	<!-- 	<div id="main-wrapper">
			<div id="home">
					<div class="home-text">
							<p>Destroy The Unicorns</p>
					</div>
			</div>
	</div>
	<div id="mission" class="col-sm-8 col-sm-offset-2">
			<h1 class="our-mission">Our Mission</h1>
			<div class="mission-header">
				{{message}}
					
					<p>Welcome to the resistance against The Unicorn's plot for Total World Domination. We are aware of the Unicorn's sinister plan to subjugate the other Woodland Creatures into slavery while they sit back and eat carrots all day.<br>
						The Unicorns receive carte blanche to do whatever just because they have shiny rods pertruding from their head. SO WHAT they breathe fire! Doesn't mean they deserve all the super good jobs and better pay. What about The Unicorns audacity to ally with The Ninja Kitty's? Together they demanded everyone work on COLUMBUS DAY?!?! Are you kidding me, guy discovered The New World! <br>
					The time has come for the Unicorns reign to end. La R&eacute;sistance will unite other UNICORN HATERS to vent in a super safe setting. Sign up and share your hatred of The Unicorns. VIVE LA R&Egrave;SISTANCE!</p>
			</div>
	</div> -->
	<div id="post" class="col-sm-6 col-sm-offset-3 posts">
		<h1 class="recent-posts">Recent Posts</h1>
	</div>
	<div id="post" class="col-sm-6 col-sm-offset-3 posts">
		<?php if(isset($_SESSION['username'])): ?>
		<form action="post_process.php" method="post">
			<label for="post-text">State Your Case Against the Unicorns</label>
			<div class="form-group">
				<textarea id="post-text" name="postText"></textarea>
			</div>
			<button type="submit" class="btn btn-success">POST</button>
		</form>
		<?php else: ?>
		<h3>You must <a href="login.php">JOIN LA R&Egrave;SISTANCE</a> to post</h3>
		<?php endif; ?>
		
		<?php foreach($all_posts as $post): ?>
		<?php
			date_default_timezone_set('America/New_York');
			$timestamp_as_unix = strtotime($post['timeStamp']);
			$formatted_date = date('D F j, Y, h:i a', $timestamp_as_unix);
		?>
		<div class="individual-post text-center">
			<div id="<?php print $post['id'];?>" class="right-container">
				<div class="login-to-vote"></div>
				<div class="arrow-up vote-item" ng-click="processVote($event,1)">UP</div>
				<div class="vote-count vote-item"></div>
				<div class="arrow-down vote-item" ng-click="processVote($event, -1)">DOWN</div>
			</div>
			
			<div class="user"><?php print $post['username']; ?></div>
			<div class="date"><?php print $formatted_date; ?></div>
			<div class="text"><?php print $post['postText']; ?></div>
			
		</div>
		
		<?php endforeach; ?>
	</div>
</body>