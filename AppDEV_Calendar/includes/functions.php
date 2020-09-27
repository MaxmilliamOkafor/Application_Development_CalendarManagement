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
		if( !$result_set ) die( "database query failed" );
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

?>
