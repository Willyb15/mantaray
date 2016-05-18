<?php
	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);
	require_once'includes/head.php';
	require_once'includes/header.php';
?>
<body>
	<div class="col-sm-6 col-sm-offset-3">
		<div class="light-panel">
			<form action="register_process.php" method="post">
				<div class="form-group" >
					<label for="exampleInputPassword1">Name</label>
					<input type="text" class="form-control" id="real-name" name="realName" placeholder="John Doe">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">La R&eacute;sistance Username</label>
					<input type="text" name="username" class="form-control" id="username" placeholder="User Name">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Email Address</label>
					<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Super Secret Password</label>
					<input type="password" name="password" class="form-control" id="password1" placeholder="Password">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword2">Confirm Super Secret Password</label>
					<input type="password" name="password2"class="form-control" id="password2" placeholder="Confirm Password">
				</div>
				<button type="submit" class="btn btn-success">JOIN</button>
			</form>
		</div>
	</div>
</body>
<?php require_once 'includes/footer.php'; ?>