<?php
	session_start();

	function session_message()
	{
		if( isset( $_SESSION["message"] ) )
		{
			$output 	="<div class=\"message\">";
			$output    .= htmlentities($_SESSION["message"]);
			$output    .= "</div>";

			//clear the message after
			$_SESSION["message"] = null;

			return $output;
		}
	}

	function error()
	{
		if( isset($_SESSION["errors"]) )
		{
			$errors	= ($_SESSION["errors"]);

			//clear the message after
			$_SESSION["errors"] = null;

			return $errors;
		}
	}
?>
