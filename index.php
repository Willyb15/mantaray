<?php
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);
	require_once'includes/head.php';
	require_once'includes/header.php';
	$all_posts = DB::query("SELECT * FROM posts");
?>
<body>
	<div id="main-wrapper">
		<div id="home">
			<div class="home-text">
				<p>Defeat The Unicorn Army</p>
			</div>
		</div>
	</div>
	<div id="mission" class="col-sm-6 col-sm-offset-3">
		<h1>Our Misson</h1>
		<div class="mission-header">
			
			<p>We are the final resistance against The Unicorn Army's reign of Total World Domination. We, The Woodland Creatures, are totally sick and tired of The Unicorns receiving total carte blanche to do whatever they please! They can breathe fire? SO WHAT! I'm like totally great at things too! Just because they have shiny rods pertruding from their head doesn't mean they can have all the super good jobs and receive better pay. Then The Unicorns had the audacity to ally with The Ninja Kitty's and demand everyone work on COLUMBUS DAY?!?! Are you kidding me! Guy discovered The New World! This is when I'd had it and decided to form La R&eacute;sistance as a means for other UNICORN HATERS to vent and receive support from others in a safe setting. Please sign up and tell us a bit about the last time The Unicorns offended you. VIVE LA R&Egrave;SISTANCE!</p>
		</div>
	</div>
	<div id="post" class="col-sm-6 col-sm-offset-3 posts">
	<h1>Recent Posts</h1>
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
			<div class="user"><?php print $post['username']; ?></div>
			<div class="date"><?php print $formatted_date; ?></div>
			<div class="text"><?php print $post['postText']; ?></div>
			
		</div>
		
		<?php endforeach; ?>
	</div>
</body>