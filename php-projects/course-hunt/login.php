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

	<body id="login">
		<div class="container">
			<header>
				
				<h3>
					<a href="index.php">coursehunt.com</a>
				</h3>

				<nav>
					<ul>
						<li>
							<a href="?register">Register</a>
						</li>
						<li>
							<a href="?help">Help</a>
						</li>
					</ul>
				</nav>
				
			</header>


			<div class="body">
				
				<div class="content">
					
					<div class="left">
						
						<form action="." method="post">
							
							<h3>
								Login
							</h3>
							
							<span>
								Email:
							</span>
							<div class="input-wrapper">
								<input type="email" name="email" />
							</div>
							
							<span>
								Password:
							</span>
							<div class="input-wrapper">
								<input type="password" name="pwd" />
							</div>
							
							<input type="submit" class="btn" name="login" title="Login" value="Login" />
							
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
