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
