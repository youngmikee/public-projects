    <div id="login" class="middle columns sixteen">
      
      
      <div class="main">
      	
      	<div class="row">
      		
      		<h1><span class="title">Login</span></h1>
      		
      	</div>
      	
      	<div class="left">

			<form action="login/authentication" method="post">
				
				<p>Please make sure you have the right Login details!</p>
				
				<ul>
				
					<li>
						<input type="text" name="email" placeholder="Email" />
					</li>
					
					<li>
						<input type="password" name="pwd" placeholder="Password" />
						<p>Forgot your Email Id/Password: Please contact <b>Admin</b>.</p>
					</li>
				
					<li>
						<input type="submit" name="login" value="Submit" />
					</li>
					
				</ul>
				
			</form>
      		
      	</div>

		<div class="right">
			
			<div class="register">
				
				<h1>Register</h1>
				
				<p>You currently don't have an Account?</p>
				<p>You are currently a staff of this company?</p>
				<p>You know your staff ID?</p>
				<p>and will like to have an Account?</p>
				<p>If you answer is YES to all this Questions, Please Click the Register button bellow.</p>
				
				<a href="<?php echo URL; ?>register">Register</a>
				
			</div>
			
		</div>
      	
      </div>
      
    </div>