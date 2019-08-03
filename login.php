<?php
session_start();
$users = 'admin';
$pass = '$2y$10$zWsKRFW5bJcHY7FErFPaG.0YmeCTQm1yO5hVkXy5N6i2P2KKv46XO';


 if($_POST['submit']){
 if($users == $_POST['user'] AND $pass == password_verify($_POST['pass'], $pass))
{
 $_SESSION['admin'] = $users;
 header("Location: index.php");
 exit;
 }
else $error_login_pass = 1;
 } 
?>  

<!DOCTYPE HTML>
<!--
	Ethereal by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Ethereal by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">
				<!-- Wrapper -->
					<div id="wrapper">
						<!-- Panel -->
							<section class="panel color2-alt">
								<div class="inner columns aligned">
									<div class="span-4-5">
										<h3 class="major">Financial Modeling Prep API</h3>
                                        <p><a href="https://financialmodelingprep.com/developer/docs/" target="_blank">financialmodelingprep.com - API Documentation</a></p>
										<form method="post">
											<div class="fields">
												<div class="field third">
													<label for="demo-name">Login</label>
													<input type="text" name="user" id="demo-name" value="" placeholder="Login" />
												</div>
												<div class="field third">
													<label for="demo-email">Password</label>
													<input type="password" name="pass" id="demo-password" value="" placeholder="Pass" />
												</div>
											</div>
											<ul class="actions">
												<li><input type="submit" name="submit" value="Continue" class="primary color2" /></li>
											</ul>
										</form>
                                        <ul>
                                    <li>Login: admin</li>
                                    <li>Pass: 123</li>
                                    </ul>
<?php 
if($error_login_pass){ echo 'Incorrect username or password';}
?>

									</div>                                    
								</div>
							</section>

						<!-- Copyright -->
							<div class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.
							</div>
					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>