<?php
include ( "../includes/db_connection.php" );

$GENRE=$_GET['genre'];
$BOOKNAME=$_GET['bookname'];
$OFFER=$_GET['offertype'];
$PUB=$_GET['publisher'];

$sql="SELECT * FROM book WHERE  
BOOKNAME LIKE '$BOOKNAME%' AND GENRE LIKE '$GENRE' AND PUBLISHER LIKE '$PUB%'  ";
$result=$conn->query($sql);

?>

<html>
<link rel="stylesheet" href="css/reset.css" type="text/css">
<link rel="stylesheet" href="css/index.css" type="text/css">


<div class="result1"  >

		    <ul>
                  <?php
                 while($row=mysqli_fetch_array($result))
				 {
					 echo '<li><a  href="#something"><p>'.$row['BOOKNAME'].'<p></a></li>';
					 }
				  ?>
            </ul>
		   
	     </div>
</html>

