<?php require_once("includes/session.php"); ?>
<?php require_once("includes/db_connection.php") ?>
<?php require_once("includes/validation.php"); ?>

<?php 
$USERNAME=$_SESSION['username_id'];
$evetname=$_POST['eventname'];

$DOB=$_POST['DoB'];

$sql="INSERT INTO events (USERNAME,PASSWORD,DoB)
VALUES('$USERNAME','$PASSWORD','$DOB')";
$result=$connection->query($sql);
?>

<html>

<form action="addevent.php" method="post">
   <fieldset>
   
   <input type="date" name="date">
   <input type="text" name="location" placeholder="enter location">
   <input type="text" name="eventname" placeholder="event name">
    <input type="text" name="description" placeholder="description">
	<button name="submit">sdsad</button>
	
</form>
</html>
   