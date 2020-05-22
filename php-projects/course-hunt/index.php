<?php

session_start();

	if(get_magic_quotes_gpc()){
		$process = array(&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
		
		while(list($key, $val) = each($process)){
			foreach($val as $k => $v){
				unset($process[$key][$k]);
				if(is_array($v)){
					$process[$key][stripslashes($k)] = $v;
					$process[] = &$process[$key][stripslashes($k)];
				}else{
					$process[$key][stripslashes($k)] = stripslashes($v);
				}
			}
		}
		unset($process);
	}
	
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=coursehunt', 'web', 'web.user');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec('SET NAMES "utf8"');
	}catch(PDOException $e){
		$error = 'Unable to connect to the database server: '.$e->getMessage();
		//include 'error.html.php';
		echo $error;
		exit();
	}

	$_SESSION['error'] = "";
	$_SESSION['message'] = "";
	
	
	function getInst($pdo, $state) {
	    $sql = "SELECT name, type, description, tution, website, state, town FROM institutions WHERE state LIKE '%$state%'";
		$result = $pdo->query($sql);
		
		return $result;
	}
	
	function getInstByName($pdo, $name){
		$sql = "SELECT * FROM institutions WHERE  name LIKE '%$name%' ";
		$result = $pdo->query($sql);
		return $result;
	}
	
	function checkHistoryById($id, $course, $state){
		global $pdo;
		$sql = "SELECT * FROM history WHERE userid = '$id' AND course = '$course' AND state = '$state' ";
		$result = $pdo->query($sql);
		return $result;
	}
	
	function getAllInstitutions($pdo){
   		//global $pdo;
		
		try{
			$result = $pdo->query("SELECT * FROM institutions");
			
		}catch(PDOException $e){
			$error = "Error fetching email: ".$e->getMessage();
			echo $error;
			exit();
		}
		
		$institutions = $result->fetchAll();
		return $institutions;
	}
	
	function getAllCourses($pdo){
   		//global $pdo;
		
		try{
			$result = $pdo->query("SELECT * FROM courses");
			
		}catch(PDOException $e){
			$error = "Error fetching email: ".$e->getMessage();
			echo $error;
			exit();
		}
		
		$courses = $result->fetchAll();
		return $courses;
	}
	
	
   	function emailCheck($email){
   		global $pdo;
		
		try{
			$result = $pdo->query("SELECT * FROM users WHERE email = '$email'");
			
		}catch(PDOException $e){
			$error = "Error fetching email: ".$e->getMessage();
			echo $error;
			exit();
		}
		
		$email = $result->fetch();
		return $email;
   	}
	
	function getAll($pdo ,$course){
		$sql = "SELECT * FROM instcourses WHERE course LIKE '%$course%' ";
		$result = $pdo->query($sql);
		return $result;
	}
	
	function getCountAll($pdo ,$course){
		try{
			$result = $pdo->query("SELECT * FROM instcourses WHERE course LIKE '%$course%' ");
		}catch(PDOException $e){
			$error = "Error fetching Institution courses for count: ".$e->getMessage();
			echo $error;
			exit();
		}
		
		$row = $result->fetchAll();
		return $row;
	}
	
	function getAllPaginate($pdo, $course, $start, $perpage){
		$sql = "SELECT * FROM instcourses WHERE course LIKE '%$course%' LIMIT $start, $perpage ";
		$result = $pdo->query($sql);
		return $result;	
		
	}
	
	function getInstcourses($pdo, $name, $course){
		$sql = "SELECT * FROM instcourses WHERE name LIKE '$name' AND course LIKE '%$course%' ";
		$result = $pdo->query($sql);
		return $result;
	}

	function courseCheck($name, $department, $level){
		global $pdo;
		
		try{
			$result = $pdo->query("SELECT name, department, level FROM courses WHERE name LIKE '$name' AND department LIKE '$department' AND level LIKE '$level' ");
			
		}catch(PDOException $e){
			$error = "Error fetching courses: ".$e->getMessage();
			echo $error;
			exit();
		}
		
		$courses = $result->fetchAll();
		return $courses;
	}
	
	function getHistoryById($userid){
		global $pdo;
		
		try{
			$result = $pdo->query("SELECT * FROM history WHERE userid = '$userid' ");
		}catch(PDOException $e){
			$error = "Error fetching history: ".$e->getMessage();
			echo $error;
			exit();
		}
		
		$historys = $result->fetchAll();
		return $historys;
		
	}
	
	function instCheck($name, $state){
		global $pdo;
		
		try{
			$result = $pdo->query("SELECT * FROM institutions WHERE name LIKE '$name' AND state LIKE '$state' ");
		}catch(PDOException $e){
			$error = "Error fetching unies: ".$e->getMessage();
			echo $error;
			exit();
		}
		
		$unies = $result->fetchAll();
		return $unies;
		
	}
	
	function search($name){
		global $pdo;
		
		try{
			$result = $pdo->query("SELECT * FROM courses WHERE name LIKE '%$name%' ");
		}catch(PDOException $e){
			$error = "Error fetching pwd and email: ".$e->getMessage();
			echo $error;
			exit();
		}
		
		$search = $result->fetch();  // pe = password and email
		return $search;
	}
	
	function check($password, $email){
		global $pdo;
		
		try{
			$result = $pdo->query("SELECT * FROM users WHERE password = '$password' AND email = '$email' ");
		}catch(PDOException $e){
			$error = "Error fetching pwd and email: ".$e->getMessage();
			echo $error;
			exit();
		}
		
		$pe = $result->fetch();  // pe = password and email
		return $pe;
	}
   
	
    if(isset($_GET['search'])){
    	$course = htmlspecialchars($_GET['course']);
		$state = htmlspecialchars($_GET['state']);
		
		$courses = search($course);		
		$institutions = getInst($pdo, $state);
		
		
		if(isset($_SESSION['id'])){
			$userid = $_SESSION['id'];
			$date = date("Y/m/d");
			$check = checkHistoryById($userid, $course, $state);
			
						
			//echo $userid;
			foreach($check as $row){
				//echo $row['state'];
				if($row['userid'] == $userid and $row['course'] == $course and $row['state'] == $state){
					include 'result1.php';
					exit();
				}
				
			}
				
			try{
				$sql = 'INSERT INTO history SET
					userid = :userid,
					course = :course,
					state = :state,
					date = :date';
				
				$s = $pdo->prepare($sql);
				$s->bindValue(':userid', $userid);
				$s->bindValue(':course', $course);
				$s->bindValue(':state', $state);
				$s->bindValue(':date', $date);
				$s->execute();	
			}catch(PDOException $e){
				$instError = "Error inserting history details into database: ".$e->getMessage();
				echo $instError;
				exit();
			}		
			
		}
		
		include 'result1.php';
			
		exit();
				
    }
	
	if(isset($_GET['register'])){
		include 'register.php';
		exit();
	}
	
	if(isset($_GET['story'])){
	

		$userid = $_SESSION['id'];
		$results = getHistoryById($userid);	
		
		include 'home1.php';
		exit();
	}
	
	if(isset($_GET['survey'])){
		include 'survey.php';
		exit();
	}
	
	if(isset($_GET['review'])){
		session_unset();
		include 'review.php';
		exit();
	}
	
	if(isset($_POST['survey'])){
		$message = " Your Survey is submited Successfuly";
		//$_SESSION['surveyMessage'] = $message;
		
		//header('Location: ?survey');
		include 'survey.php';
		exit();
	}

	if(isset($_POST['review'])){
		$message = " Your review is submited Successfuly";
		//$_SESSION['reviewMessage'] = $message;
		
		//header('Location: ?review');
		include 'review.php';
		exit();
	}
	
	if(isset($_GET['admin'])){
		
		$institutions = getAllInstitutions($pdo);
		$courses = getAllCourses($pdo);
	
		include 'admin.php';
		exit();
	}
	
	if(isset($_POST['insertInst'])){
		session_unset();
		
		$name = htmlentities($_POST['name']);
		$type = htmlspecialchars($_POST['type']);
		$description = htmlspecialchars($_POST['description']);
		$tution = htmlspecialchars('tution');
		$website = htmlspecialchars($_POST['website']);
		$state = htmlspecialchars($_POST['state']);
		$town = htmlspecialchars($_POST['town']);
		
		$institutions = instCheck($name, $state, $town);
		
		//echo $institutions['name'];
		foreach($institutions as $row){
			
			if($row['name'] == $name and $row['state'] == $state){

				$instError = "$name already exist";
				$_SESSION['instError'] = $instError;
				header("Location: ?admin");
				exit();
				
			}
			
		}

		try{
			$sql = 'INSERT INTO institutions SET
				name = :name,
				type = :type,
				description = :description,
				tution = :tution,
				website = :website,
				state = :state,
				town = :town';
			
			$s = $pdo->prepare($sql);
			$s->bindValue(':name', $name);
			$s->bindValue(':type', $type);
			$s->bindValue(':description', $description);
			$s->bindValue(':tution', $tution);
			$s->bindValue(':website', $website);
			$s->bindValue(':state', $state);
			$s->bindValue(':town', $town);
			$s->execute();	
		}catch(PDOException $e){
			$instError = "Error inserting institution details into database: ".$e->getMessage();
			$_SESSION['instError'] = $instError;
			header("Location: ?admin");
			exit();
		}
		
		$instMessage = "$name have been entered sucessfully";
		$_SESSION['instMessage'] = $instMessage;
	    header("Location: ?admin");
		exit();
		
	}
	
	if(isset($_POST['insertCourse'])){
		session_unset();
		
		$name = htmlspecialchars($_POST['name']);
		$department = htmlspecialchars($_POST['department']);
		$duration = htmlspecialchars($_POST['duration']);
		$level = htmlspecialchars($_POST['level']);
		$honors = htmlspecialchars($_POST['honors']);
		
	//	echo $level;
	//	exit();
		
		$course = courseCheck($name, $department, $level);
		
		//echo $course;
		
		foreach($course as $row){
			if($row['name'] == $name and $row['level'] == $level){
				$courseError = "$name already exist";
				$_SESSION['courseError'] = $courseError;
				header("Location: ?admin");
				exit();
			}
		}
		
		//exit();	

		try{
			$sql = 'INSERT INTO courses SET
				name = :name,
				department = :department,
				duration = :duration,
				level = :level,
				honors = :honors';
			
			$s = $pdo->prepare($sql);
			$s->bindValue(':name', $name);
			$s->bindValue(':department', $department);
			$s->bindValue(':duration', $duration);
			$s->bindValue(':level', $level);
			$s->bindValue(':honors', $honors);
			$s->execute();
		}catch(PDOException $e){
			$courseError = "Error inserting course details into database: ".$e->getMessage();
			$_SESSION['courseError'] = $courseError;
			header("Location: ?admin");
			exit();
		}
		
		$courseMessage = "$name have been entered sucessfully";
		$_SESSION['courseMessage'] = $courseMessage;
	    header("Location: ?admin");
		exit();

	}
	
	if(isset($_POST['insertInstCourse'])){
		session_unset();
		
		$name = htmlspecialchars($_POST['name']);
		$course = htmlspecialchars($_POST['course']);
		
		$instCourse = getInstcourses($pdo, $name, $course);
		
		foreach($instCourse as $row){
				
			if($row['course'] == $course){
				$instCourseError = "This course already exist in $name !!!!";
				$_SESSION['instCourseError'] = $instCourseError;
				header("Location: ?admin");
				exit();
				
			}			
			
		}
		
		try{
			$sql = 'INSERT INTO instcourses SET
				name = :name,
				course = :course';
			
			$s = $pdo->prepare($sql);
			$s->bindValue(':name', $name);
			$s->bindValue(':course', $course);
			$s->execute();
		}catch(PDOException $e){
			$instCourseError = "Error inserting $name course details into database: ".$e->getMessage();
			$_SESSION['instCourseError'] = $instCourseError;
			header("Location: ?admin");
			exit();
		}
		
		$instCourseMessage = "$name $course course have been entered sucessfully";
		$_SESSION['instCourseMessage'] = $instCourseMessage;
	    header("Location: ?admin");
		exit();
	}
	
	if(isset($_POST['register'])){
		
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['pwd']);
		$cpassword = htmlspecialchars($_POST['cpwd']);
		
		if(!($password) == $cpassword){
			$error = "Please your password do not match!!!!";
			include 'register.php';
			exit();
		}

		if(emailCheck($email)){
			$error = "Please this ".$email." address already exit!!!";
			include 'register.php';
			exit();
		}
		
		try{
			$sql = 'INSERT INTO users SET
				name = :name,
				email = :email,
				password = :password';
			
			$s = $pdo->prepare($sql);
			$s->bindValue(':name', $name);
			$s->bindValue(':email', $email);
			$s->bindValue(':password', $password);
			$s->execute();
		}catch(PDOException $e){
			$error = "Error inserting your details into our database: ".$e->getMessage();
			echo $error;
			exit();
		}
		
		echo "Your account have been created Successfuly!!!!"."<br>";
		echo "<span><a href='?login'>Login</a>";
	
	    sleep(5);
	    header("Location: login.php", true, 303);
		exit();
	}
	
	if(isset($_GET['login'])){
		include 'login.php';
		exit();
	}
	
	if(isset($_POST['login'])){
		
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['pwd']);
		
		if(!(check($password, $email))){
			$error ="Your Email or Password is not correct!!!!!!"."<br><br><a href='?login'>Back</a>";
			
			echo $error;
			exit();
		}
		
		$user = check($password, $email);
		
		$username =  $user['name'];
		$userId = $user['id'];
		
		$_SESSION['id'] = $userId;
		$_SESSION['username'] = $username;
		
		header('Location:.');
		exit();
	}

	if(isset($_GET['all'])){
		$course = $_GET['all'];
		$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		$perpage = 5;
		$start = ($page - 1) * $perpage;
		
		$insts = getAllPaginate($pdo, $course, $start, $perpage);
		
		
		$result = getCountAll($pdo ,$course);		
		$course = search($course);
		
		include 'result2.php';
		
		exit();
	}
	
	if(isset($_GET['logout'])){
		//echo "We have loged you out";
		if(isset($_SESSION['username'])){
			session_unset();
		}
		
		header('Location:.');
		exit();
	}
	

    include 'home.php';
    
    
?>