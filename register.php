
<?php
session_start();

$usern   = $_POST['username'];
$email   = $_POST['email'];
$pass  = $_POST['password'];
//$name   = $_POST['name'];
//$phone   = $_POST['phone'];


$con=mysql_connect("swe.gamerapoc.org","root","couchsql");
  mysql_select_db("forager");
  
$query = mysql_query("SELECT username FROM user WHERE username = '".$usern."'");
if(mysql_num_rows($query)> 0)
{
  print "<script type=\"text/javascript\"> alert (\"userid is already there\") </script>";

}
else
{
 $sql = "INSERT INTO user (password, username, email)
         VALUES ('".$pass."','".$usern."','".$email."')";
$res = mysql_query($sql) or die('Error:'.mysql_error());


				if (!isSet($_SESSION[$usern]) || $_SESSION[$usern] == 0)
				{
						$_SESSION[$usern]= 0;
						
				}

 print ' <script type="text/javascript"> alert ("well created") </script>';

echo "<script language='javascript'> window.location=\"index.html\"; </script>";
}
?>
 }
 
?>

