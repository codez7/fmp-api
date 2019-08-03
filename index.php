<?php 

//session
session_start();

if($_GET['do'] == 'logout'){
    unset($_SESSION['admin']);
    session_destroy();
    } 

if($_SESSION['admin'] != "admin"){
    header("Location: login.php");    
    exit;
    }


 //API
 
set_time_limit(0);
if(!$company = $_POST['summary']){ $company = 'AAPL';}
//if(!$company){ $company = 'AAPL';}

$url_info = "https://financialmodelingprep.com/api/company/profile/{$company}?datatype=json";


$channel = curl_init();

curl_setopt($channel, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($channel, CURLOPT_HEADER, 0);
curl_setopt($channel, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($channel, CURLOPT_URL, $url_info);
curl_setopt($channel, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($channel, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($channel, CURLOPT_TIMEOUT, 0);
curl_setopt($channel, CURLOPT_CONNECTTIMEOUT, 0);
curl_setopt($channel, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, FALSE);

$output = curl_exec($channel);
?>

<!DOCTYPE HTML>
<!--
	Ethereal by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Financial Summary</title>
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

						<!-- Panel -->
							<section class="panel color2-alt">
								<div class="inner columns aligned">
									<div class="span-3">
                                    <a href="index.php?do=logout">Logout</a> 
										<h4>Financial Summary - <?=$company?> </h4>
										<div class="table-wrapper">
										<form method="post" action="index.php">
											<div class="fields">												
												<div class="field third">
													<label for="demo-category">Company</label>
													<div class="select-wrapper">
														<select name="summary" id="demo-category">
                                                            <option value=""><?=$company?></option>
                                                            <option value="AAPL">AAPL</option>
															<option value="EXLS">EXLS</option>
                                                            <option value="MSFT">MSFT</option>
                                                            <option value="FB">FB</option>
                                                            <option value="ZNGA">ZNGA</option>
                                                            <option value="NVDA">NVDA</option>
														</select>                                                      
													</div>                                                    
												</div>
											</div>
											<ul class="actions">
												<li><input type="submit" value="Ok" class="primary color2" /></li>
											</ul>
										</form>
                                       
										<table class="alt">
												<thead>
													<tr>
														<th>N</th>
														<th>Key</th>
														<th>Value</th>
													</tr>
												</thead>

                                                 <tbody>
												
                                                    <?php 

                                                    if (curl_error($channel)) {
                                                        return 'error:' . curl_error($channel);
                                                        } else {
                                                        $outputJSON = json_decode($output);
                                                        
                                                        $i = 0;
                                                            foreach($outputJSON->$company as $key => $value){ 
                                                                $i++;?>

                                                    <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$key?></td>  
                                                    <td><?=$value?></td>
                                                    </tr>

                                                                <?php }
                                                        }                                                                                                        
                                                    ?>													
												</tbody>
										</table>
										</div>
									</div>										
								</div>
							</section>

						<!-- Copyright -->
							<div class="copyright">&copy; Untitled. Design: <a href="https://html5up.net">HTML5 UP</a>.</div>

					</div>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>