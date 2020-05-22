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

	<body id="result">
		<div class="container">
			<header>
				
				<h3>
					<a href="index.php">coursehunt.com</a>
				</h3>

				<form action="." method="get">
						
						<span>
							Course:
						</span>
						
						<div class="input-wrapper course">
							<input type="text" name="course" />
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
								<option value="river">River State</option>
							</select>
							
						</div>
						
						<input type="submit" class="submit" name="search" value="Search" />
						
					</form>

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
				
				<?php 
				
					if(isset($uni_info)){ 
					
						$uni_name = $uni_info['name'];
						$uni_town = $uni_info['town'];
						$uni_state = $uni_info['state'];
						$uni_website = $uni_info['website'];
						
						$course_name = $course_info['name'];
						$course_duration = $course_info['duration'];
						$course_department = $course_info['department'];
						
					} 
						
				?>
				
				<div class="content">
	
					<table>
						
						<tr>
							<td><h2>Search Result</h2></td>
						</tr>
						
						<tr>
							<td>
								University Name:
							</td>
							
							<td>
								<?php echo ucwords($uni_name) ?>
							</td>
						</tr>
						
						<tr>
							<td>
								Department:
							</td>
							<td>
								<?php echo ucwords($course_department) ?>
							</td>
						</tr>
						
						<tr>
							<td>
								Course:
							</td>
							<td>
								<?php echo ucwords($course_name) ?>
							</td>
						</tr>
						
						<tr>
							<td>
								Duration:
							</td>
							<td>
								<?php echo ucwords($course_duration) ?>
							</td>
						</tr>
						
						<tr>
							<td>
								Town:
							</td>
							<td>
								<?php echo ucwords($uni_town) ?>
							</td>
						</tr>
						
						<tr>
							<td>
								State:
							</td>
							<td>
								<?php echo ucwords($uni_state) ?>
							</td>
						</tr>
						
						<tr>
							<td>
								More info:
							</td>
							<td>
								<a href="http://<?php echo $uni_website ?>" target="_blank">Visit University</a>
							</td>
						</tr>
						
					</table>

					
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
