<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php echo (isset($this->title)) ? $this->title : "Profad | Training &amp; Services" ?></title>
  <meta name="description" content="">
  <meta name="author" content="u2mic_000">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  
  <!-- Styles -->
  <link rel="stylesheet" href="<?php echo URL; ?>public/css/mystyle.css" /> 
  
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Signika:400,600,700,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
  <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lobster|Pacifico|Indie+Flower' rel='stylesheet' type='text/css'>
  
  <!-- Google Maps -->
  <script src="http://maps.googleapis.com/maps/api/js"></script>
  
   <!--Jquery-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
  </script>
  <script src="<?php echo URL; ?>public/js/myJqueryFunctions.js"></script>
 
  
</head>

<body id="onlineMessenger">
  <div class="container">

	<div class="top columns sixteen">
		
	    <header class="">
	  		
	  		<h1>Live Messenger</h1>    
	  
	    </header>
		
	</div>

	
    <div class="middle columns sixteen">
      
		<div id="stag1" class="row">
			
	      <div class="main">
	      	
	      	<div class="left">
	
				<form id="connectForm" action="connect" method="post">
					
					<p>Please enter details to <b>Connect !</b></p>
					<p><br></p>
					<ul>
					
						<li>
							<input type="text" name="name" placeholder="Name" required="Please Enter Your Name"/>
						</li>
						
						<li>
							<input type="text" name="email" placeholder="Email" required="Please enter a valid emailAddress" />
						</li>
						
						<li>
							<input type="text" name="subject" placeholder="Subject" required="Please Enter a Subject" />
							<p><br></p>
						</li>
					
						<li>
							<input type="submit" name="liveMessage" value="Start" />
						</li>
						
					</ul>
					
				</form>
				
				<div id="connectFail" class="row">
					
					<h1>! Message</h1>
					
					<p>Sorry you can't be connected right now...</p>
					<p>Please click <a href="<?php echo URL; ?>contact Us/messenger">here</a> to send an offline message. Thanks</p>
					
				</div>
	      		
	      	</div>
	
			<div class="right">
	
				
			</div>
	      	
	      </div>
			
		</div>
		
		<div id="stag2" class="row">
			
	      <div class="main">
	      	
	      	<div class="left">
	
				<form id="chatForm" action="chatMsg" method="post">
					
					<p>Connected to live <b>Chat</b></p>
					<a id="stopChat" >End Chat</a>
					<ul>
					
						<li>
							<div id="interface" class="message">
								
								<ul>	
									
								</ul>
								
							</div>
						</li>
						
						<li>
							<input type="text" name="msg" placeholder="Type here..." maxlength="200" />
						</li>
					
						<li>
							<input type="submit" name="liveMessage" value="Send" />
						</li>
						
					</ul>
					
				</form>
	      		
	      	</div>
	      	
	      </div>
			
		</div>
      
    </div>
   	<div class="bottom columns sixteen">
			
	    <footer>
	    	
	     	<div class="copy-right columns sixteen">
	     		
	     		<p>&copy; <?php echo date("Y")?> by <b>Sminglus</b> Inc</p>
	     		
	     	</div>
	     	
	    </footer>
		
	</div>
  </div>
</body>
</html>
<script>
window.onbeforeunload = function(){
   clearInterval(chat2);
}
</script>
