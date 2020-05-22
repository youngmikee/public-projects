

    <div id="portal" class="middle columns sixteen">
      
      <div class="main">
      	
      	<div class="row">
      		
      		<h1><span class="title"><?php echo(isset($this->name)) ? $this->name."'s Dashboard" : "My Dashboard" ?></span></h1>
      		
      	</div>
      	
      	<div class="left">
      		
      		<div class="menu">
      			
      			<h1>Menu</h1>
      			
      			<ul>
      				
      				<li>
      					<button id="dashboardBtn">Dashboard</button>
      				</li>
      				
      				<li>
      					<button id="inboxBtn">Inbox</button>
      				</li>
      				
      				<li>
      					<button id="crudBtn">Crud</button>
      					<ul id="subBtn" class="subBtn">
      						<li><button id="createBtn">Create</button></li>
      						<li><button id="updateBtn">Update</button></li>
      						<li><button id="deleteBtn">Delete</button></li>
      					</ul>
      				</li>
      				
      				<li>
      					<button id="todoBtn">Todo</button>
      				</li>
      				
      				<li>
      					<button id="friendsBtn">Friends</button>
      				</li>
      				
      				<li>
      					<button id="gamesBtn">Games</button>
      				</li>
      				
      				<li>
      					<button id="settingsBtn">Settings</button>
      				</li>
      				
      			</ul>
      			
      		</div>
      		
      	</div>
      	
      	<div class="right">
      		
      <!----------------------------------------------------------------Chat----------------------------------------------------------->
      		
      		<div id="chat" class="chat">
      			
      			<h1>Chat</h1>
      			
      			<div class="row">
      				
      				<form id="dashboardForm" action="portal/chatMsg" method="post">
      					
						<ul>
							
	      					<li>
	      						<div id="dashboardInterface" class="message" > 
	      							
	      							<ul>
	      								
	      								
	      								
	      							</ul>
	      							
	      						</div>
	      					</li>
	      					
	      					<li>
	      						<input type="text" name="msg" placeholder="Type here..." maxlength="200" />
	      					</li>
	      					
	      					<li>
	      						<input type="submit" name="chat" value="Send" />
	      					</li>
							
						</ul>
      					
      				</form>
      				
      				<div class="switch">
      					
      					<input id="on" type="button" name="switch-on" value="On" <?php echo(isset($this->chat)) ? "style='display:none;'" : ""?>/>
      					<input id="off" type="button" name="switch-off" value="Off" <?php echo(isset($this->chat)) ? "style='display:block;'" : ""?>/>
      					
      				</div>
      				
      			</div>
      			
      			
      		</div>
      		
  <!-----------------------------------------------------------------------Inbox-------------------------------------------------->
      				       
      		<div id="blocker">		       
      			<div>Loading Messages...</div>
		   </div>
      		
      		<div id="wait">
      			<h1>Looding Inbox Please Wait....</h1>
      		</div>
      		
      		<div id="inbox" class="inbox">
      			
      			<h1>My inbox</h1>
      			
      			<ul id="message">
      				
      				<li class="heading columns sixteen">
      					
      					<div class="date columns three">
      						Date/Time
      					</div>
      					
      					<div class="subject columns eleven">
      						Subject
      					</div>
      					
      					<div class="delete columns two">
      						Delete
      					</div>
      					
      				</li>
      				
      		<?php if(isset($this->profadMsg) && count($this->profadMsg) <= 0 ): ?>
      				
      				<li class="no-message">
      				
      					<div class="date columns three">
      					</div>
      					
      					<div class="subject columns eleven">
      						No Message in your inbox
      					</div>
      					
      					<div class="delete columns two">
      					</div>	
      				
      				</li>
      				
     		<?php endif ?>

				</ul>
				
      			
      		</div>
      		
      		<div id="inboxMsg" class="inboxMsg columns sixteen">
      			
      			<h1 class="sub">Subject:</h1>
      			<h1 class="frm">From:</h1>
      			<h1 class="dat">Date:</h1>
      			
      			<div class="msgSelected columns sixteen">
      				
      				<div class="row columns sixteen">
      					 
      						<button id="closeMsg">Close</button>
      					
      				</div>
      				
      			</div>
      			
      		</div>
      		
 <!-----------------------------------------------CRUD---------------------------------------------------->
      		<div id="crud">
      			
      			
<!-----------------------------------------------CRUD CREATE---------------------------------------------->    		
      		
	      		<div id="create" class="crud">
	      			
	      			<h1>CRUD Create</h1>
	      			
	      			<div class="row">
	    				
						<button id="business" value="business">Business</button>
						<button id="service" value="services">Services</button>
						<button id="training" value="training">Training</button>
						<button id="course" value="courses">Courses</button>
						<button id="subject" value="subjects">Subjects</button>
						<button id="news" value="news">News</button>
		
	      				<form id="businessForm" action="portal/create/business" method="post">
	      					
	      					<h1>Business</h1>
	      					
							<ul>
	
		      					<li>
		      						<input  type="text" name="title" placeholder="Title" required/>
		      					</li>
		      					
		      					<li>
		      						<input type="text" name="abriviation" placeholder="Abriviation" required/>
		      					</li>
		      			
		      					<li>
		      						<input type="text" name="type" placeholder="type" required/>
		      					</li>
		      					
		      					<li>
		      						<textarea name="note" placeholder="About this business..." maxlength="800"></textarea>
		      					</li>
		      					
		      					
		      					<li>
		      						<input type="submit" name="create" value="Create" />
		      					</li>
								
							</ul>
	      					
	      				</form>
	      				
	      				<form id="serviceForm" action="portal/create/service" method="post">
	      					
	      					<h1>Service</h1>
	      					
							<ul>
	
		      					<li>
		      						<input  type="text" name="title" placeholder="Title" required />
		      					</li>
		      					
		      					<li>
		      						<input type="text" name="business" placeholder="Business" required/>
		      					</li>
		      			
		      					<li>
		      						<input type="text" name="cost" placeholder="Cost" required/>
		      					</li>
		      					
		      					<li>
		      						<textarea name="note" placeholder="About this service..." maxlength="800"></textarea>
		      					</li>
		      					
		      					<li>
		      						<input type="text" name="link" placeholder="Link" required/>
		      					</li>
		      					
		      					<li>
		      						<input type="submit" name="create" value="Create" />
		      					</li>
								
							</ul>
	      					
	      				</form>
	      				
	      				<form id="trainingForm" action="portal/create/training" method="post">
	      					
	      					<h1>Training</h1>
	      					
							<ul>
	
		      					<li>
		      						<input  type="text" name="title" placeholder="Title" required/>
		      					</li>
		      					
		      					<li>
		      						<input type="text" name="abriviation" placeholder="Abriviation" required/>
		      					</li>
		      			
		      					<li>
		      						<input type="text" name="type" placeholder="type" required/>
		      					</li>
		      					
		      					<li>
		      						<textarea name="note" placeholder="About this Training..." maxlength="800"></textarea>
		      					</li>
		      					
		      					
		      					<li>
		      						<input type="submit" name="create" value="Create" />
		      					</li>
								
							</ul>
	      					
	      				</form>
	      				
	       				<form id="courseForm" action="portal/create/course" method="post">
	       					
	       					<h1>Course</h1>
	      					
							<ul>
	
		      					<li>
		      						<input  type="text" name="title" placeholder="Title" required />
		      					</li>
		      					
		      					<li>
		      						<input type="text" name="abriviation" placeholder="Abriviation" required/>
		      					</li>
		      			
		      					<li>
		      						<input type="text" name="training" placeholder="Training" required />
		      					</li>
		      					
		      					<li>
		      						<input type="text" name="link" placeholder="Link" required />
		      					</li>
		      					
		      					<li>
		      						<textarea name="note" placeholder="About this course..." required></textarea>
		      					</li>
		      					
		      					
		      					<li>
		      						<input type="submit" name="create" value="Create" />
		      					</li>
								
							</ul>
	      					
	      				</form>
	      				
	      				
	      				<form id="subjectForm" action="portal/create/subject" method="post">
	      					
	      					<h1>Subject</h1>
	      					
							<ul>
	
		      					<li>
		      						<input  type="text" name="title" placeholder="Title" required/>
		      					</li>
		      					
		      					<li>
		      						<input type="text" name="course" placeholder="Course" required/>
		      					</li>
		      			
		      					<li>
		      						<input type="text" name="training" placeholder="Training" required/>
		      					</li>
		      					
		      					<li>
		      						<input type="text" name="duration" placeholder="Duration" required/>
		      					</li>
		      					
		      					<li>
		      						<input type="text" name="cost" placeholder="Cost" required/>
		      					</li>
		      					
		      					<li>
		      						<textarea name="note" placeholder="About this subject" required></textarea>
		      					</li>
		      					
		      					<li>
		      						<input type="text" name="location" placeholder="Location" required/>
		      					</li>
		      					
		      					<li>
		      						<input type="text" name="link" placeholder="link" required/>
		      					</li>
		      					
		      					<li>
		      						<input type="submit" name="create" value="Create" />
		      					</li>
								
							</ul>
	      					
	      				</form>
	      				
	      				
	       				<form id="newsForm" action="portal/create/news" method="post">
	       					
	       					<h1>News &amp; Publications</h1>
	      					
							<ul>
	
		      					<li>
		      						<input  type="text" name="title" placeholder="Title" required />
		      					</li>
		      					
		      					<li>
		      						<input type="text" name="headline" placeholder="Headline" required/>
		      					</li>
		      					
		      					<li>
		      						<textarea name="news" placeholder="News..." required></textarea>
		      					</li>
		      					
		      					<li>
									<select name="image">
								
								<?php if(isset($this->newsImgs)): ?>
									
									<?php echo(count($this->newsImgs) > 0) ? "<option>Select Image</option>" : "<option value='defaultImg'>No Available Image</option>" ?>
									
									<?php foreach($this->newsImgs as $item): ?>
									
										<option value="<?php echo $item['location']."/".$item['title'].$item['type'] ?>"><?php echo $item['title'] ?></option>
									
									<?php endforeach; ?>
								
								<?php endif; ?>
									</select>
		      					</li>
		      				      					
		      					<li>
		      						<input type="submit" name="create" value="Create" />
		      					</li>
								
							</ul>
	      					
	      				</form>
	      				
	      				<div class="info">
	      					
	      					<h1>Important</h1>
	      					
	      					<p id="crudNotice">
	      						Please make sure you know what you are doing..
	      					</p>
	      					
	      					<h1 id="crudOk">
	      						1 row have been Successfully Added..
	      					</h1>
	      					
	      					<h1 id="crudFail">
	      						Crud unsuccessful: Maybe already exist or form not complete...
	      					</h1>
	      					
	      				</div>
	      				
	      			</div>
	      			
	      		</div>
      		

<!------------------------------------------------CRUD UPDATE-------------------------------->      		

	      		<div id="update" class="crud">
	      			
	      			<h1>CRUD Update</h1>
	      					
	      			<div class="row">
	      				
	      				<form id="updateForm" action="portal/update" method="post">
	      					
							<ul>
								
								<li>
									<select id="updateTables" name="dbTable" required >
										<option value="">Select DB Table</option>
										<option id="businessesTable" value="businesses">Business</option>
										<option id="servicesTable" value="services">Services</option>
										<option id="trainingsTable" value="training">Training</option>
										<option id="coursesTable" value="courses">Courses</option>
										<option id="subjectsTable" value="subjects">Subjects</option>
										<option id="newsTable" value="news">News</option>
									</select>
								</li>
								
								<li>
									<select id="updateRows" name="dbRow" required>
										<!-- Ajax -->
									</select>
								</li>
		      					
								<li>
									<select id="dbColumns" name="dbColumn" required>
										<!-- Ajax -->
									</select>
								</li>
								
		      					<li>
		      						<textarea id="dbInput" name="dbInput" placeholder="Enter Changes here......" maxlength="800"></textarea>
		      					</li>
		      					
		      					<li>
		      						<input type="submit" name="update" value="Update" />
		      					</li>
								
							</ul>
	      					
	      				</form>
	      				
	      				<div class="info">
	      					
	      					<h1>!Important</h1>
	      					
	      					<p id="updateNotice">
	      						Please make sure you know what you are doing..
	      					</p>
	      					
	      					<h1 id="updateOk">
	      						1 row have been Successfully Updated..
	      					</h1>
	      					
	      					<h1 id="updateFail">
	      						Update unsuccessful: Maybe already exist or form not complete...
	      					</h1>
	      					
	      				</div>
	      				
	      			</div>
	      			
	      		</div>
	 
 
 <!------------------------------------------------CRUD DELETE------------------------------------------->
	      		
	      		<div id="delete" class="crud">
	      			
	      			<h1>CRUD Delete</h1>
	      			
	      			<div class="row">
	      				
	      				<form id="deleteForm" action="portal/delete" method="post">
	      					
							<ul>
								
								<li>
									<select id="deleteTables" name="dbTable" required>
										<option value="">Select DB Table</option>
										<option value="businesses">Business</option>
										<option value="services">Services</option>
										<option value="training">Training</option>
										<option value="courses">Courses</option>
										<option value="subjects">Subjects</option>
										<option value="news">News</option>
									</select>
								</li>
								
								<li>
									<select id="deleteRows" name="dbRow">
										<option value="">Select Table Row</option>
										<!-- Ajax -->
									</select>
								</li>
		      					
		      					<li>
		      						<input type="submit" name="delete" value="Delete" />
		      					</li>
								
							</ul>
	      					
	      				</form>
	      				
	      				<div class="info">
	      					
	      					<h1>!Important</h1>
	      					
	      					<p id="deleteNotice">
	      						Please make sure you know what you are doing..
	      					</p>
	      					
	      					<h1 id="deleteOk">
	      						1 row have been Successfully Updated..
	      					</h1>
	      					
	      					<h1 id="deleteFail">
	      						Update unsuccessful: Maybe already exist or form not complete...
	      					</h1>
	      					
	      				</div>
	      				
	      			</div>
	      			
	      		</div>
	      		
	      	</div>
      		
      	</div>
      	
      </div>
      
    </div>

