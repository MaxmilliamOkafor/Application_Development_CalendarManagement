<?php require_once("session.php"); ?>
<?php require_once( "db_connection.php" ) ?>
<?php require_once( "functions.php" ); ?>
<?php require_once( "validation.php" ); ?>

<?php
    // Get default form variables:
    $username   = "";
    $first_name = "";
    $last_name  = "";
    $password   = "";
    
    // Check if the form is coming from a post request:
    if( $_SERVER['REQUEST_METHOD'] === 'POST' )
    {
        $cancel = isset($_POST["cancel"]) ? $_POST["cancel"] : "";
        if( $cancel == "cancel" ) redirect( "index.php" );

        // select the required fields:
        $required_fields = array( "username",  "password" );
        validate_presences( $required_fields );

        if( !empty($errors) )
        {
            $_SESSION["errors"] = $errors;
        }
        // Get all the values
        $username   = escape( $_POST["username"]   );
        $password   = escape( $_POST["password"]   );
        $pass = encrypt_pass( $password );

        // Store in the database:
        $query = "INSERT INTO users(USERNAME, FIRSTNAME, LASTNAME, PASSWORD)";
        $query .="VALUES('{$username}','{$first_name}', '{$last_name}', '{$pass}' )";

        $result = mysqli_query( $connection, $query );
	
        if( $result && empty($errors) )
        {
            header( "Location:login.php" );
        }
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
        <!--link rel="stylesheet" href="assets/css/reset.css" type="text/css"-->
        <link rel="stylesheet" href="assets/css/register.css" type="text/css">

        <style>
            .error {
                color: red;
                text-align: center;
            }
        </style>

        <title>Signup - Books in bound</title>
    </head>
    <body>
        <?php #echo session_message()  ?>
        <?php $errors = error(); ?>
        <?php echo form_errors( $errors ); ?>
		
        <div id="container">
        <form action="register.php" method="POST" >
          
            <label for="a"><b>Username:</b></label>
            <input id="a" type="text" placeholder="Enter Username" name="username" value="<?php echo $username ?>"><br />

            <label><b>Password:</b></label>
            <input type="password" placeholder="Enter Password" name="password" ><br />

            <label><b>Repeat Password:</b></label>
            <input type="password" placeholder="Repeat Password" name="psw-repeat"><br />

            <p>By creating an account you agree to our <a href="privacy.html">Terms &#38; Privacy.</a></p>

            <div class="clearfix">
            <button name="cancel" value="cancel" class="cancelbtn">Cancel</button>
            <button name="submit" class="signupbtn">Sign Up</button>
            </div>
        </form>
        </div>
    </body>
</html>
