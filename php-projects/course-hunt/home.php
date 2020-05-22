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

	<body id="index">
		<div class="container">
			<header>
				
				<h3>
					<a href="index.php">coursehunt.com</a>
				</h3>

				<?php 
				
					if(isset($_SESSION['username'])){
						if($_SESSION['username'] == "Admin"){
							echo "<nav><ul><li><a href='?admin'>".$_SESSION['username']."</a></li>"."<li><a href='?logout'>logout</a></li></ul></nav>";
						}else{
							echo "<nav class='history'><ul><li class='big'>Hi ".$_SESSION['username']." view<a href='?story#history'>History</a></li>"."<li><a href='?logout'>logout</a></li></ul></nav>";
						}
					}else{
								
						echo "<nav><ul><li><a href='?login'>Login</a></li>"."<li><a href='?register'>Register</a></li></ul></nav>";
						
					}
				
				?>
				
			</header>


			<div class="body">
				
				<h1  class="logo">COURSE-HUNT</h1>
				<h4 class="sub" style="font-style: italic;">Number 1 Course Search Website in Nigeria</h4>
				
				<div class="search">
					
					<form action="." method="get">
						
						<span>
							Course:
						</span>
						
						<div class="input-wrapper course">
							<input type="text" name="course" placeholder="Enter a course" />
						</div>
						
						<span>
							State:
						</span>
						<div class="input-wrapper location">
							<!-- <input type="text" name="state" /> -->
							
							<select name="state">
								<option value="">Select A State</option>
								<option value="abuja">Abuja State</option>
								<option value="anambra">Anambra State</option>
								<option value="bayelsa">Bayelsa State</option>
								<option value="benin">Benin State</option>
								<option value="crossriver">Crossriver State</option>
								<option value="delta">Delta State</option>
								<option value="enugu">Enugu State</option>
								<option value="imo">Imo State</option>
								<option value="kwara">Kwara State</option>
								<option value="lagos">Lagos State</option>
								<option value="plateu">Plateu State</option>
								<option value="rivers">Rivers State</option>
							</select>
							
						</div>
						
						<input type="submit" class="submit" name="search" value="Search" />
						
					</form>
					
					<div class="menu">
						<span class="title">Popular Courses</span>
						<ul>
							<li><a href="?all=computer Science">Computer Science</a></li>
							<li><a href="?all=economics">Economics</a></li>
							<li><a href="?all=law">Law</a></li>
							<li><a href="?all=english">English</a></li>
							<li><a href="?all=petroleum engineering">Petroleum Engineering</a></li>
						</ul>
						
					</div>
					
				</div>
				
			</div>

			<footer>
				<ul style="display: table;">
					
					<li class='review' style="display: table-cell; border: solid 1px #aaa;padding: 20px;">
						<a href='?review' style=" text-decoration: none;">Review</a>
					</li>
					<li class='survey' style="display: table-cell; border: solid 1px #aaa;padding: 20px;">
						<a href='?survey' target='_blank' style=" text-decoration: none;">Survey</a>
					</li>
					
				</ul>
				<p>
					&copy; Copyright COURSE-HUNT
				</p>
			</footer>
		</div>
	</body>
</html>
