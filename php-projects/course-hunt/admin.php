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
					
					<div class="left">
						
						<form action="." method="post">
							
							<h3>
								Input Institution
							</h3>
						
							<span class="error">
								<?php 
								
									if(isset($_SESSION['instMessage'])){
										echo $_SESSION['instMessage'];
									}
									if(isset($_SESSION['instError'])){
										echo $_SESSION['instError'];
									}
								
								?>
							</span>
							
							<span>
								Name:
							</span>
							<div class="input-wrapper">
								<input type="text" name="name" required />
							</div>
							
							<span>
								Type:
							</span>
							<div class="input-wrapper">
								<input type="text" name="type" required />
							</div>
							
							<span>
								Description:
							</span>
							<div class="input-wrapper" style="border: solid 1px #fff; height: auto; width: auto;">
								<textarea rows="4" name="description" ></textarea>
							</div>
							
							<span>
								Website:
							</span>
							<div class="input-wrapper">
								<input type="text" name="website" required />
							</div>
							
							<span>
								State:
							</span>
							<div class="input-wrapper">
								<input type="text" name="state" required />
							</div>
							
							<span>
								Town:
							</span>
							<div class="input-wrapper">
								<input type="text" name="town" required />
							</div>
							
							<input type="submit" class="btn" name="insertInst" title="insert" value="Insert" />
							
						</form>
						
					</div>
					
					<div class="right">
	
						<div class="left">
							
							<form action="." method="post">
								
								<h3>
									Input Course
								</h3>
								
								<span class="error">
									<?php 
									
										if(isset($_SESSION['courseMessage'])){
											echo $_SESSION['courseMessage'];
										}
										
										if(isset($_SESSION['courseError'])){
											echo $_SESSION['courseError'];
										}
									
									?>
								</span>
								
								<span>
									Name:
								</span>
								<div class="input-wrapper">
									<input type="text" name="name" required />
								</div>
								
								<span>
									Department:
								</span>
								<div class="input-wrapper">
									<input type="text" name="department" required />
								</div>
								
								<span>
									Duration:
								</span>
								<div class="input-wrapper">
									<input type="text" name="duration" required />
								</div>
								

								<span>
									Level:
								</span>
								<div class="input-wrapper">
									<select name="level">
										<option value="">Select Level</option>
										<option value="undergraduate">Undergraduate</option>
										<option value="postgraduate">postgraduate</option>
										<option value="diploma">Diploma</option>
									</select>
								</div>
								
								<span>
									Honors:
								</span>
								<div class="input-wrapper">
									<select name="honors">
										<option value="">Select Honors</option>
										<option value="bsc">BSC</option>
										<option value="ba">BA</option>
										<option value="msc">MSC</option>
										<option value="med">MED</option>
										<option value="hnd">HND</option>
										<option value="phd">PHD</option>
									</select>
								</div>
								
								<input type="submit" class="btn" name="insertCourse" title="insert" value="Insert" />
								
							</form>
							
						</div>

					<div class="left">
						
						<form action="." method="post">
							
							<h3>
								Input Institution Courses
							</h3>
						
							<span class="error">
								<?php 
								
									if(isset($_SESSION['instCourseMessage'])){
										echo $_SESSION['instCourseMessage'];
									}
									
									if(isset($_SESSION['instCourseError'])){
										echo $_SESSION['instCourseError'];
									}
								
								?>
							</span>
							
							<span>
								Institution Name:
							</span>
							<div class="input-wrapper">
								<select name="name">
									<?php 
									
									if(isset($institutions)){
										
										foreach($institutions as $row){
											echo "<option value='".$row['name']."'>".$row['name']."</option>";
										}
										
									}
									
									?>
								</select>
							</div>
							
							<span>
								Course Name:
							</span>
							<div class="input-wrapper">
								<select name="course">
									<?php 
									
									if(isset($courses)){
										
										foreach($courses as $course){
											echo "<option value='".$course['name']."'>".$course['name']."</option>";
										}
										
									}
									
									?>
								</select>
							</div>
							
							<input type="submit" class="btn" name="insertInstCourse" title="insert" value="Insert" />
							
						</form>
						
					</div>

						
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
