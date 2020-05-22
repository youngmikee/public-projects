<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>HTML</title>
		<meta name="description" content="">
		<meta name="author" content="Michael">

		<meta name="viewport" content="width=device-width; initial-scale=1.0">

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">
		
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body id="admin">
		<div class="container" style="height: auto;">
			<header>
				
				<h3>
					<a href="index.php">coursehunt.com</a>
				</h3>

				<nav>
					<ul>
						<li>
							<a href="?logout">Logout</a>
						</li>
						<li>
							<a href="?help">Help</a>
						</li>
					</ul>
				</nav>
				
			</header>


			<div class="body" style="height: 800px;">
				
				<div class="content">
					
					<div class="left" style="width: 100%;">
						
						<form action="." method="post">
							
							<h3>
								Survey
							</h3>
							
							<span class="error">
								<?php 
								
									if(isset($message)){
										echo $message;
									}
									if(isset($_SESSION['surveyError'])){
										echo $_SESSION['surveyError'];
									}
								
								?>
							</span>
							
							<span>
								
								Answer all the questions below in relation to your visit today. 
								This survey should take no longer than two minutes to complete.
								
							</span>
							<br>
							
							<span>
								What are you looking for on COURSE-HUNT today? Please tick those that apply to you:
							</span>
							<div>
								<input type="radio" name="a" required  value=""/>
								Training for work
							</div>
							<div>
								<input type="radio" name="a" required  value=""/>
								Higher education
							</div>
							<div>
								<input type="radio" name="a" required  value=""/>
								An apprenticeship
							</div> 							
							<br>
							<span>
								What is most important to you when looking for a course?:
							</span>
							<div>
								<input type="radio" name="b" required  value=""/>
								Location
							</div>
							<div>
								<input type="radio" name="b" required  value=""/>
								Price
							</div>
							<div>
								<input type="radio" name="b" required  value=""/>
								Good reviews
							</div>
							<br>
							<span>
								If you found the course you were looking for on Hotcourses today, would you book it straight away?:
							</span>
							<div>
								<input type="radio" name="c" required  value=""/>
								Yes
							</div>
							<div>
								<input type="radio" name="c" required  value=""/>
								No
							</div>
							<br>
							<span>
								If not, why not?:
							</span>
							<div class="input-wrapper" style="border: solid 1px #fff; height: auto; width: auto;">
								<textarea rows="4" name="description" ></textarea>
							</div>
							<br>
							<span>
								What other sites will you be looking at to help you make your decision? Please tick any that apply:
							</span>
							<div>
								<input type="radio" name="d" required  value=""/>
								Whatuni
							</div>
							<div>
								<input type="radio" name="d" required  value=""/>
								Postgraduate Search
							</div>
							<div>
								<input type="radio" name="d" required  value=""/>
								Course provider’s own site
							</div>
							<div>
								<input type="radio" name="d" required  value=""/>
								Other
							</div>
							<br>
							
							<input type="submit" class="btn" name="survey" title="survey" value="Submit" />
							
						</form>
						
					</div>
					
					<div class="right">

						
					</div>
					
				</div>

			</div>

			<footer>
				<p>
					&copy; Copyright COURSE-HUNT
				</p>
			</footer>
		</div>
	</body>
</html>
