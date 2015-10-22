
<?php

session_start();
if(isset($_GET['userAbout']))
{
$userAbt = $_GET['userAbout'];
	$userlog=$userAbt;
}
else
{
	
$userlog = $_POST["userlogin"];
$usern = $_POST["userlogin"];
$passlog = $_POST["passlogin"];

$con=mysql_connect("swe.gamerapoc.org","root","couchsql");
mysql_select_db("forager");
$query = mysql_query("SELECT username FROM user WHERE username = '".$userlog."' and password = '".$passlog."'  ");
$num=mysql_num_rows($query);

if($num <= 0)
{
print ' <script type="text/javascript"> alert ("Wrong password"); </script>';
echo "<script language='javascript'> window.location=\"index.html\"; </script>";
}
else if(isset($_SESSION[$userlog]) && $num>0)
{
	echo "<script language='javascript'> alert ('Already logged in') ; </script>";
}
else if(!isset($_SESSION[$userlog]) && $num>0)
{
	$_SESSION[$userlog] = 1;
}
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/sbimenu.css" />
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
	
		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/globalstyle.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<link rel="stylesheet" href="css/regForm.css">
		<link rel="stylesheet" href="css/logform.css">
		
		
		<script type="text/javascript" src="js/jquery.js"></script>
	
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>

	<!-- // Load Javascipt -->
	
	  <!-- CSS: implied media="all" -->
  <link rel="stylesheet" href="css/regForm.css">
  
  

  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="js/modernizr-1.7.min.js"></script>

		
		<script type="text/javascript" src="js/login.form.js"></script>
		<script type="text/javascript" src="js/registration.form.js"></script>
		<!--[if IE]>
			<link rel="stylesheet" type="text/css" href="css/styleIE.css" />
		<![endif]-->

			
		<script type="text/javascript" src="js/jquery.js"></script>
	
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	

		<!-- Modernizr which enables HTML5 elements & feature detects -->
		<script src="js/modernizr.custom.25376.js"></script>
		
	</head>
	<body>
		<div id="perspective" class="perspective effect-airbnb">
			<div class="container">
			
			
			<!-- madal views -->
			
			
				<!-- popup form #1 -->
        <a href="#x" class="overlay" id="join_form"></a>
        <div class="popup">
	<h1 class="reg"> REGISTER </h1>

<div id="main" role="main">


                <form id="registerform" method="post" action="register.php"  >
						
			
                    <fieldset class="reg">

                   <label class="reg" for="username">Username<span style="color:red">*</span><span class="ico"><img src="images/user.png" alt="Username Icon" border="0" /></span></label>
				   <span id="userw" style="color:red; font-size:10px; display:none;">Enter&nbspa&nbspvalid&nbspname </span>
							

		               		<input class="reg" type="text" name="username" id="username" required autofocus>
							
						 <label class="reg" for="email"> Email<span style="color:red">*</span><span class="ico"><img src="images/user.png" alt="Username Icon" border="0" /></span></label>
						 <span id="mailw" style="color:red; font-size:10px; display:none;">Enter&nbspa&nbspvalid&nbspemail</span>

		               		<input class="reg" type="text" name="email" id="email" required autofocus>
							

                       <label class="reg" for="password">Password<span style="color:red">*</span><span class="ico"><img src="images/pass.png" alt="Password Icon" border="0" /></span></label>
					   <span id="passw" style="color:red; font-size:10px; display:none;">passwords&nbspdo&nbspnot&nbspcorrespond </span>

	        	            <input class="reg" type="password" name="password" id="password" required>
						
						<label class="reg" for="confpassword">Confirm Password<span style="color:red">*</span><span class="ico"><img src="images/pass.png" alt="Password Icon" border="0" /></span></label>

	        	            <input class="reg" type="password" name="confpassword" id="confpassword" required>

            		</fieldset>

                    <fieldset class="forgot">
                    	
                        <span class="reg"><a href="#" class="password">Forgot Password</a></span>

                    	<button class="reg" type=submit id="registerIt">>>&nbsp;&nbsp;&nbsp;GO</button>

                    </fieldset>


           		</form>

    <a class="close" href="#close"></a>

  </div> <!--! end of main -->
  
	  </div>   
	  
	
   
	 <!-- popup form #2 -->
         <a href="#x" class="overlay" id="login_form"></a>
        <div class="popuplog">
		
	<section id="contentlog">
		
			<div id="wrapper">
		<div id="wrappertop"></div>

		<div id="wrappermiddle">
			<h2>Login</h2>
		<form id="loginForm" name="loginForm" action="login.php" method="post">
		
			<div id="username_input">
			<div> <span id="userlw" style="color:red; font-size:10px; display:none; padding-top: -5px;">* Enter a valid username</span></div>
				<div id="username_inputleft"></div>

				<div id="username_inputmiddle">
				
					<input type="text" name="userlogin" id="userlogin" class="url" value="" />
					<img id="url_user" src="images/image_login/mailicon.png" alt="">
					
				
				</div>
				<div id="username_inputright"></div>
			

			</div>

			<div id="password_input">
	<div><span id="passlw" style="color:red; font-size:10px; display:none; padding-top: -5px;">* Enter a valid password</span></div>
				<div id="password_inputleft"></div>
			
				<div id="password_inputmiddle">
				
				
					<input type="password" name="passlogin" id="passlogin" class="url" value=""/>
					<img id="url_password" src="images/image_login/passicon.png" alt="">
					
				</div>
				
				<div id="password_inputright"> </div>
				
			</div>
			
			<div id="sub">
				<button type="submit" id="submit2" value=""></button>
			</div>


			<div id="links_left">

			<a href="#">Forgot your Password?</a>

			</div>

			<div id="links_right"><a href="#">Not a Member Yet?</a></div>

		</div>

		<div id="wrapperbottom"></div>
		
	</div>
		</form><!-- form -->
		
 


	</section><!-- content -->

          
		<a class="close" href="#close"></a>
		</div>
		
		
		<!-- end of modal views-->			
			
			
			<img src="images/metal.jpg" />
				<div class="wrapper"><!-- wrapper needed for scroll -->

					
					<div class="main clearfix">
					
					<div class="column column1">
						<p><button id="showMenu"><span class="symbol">&#0067; </span></button></p>
						
					</div>
						
						<div class="column column2">
						
							<div class="containerPanel">
			
			<div class="content">
				<div id="sbi_container" class="sbi_container">
				
					<div class="sbi_panel" data-bg="images/profile.jpg">
					<form method="POST">
					
						
						<a href="#login_form"class="sbi_label" id="join_pop">Take an action
						<span style="color: rgb(230,230,204);"><?php print "$userlog"?> </span></a>	
							<div class="sbi_content">
							<
							<ul>
								<li><?php echo '<a href="logout.php?userlogout='.urlencode($userlog).'"> Logout</a>';?> </li>
								<li><a href="logout.php">Modify your profile</a></li>
								<li><a href="#">Stat</a></li>
					</form>
							</ul>
						</div>		
					</div>
					
					<div class="sbi_panel" data-bg="images/signUp.png">
						<?php echo '<a href="results.php?crawlUser='.urlencode($userlog).'" class="sbi_label"> Launch the crawler </a>';?>		
					</div>
					
					<div class="sbi_panel" data-bg="images/about.png">
						<?php echo '<a href="aboutProject.php?user='.urlencode($userlog).'" class="sbi_label"> About the project </a>';?>			
					</div>
					
					<div class="sbi_panel" data-bg="images/Atrium_bldg.jpg">
						<a href="#" class="sbi_label">Contact Us</a>					
					</div>
					
				</div>
			</div>
			
		</div>
		
		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/jquery.bgImageMenu.js"></script>
		<script type="text/javascript">
			$(function() {
				$('#sbi_container').bgImageMenu({
					defaultBg	: 'images/spsuImg.jpg',
					menuSpeed	: 300,
					border		: 1,
					type		: {
						mode		: 'verticalSlideAlt',
						speed		: 450,
						easing		: 'easeOutBack'
					}
				});
			});
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