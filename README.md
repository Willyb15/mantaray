###Yik Yak Clone
###Steps to setup virtual host with PHP
```
sudo /etc/hosts
//add what you want
127.0.0.1 local-mantaray.com
```
###Go into v-hosts config and update
```
sudo vi /etc/hosts/apache2/extra/httpd-vhosts.conf
```
```php
<VirtualHost *:80>
  ServerName local-mantaray.com
  DocumentRoot /Users/Bryant/Desktop/DigitalCrafts/unit4/mantaray

  <Directory "/Users/Bryant/Desktop/DigitalCrafts/unit4/mantaray">
    Allow from all
    Options +Includes +Indexes +FollowSymLinks
    AllowOverride all
    Require all granted
  </Directory>
</VirtualHost>
```
###Restart Apache
```
sudo apache ctl restart

/this one tests

sudo apchectl -t
```
###Include compass boilerplate
####Inside mqSQL created mantaray database
####Added POSTS, USERS, VOTES tables in mySQL
####Inside Users, setup username, password, and email fields to be send by register.php
###Configured a register.php page
####Created inputs inside a form tag. Form action="register.process.php"
```php
<form action="register_process.php" method="post">
		<div class="form-group" >
			<label for="exampleInputPassword1">Real Name</label>
			<input type="text" class="form-control" id="real-name" name="realName" placeholder="John Doe">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Username</label>
			<input type="text" name="username" class="form-control" id="username" placeholder="User Name">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Email Address</label>
			<input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" name="password" class="form-control" id="password1" placeholder="Password">
		</div>
		<div class="form-group">
			<label for="exampleInputPassword2">Confirm Password</label>
			<input type="password" name="password2"class="form-control" id="password2" placeholder="Confirm Password">
		</div>
		<button type="submit" class="btn btn-default">Register</button>
	</form>
</body>
<?php require_once 'includes/footer.php'; ?>
```
###Configured register_process.php to handle $_POST request coming from register.php
####Connect to mySQL
```php
require_once 'includes/meekrodb.2.3.class.php';
	DB::$user = 'x';
	DB::$password = 'x';
	DB::$dbName = 'mantaray';
	DB::$host = '127.0.0.1';
	DB::$error_handler = false; // since we're catching errors, don't need error handler
	DB::$throw_exception_on_error = true;	
```
####Check to see if the username is in the DB, if not proceed to next step. If username taken - cannot register
####Hash the password and insert information into mySQL.
####Add a Session Variable
```php
$result = DB::query("SELECT * FROM users where username = %s", $_POST['username']);
	if(!$result){
		$can_register = true;
	}else{
		$can_register = false;
	}
	if($can_register && ($_POST['password'] == $_POST['password2'])){
		//THey can register. Passwords are equal username not taken.
		$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		try{
			DB::insert('users', array(
				'username' => $_POST['username'],
				'password' => $hashed_password,
				'email' => $_POST['email'],
				'realName' => $_POST['realName']
			));
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['email'] = $_POST['email'];
			header('Location: index.php?welcome=yes');
			exit;
		}catch(MeekroDBException $e){
			header('Location: /register.php?error=yes');
			exit;
		}
	}else{
		header('Location: /register.php?error=usernameexists');
	}
```
###Setup a login.php page basically the same way as registration.php
###Configured a login_process.php basically the same as registration_process.php
###Added logout.php page that literally looks like this...
```php
<?php
session_start();
session_destroy();
require_once 'includes/head.php';
require_once 'includes/header.php';
	print '<h2>Thank you for your support in the Resistance of the Unicorns</h2>';
require_once 'includes/footer.php';
?>
```
###Added PHP to NavBar in header.php to display Sesssion
```php
<ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <?php 
          if(isset($_SESSION['username'])){
            print '<li>Welcome '.$_SESSION['username'].'</li>';
            print '<li><a href="post.php">Make a post</a></li>';
            print '<li><a href="logout.php">Logout</a></li>';
          }else{
            print '<li><a href="register.php">Register</a></li>';
            print '<li><a href="login.php">Login</a></li>';
          }        
        ?>
        <li><a href="#">Page 3</a></li> 
      </ul>
```



