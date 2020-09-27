<?php require_once( "session.php" ); ?>
<?php require_once("db_connection.php"); ?>
<?php


$USERNAME=$_SESSION['user_id'];
//$USERNAME="m.o";

echo $USERNAME;
$sql="SELECT * FROM events WHERE  
USERNAME ='$USERNAME'";
$result=$connection->query($sql);

while($row=mysqli_fetch_array($result))
{
	
		echo $row['EVENTNAME']."<br>";
		echo $row['DATES']."<br>";
		echo $row['LOCATION']."<br>";
		echo $row['DESCRIPTION']."<br>";
		echo "<button name='add'  onclick='add()'>add</input> ";
		echo "<button name='edit'  onclick='edit()'>edit</input> ";
		echo "<button name='delete'  onclick='delet()'>delete</input> ";
}
echo $USERNAME;
?>
