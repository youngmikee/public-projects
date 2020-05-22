    <div id="register" class="middle columns sixteen">
      
      
      <div class="main">
      	
      	<div class="row">
      		
      		<h1><span class="title">Register</span></h1>
      		
      	</div>
      	
      	<div class="left">

			<form action="register/process" method="post">
				
				<p>In order to use the site PORTAL you need to register!</p>
				
				<ul>
					
					<li>
						<select name="account">
							<option value="">Select Account Type</option>
							<option value="admin">Admin</option>
							<option value="staff">Staff</option>
						</select>
					</li>
					
					<li>
						<input type="text" name="firstName" placeholder="First Name"  />
					</li>
					
					<li>
						<input type="text" name="surName" placeholder="Surname" />
					</li>
				
					<li>
						<input type="text" name="email" placeholder="Email" />
					</li>
					
					<li>
						<input type="password" name="pwd" placeholder="Password" />
					</li>

					<li>
						<input type="password" name="cPwd" placeholder="Confirm password" />
					</li>
				
					<li>
						<input type="text" name="staffId" placeholder="Staff Id" />
					</li>
				
					<li>
						<input type="submit" name="register" value="Submit" />
					</li>
					
				</ul>
				
			</form>
      		
      	</div>

		<div class="right">
			
			<div class="login">
				
				<h1>Login</h1>
				
				<p>You currently have an Account?</p>
				<p>You are currently a staff of this company?</p>
				<p>You know your staff ID?</p>
				<p>and you know your Account credentials?</p>
				<p>If you answer is YES to all this Questions, Please Click the Login button bellow.</p>
				
				<a href="<?php echo URL; ?>login">Login</a>
				
			</div>
			
		</div>
      	
      </div>
      
    </div>
