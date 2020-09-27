<?php

    function redirect( $url )
    {
        header( "Location: " . $url );
    }

    function form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
		  $output .= "<div class=\"error\">";
		  $output .= "<h1>Please fix the following errors:</h1>";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
		    $output .= "<li>{$error}</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}

    function escape( $text )
	{
		global $connection;
		return mysqli_real_escape_string( $connection, $text );
	}

    function query_check( $result_set)
	{
        global $connection;
		if( !$result_set ) die( "database query failed. Error: " . mysqli_error($connection) );
	}

    function salt_pass( $length )
    {
        // Create a random MD5 sentence of 32 characters
        $rand_str = md5( uniqid(mt_rand(), true));

        // Make sure string is a valid base 64 encode:
        $base64_str = base64_encode( $rand_str );

        // Replace all + with - returned by base 64
        $final_str  = str_replace( '+', '.', $base64_str );

        // Trancate string to correct Length:
        $salt = substr( $final_str, 0, $length );

        return $salt;
    }

    function encrypt_pass( $pass )
    {
        $format = "$2y$10$"; // Blowfish format with cost of 10:

        $salt_len = 22;
        $salt = salt_pass( $salt_len );

        $both = $format . $salt;
        $hashed_pass = crypt( $pass, $both );

        return $hashed_pass;
    }

    function password_check( $password, $existing_hash )
    {
        // Existing hash contains format and salt at start:
        $hash = crypt( $password, $existing_hash );
        if( $hash === $existing_hash ) return true;
        else return false;
    }

    function find_user( $username )
    {
        global $connection;
        $query = "SELECT * FROM USERS ";
        $query .= "WHERE USERNAME = '{$username}' ";
        $query .= "LIMIT 1";
        #echo $query;
        $result = mysqli_query( $connection, $query );

        if( !$result )
        {
            die("Error could not execute query. Error@ " . mysqli_error( $connection ));
        }

        if($user = mysqli_fetch_assoc( $result ))
        {
            #echo "worked";
            return $user;
        }
        else
        {
            #echo "flopped";
            return null;
        }
    }

    function login( $username, $pass )
    {
        // Find the user first:
        $user = find_user( $username );

        if( $user ) // User is found
        {
            // Check the password:
            if( password_check( $pass, $user["PASSWORD"] ) )
            {
                return $user;
            }
            else {
                return false;
            }
        }
        else {
            return false; // User is not found
        }
    }

    function logged_in()
    {
        return isset($_SESSION["user_id"]);
    }

    function check_logged_in()
    {
        if(!logged_in())
        {
            redirect("login.php");
        }
    }

    function find_user_books( $name )
    {

        global  $connection;

        $username = escape( $name );
        $query = "SELECT * FROM BOOK ";
        $query .= "WHERE USERNAME = '{$username}'";

        $result = mysqli_query( $connection, $query );

        query_check($result);

        return $result;
    }

    function find_book_by_id( $id )
    {
        $book_id = escape($id);
        global $connection;

        $query = "SELECT * FROM BOOK ";
        $query .= "WHERE BOOKID = {$book_id} ";
        $query .= "LIMIT 1";

        $result = mysqli_query( $connection, $query );

        query_check($result);

        if( $book = mysqli_fetch_assoc( $result ) ) return $book;
        else return null;
    }
?>
