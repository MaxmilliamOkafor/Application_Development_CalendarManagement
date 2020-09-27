<?php require_once( "session.php" );
 ?>
<?php require_once("db_connection.php");
 ?>
<?php require_once( "functions.php" );
 ?>
<?php require_once("validation.php");
 ?>

<?php
	$message = "";
  // Holds a message to send if a login fails
	$username = "";
 // For sticky form:

	if( $_SERVER['REQUEST_METHOD'] === 'POST' )
	{
		$required_fields = array( "username", "password" );

        validate_presences( $required_fields );


		$username = $_POST['username'];

		$password = $_POST['password'];

		#
		$user = login($username, $password);


		if( $user && empty($errors) )
		{
			$_SESSION["user_id"] 	= $user["USERNAME"];


			$_SESSION["first_name"] = $user["FIRSTNAME"];

			redirect("cal.php");
//change to calander
		}
		else $message = "<p class=\"error\">Incorrect Username/Password</p>";

}
?>
<!DOCTYPE html>
<html lang="en-gb">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="A books trading website for students">
		<meta name="viewport" content="width=device-with, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="shortcut icon" href="assets/images/marcus_play_book.ico">
		<link rel="stylesheet" href="assets/css/reset.css" type="text/css">
		<link rel="stylesheet" type="text/css" href="assets/css/logstyle.css">

		<style>
			.error {
				color: red;
				font-family: arial;
				font-size: 24px;
			}
		</style>

		<title>Login-Calander</title>
	</head>

	<body>
		<?php $errors = error(); ?>
        <?php echo form_errors( $errors ); ?>
		<div class="container">
		<img src="assets/images/user.png">

		<form action="login.php" method="post">
			<div class="form-input">
				<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Enter username">
			</div>
			<div class="form-input">
				  <input type="password" name="password" value="" placeholder="Enter password">
			</div>
			<?php echo $message . "<br><br>" ?>
			<input type="submit" name="Submit" value="Login" class="btn-login"><br>
				<a href="forgot.php">Forgot your password?</a><br>
				<a href="register.php">Sign up</a>
		</form>
		</div>
	</body>
	

</html>
<?php if(isset($connection)) { mysqli_close($connection); } ?>
