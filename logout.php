
<?php
session_start();

$userLO = $_GET['userlogout'];
echo "<script language='javascript'> alert('$userLO'); </script>";
	
session_destroy();

header("location:index.html");

?>


