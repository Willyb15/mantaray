<?php
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);
	session_start();
	require_once'includes/head.php';
	require_once'includes/header.php';
?>
<body>
	<form action="login_process.php" method="post">
		<div class="form-group">
			<label for="exampleInputPassword1">Username</label>
			<input type="text" name="username" class="form-control" id="username" placeholder="User Name">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" name="password" class="form-control" id="password1" placeholder="Password">
		</div>

		<button type="submit" class="btn btn-default">Login</button>
	</form>
</body>
<?php require_once 'includes/footer.php'; ?>