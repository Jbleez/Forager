<?php
if(isset($_GET['crawlUser']))
{
	$myUser = $_GET['crawlUser'];
	
$con=mysql_connect("localhost","root","root");
mysql_select_db("forager");
$query = mysql_query("SELECT runningStatus FROM running");
$runStat=mysql_fetch_array($query);

	if ($runStat['runningStatus'] != 0)
	{
		 print ' <script type="text/javascript"> alert ("A user is running the crawler already") </script>';
		 echo "<script language='javascript'> window.location=\"login.php?userAbout=$myUser\"; </script>";
	}
	
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		
		<link rel="stylesheet" type="text/css" href="css/style.css" />

        <link rel="stylesheet" type="text/css" href="css/style_common.css" />
		
		<link rel="stylesheet" type="text/css" href="css/globalstyle.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" href="css/styleSort.css" />
		
		
		
	<!-- // Load Javascipt -->
  
  

  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="js/modernizr-1.7.min.js"></script>


			
		<script type="text/javascript" src="js/jquery.js"></script>
	
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	

		<!-- Modernizr which enables HTML5 elements & feature detects -->
		<script src="js/modernizr.custom.25376.js"></script>
		
		<style type="text/css">
body{
	position: relative;
	height: 100%;
	background: -webkit-gradient(linear, left top, left bottom, from(#ccc), to(#fff));
}

.navbox {
	position: relative;
	float: left;
	
}

ul.nav {
	list-style: none;
	display: block;
	width: 200px;
	position: relative;
	top: 100px;
	left: 100px;
	padding: 60px 0 60px 0;
	background: url(shad2.png) no-repeat;
	-webkit-background-size: 50% 100%;
}

li {
	margin: 5px 0 0 0;
}

ul.nav li a {
	-webkit-transition: all 0.3s ease-out;
	background: #cbcbcb url(border.png) no-repeat;
	color: #174867;
	padding: 7px 15px 7px 15px;
	-webkit-border-top-right-radius: 10px;
 	-webkit-border-bottom-right-radius: 10px;
	width: 100px;
	display: block;
	text-decoration: none;
	-webkit-box-shadow: 2px 2px 4px #888;
}

ul.nav li a:hover {
	background: #ebebeb url(border.png) no-repeat;
	color: #67a5cd;
	padding: 7px 15px 7px 30px;
}

</style>
		
	</head>
	<body>
		<div id="perspective" class="perspective effect-airbnb">
			<div class="container">		
			
			
			<img src="images/metal.jpg" />
				<div class="wrapper"><!-- wrapper needed for scroll -->

					
					<div class="main clearfix">
					
					<div class="column column1">
						<p><button id="showMenu"><span class="symbol">&#0067; </span></button></p>

						<div class="navbox">
							<ul class="nav">
							<form action="" method="post">
							<li><a href="#">Stop the crawler</a></li>
							<li><a href="#">Rescan a page</a></li>
							<?php echo '<li><a href="printTheResults.php?userCrawl='.urlencode($myUser).'" target="_blank"> Print the report </a></li>';?>
							<li><a href="#">View the history </a></li>
							</form>
							</ul>
						</div>
					</div>
						
						<div class="column column2">
						
								<table cellpadding="0" cellspacing="0" border="0" id="table" class="sortable">
		<thead>
			<tr>
				<th class="nosort"><h3>ID</h3></th>
				<th><h3>URL</h3></th>
				<th><h3>Response code</h3></th>
			</tr>
		</thead>
		<tbody>
			 <?php 
				
					
				// Connects to your Database 
				$con=mysql_connect("localhost","root","root");
				mysql_select_db("forager");
				$query = mysql_query("SELECT * FROM phpcrawler_links")
				or die(mysql_error()); 

				while($rec=mysql_fetch_array($query)) 
					{ $thekey= $rec['id'];
						Print "<tr>"; 
						Print "<td><input type=\"radio\" name=\"thekeys\" value=\".$thekey.\" id=\".$thekey.\"/>" .$rec['id']. "</td> "; 
						Print "<td>".$rec['url']."</td> "; 
						Print "<td>".$rec['rCode']. " </td>"; 
					}
			?> 
		</tbody>
  </table>
	<div id="controls">
		<div id="perpage">
			<select onchange="sorter.size(this.value)">
			<option value="5">5</option>
				<option value="10">10</option>
				<option value="20">20</option>
				<option value="50">50</option>
				<option value="100" selected="selected">100</option>
			</select>
			<span>Entries Per Page</span>
		</div>
		<div id="navigation">
			<img src="images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" />
			<img src="images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" />
			<img src="images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" />
			<img src="images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" />
		</div>
		<div class="text">Displaying Page <span id="currentpage"></span> of <span id="pagelimit"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo '<a style=\"font-size:14px\" href="login.php?userAbout='.urlencode($myUser).'"> Go home </a>';?></div>
		
	</div>
	
	
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript">
  var sorter = new TINY.table.sorter("sorter");
	sorter.head = "head";
	sorter.asc = "asc";
	sorter.desc = "desc";
	sorter.even = "evenrow";
	sorter.odd = "oddrow";
	sorter.evensel = "evenselected";
	sorter.oddsel = "oddselected";
	sorter.paginate = true;
	sorter.currentid = "currentpage";
	sorter.limitid = "pagelimit";
	sorter.init("table",1);
  </script>
							
							
						</div>
					
					</div><!-- /main -->
					<p><div id= "footer"> 

<p><p><a href="/privacypolicy.htm">Privacy Policy</a> | <a href="/aboutus/index.htm">About Us</a> | <a href="/azindex.htm">A-Z Index</a> | <a href="/visitspsu/campusmaps/index.htm">Maps</a> | <a href="/contacts.htm">Contacts</a> | <a href="/emergency/index.htm">Emergency Info</a> | <a href="/hr/ethics_and_reporting_hotline.htm">Ethics and Reporting Hotline</a> | <a href="http://text.usg.edu:8080/tt/www.spsu.edu" target="_blank">Text Only</a></p>
<p class="footerText"><span id="directedit">©</span> 2013 Southern Polytechnic State University. All Rights Reserved | 1100 South Marietta Pkwy Marietta, GA 30060-2896 | Phone: 678-915-7778 Toll Free: 800-635-3204</p>

</div>
					
					</p>
				</div><!-- wrapper -->
			</div><!-- /container -->
			<nav class="outer-nav left vertical">
				<a href="index.html"><img src="images/home.jpg"/>&nbsp;Home</a>
				<a href="http://www.spsu.edu/" target="_blank"><img src="images/smalllogo.jpg"/>&nbsp;Spsu.edu</a>
				<a href="http://spsu.edu/aboutus/" target="_blank"> <span class="icons">&#0106 </span>&nbsp; About</a>
				<a href="http://spsu.edu/academics/" target="_blank"> <span class="icons">&#0059 </span>&nbsp;Academics </a>
				<a href="http://spsu.edu/admission/" target="_blank"><span class="icons">&#0171 </span>&nbsp;Admissions</a>
				<a href="http://spsu.edu/campuslife" target="_blank"><span class="icons">&#0058 </span>&nbsp;Campus life</a>
				<a href="http://spsu.edu/newsroom/news/index.htm" target="_blank"><span class="icons">&#0076 </span>&nbsp;News Room</a>
			</nav>
		</div><!-- /perspective -->
		<script src="js/classie.js"></script>
		<script src="js/menu.js"></script>
	</body>
</html>