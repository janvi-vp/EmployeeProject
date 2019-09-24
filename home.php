<?php
	session_start();
    if(!isset($_SESSION["username"])) {
        echo "<script>alert('Please sign in first');</script>";
        header("location: register.php");
    } else {
		if($_SESSION['designation'] == "Teaching") {
			$button = "Course Form";
			$form = "cp_reg_tcourse.php";
		} else {
			$button = "Lab Form";
			$form = "cp_reg.php";
		}
	}
	if(isset($_GET["logout"])) {
		session_destroy();
		unset($_SESSION['designation']);
		unset($_SESSION['username']);
		header("location: login.html");
	}
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title> AB. BC. CLG</title>
		<link rel="stylesheet" type="text/css" href="mystyle.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	</head>
	<body>
		<header class="headerpart1">
			<div class="divider"><span style="color: blue;">AB. </span><span style="color: white;">BC. </span><span style="color: red;">COLLEGE</span></div>
			<nav>
				<ul id="ul1">
					<li><a class="headgrey" href="home.php?logout=1">Logout</a></li>
					<li><a class="headgrey" href="#">View</a></li>
					<li><a class="headgrey" href="cp_accounts.php">Accounts</a></li>
					<li><a class="headgrey" href="<?php echo $form ?>"><?php echo $button ?></a></li>
				</ul>
			</nav>
		</header>
		<div class="fwimage">
			<img src="images/clg.png" alt="college image" class="clg_pic">
			<h1>AB. BC. College of Engineering and Information Technology</h1>
			<br>
			<h2>Accredated 'A' Grade by NAAC</h2>
			<br><br><br><br><br><br><br><br><br><br>
		</div>
		<div class="footer-main-div">
			<div class="social-icons">
				<ul>
					<li><a href="https://www.facebook.com/IdeapreneurIndia/"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="https://plus.google.com/discover"><i class="fab fa-google-plus-g"></i></a></li>
					<li><a href="https://www.linkedin.com/in/ideapreneurindia"><i class="fab fa-linkedin-in"></i></a></li>
					<li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
					<li><a href="https://twitter.com/ideapreneurindi"><i class="fab fa-twitter"></i></a></li>
					<li><a href="https://www.slideshare.net/ideapreneurindia"><i class="fab fa-slideshare"></i></a></li>
				</ul>
			</div>
			<div class="footer-menu-one">
				<ul>
					<li><a href="#">ABOUT US</a></li>
					<li><a href="#">HOME</a></li>
					<li><a href="#">LOGIN</a></li>
					<li><a href="#">SIGN UP</a></li>
				</ul>
			</div>
			<div class="footer-contact-us">
				<div class="footer-address"><!--addres-->
					<h1>Have Questions? <br> CONTACT US !</h1>
					<h2>Office Address - AB. BC. College, Krishna Plaza, Opp. CKP Bank, Above Krishna Sweets, Near Rly. Stn, Maharashtra-400601.</h2>
				</div><!--addres-->
				<div class="footer-email-phone"><!--email-phone-->
					<ul>
						<li><a href="tel:+91 8080001300"><i class="fa fa-phone"></i> +91 1234567890</a></li>
						<li><a href="mailto:sahutechnologies@gmail.com"><i class="fa fa-envelope"></i> ab.bc.college@gmail.com</a></li>
					</ul>
				</div><!--email-phone-->					
			</div>	 
		</div>
	</body>
</html>
<style type="text/css">
	.headred{
	background-color: red;
	/*	padding: 15px 10px 10px 10px;*/	
	padding: 30% 15% 25% 15%;
	}

	.Left {
		width:50%;
		height: auto;
		margin: auto;
		float: left;
	}
	.Right {
		width: 50%;
		height: auto;
		margin: auto;
		float: right;
	}
	.Left img {
		width: 80%;
		height: 100%;
		margin:0% 0 0 5%;
	}
	.Right h1, h2, h3, p, a {
		color: white;
		font-family: 'Krona One', sans-serif;
		font-weight: auto;
		text-decoration: none;
	}

	.deepika_padukon, .aditi_rathore, .aftab_shivdasani, .mithun_chakraborty, .dara_singh, .akanksha_juneja, .rahul_kumar, .kamal_hassan{
		display: inline-block;
		margin: 5%;
	}

</style>