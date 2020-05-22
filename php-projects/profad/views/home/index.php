	<div class="chatBtn">
		<input id="chatBtn" type="button" name="chatLink" value="<?php echo(isset($this->chat) and $this->chat > 0) ? "Livechat | Online" : "Livechat | Offline" ?>" />
	</div>
    
    <div class="middle columns sixteen">
      
      <div class="slide">
      	
      	<img src="<?php echo URL; ?>public/images/banner/vocational-training1.jpg" alt="Banners"/>
      	
      </div>
      
      <div class="main">
      	
      	<div class="left">
      		
      		<div class="intro">
      			
      			<h1><?php echo(isset($this->heading))? $this->heading : "Welcome To Profad" ?></h1>
      			
      			<div class="info">
      				
					<?php if(!isset($this->note)): ?>
							
	      				<p>Profad is a registered leading provider of quality Training and Services. Currently offering Vocational, Professional, 
	      					and Corporate Training. We also provide Accounting and Consultancy Services for Individuals and Organizations both 
	      					Public and Private such as Payroll Management, Corporate Tax, Personal Tax and more.
	      				</p>
	      				
	      				<p>Our Vocational courses are Diploma in Health and Social Care, First aid at work, Teacher Training. Our Professional course 
	      					are Manual Preparation of Accounts, Spreadsheet (Excel), Computerized Accounting (Sage) and more. Providing our Students 
	      					with the qualification and experience they need to work in these area.
	      				</p>
	      				
	      				<p>We provide specialist services in Business Consultancy, in relation to Company Formation Registration, Advice on Tax Credits, 
	      					Tax Refund Assistance, Charity Registration and more.
	      				</p>
					
					<?php endif; ?>
					
					<?php if(isset($this->note)): ?>
						
						<?php echo $this->note ?>
						
					<?php endif; ?>
      				
      				<div class="button">
      					
      					<a href="<?php echo URL; ?>about"><span>More</span></a>
      					
      				</div>
      				
      			</div>
      			
      		</div>
      		
			<div class="row">
					
	      		<div class="training">
	      			
	      			<h1>Training</h1>
	      			
	      			<p>We provide training, for Vocational, Professional and Corporate individaual or organization in both public and private sector. 
	      				Some of our training are in Health and Social Care, Security, First Aid at Work, Teaching Qualification, Accounting, People and
	      				Management Skills.
	      			</p>
	  			
	  				<div class="button">
	  					
	  					<a href="<?php echo URL; ?>vocational Training"><span>More</span></a>
	  					
	  				</div>
	      			
	      		</div>
	      		
	      		<div class="services">
	      			
	      			<h1>Services</h1>
	      			
	      			<p>Our services ranges from Accounting to Consultancy, we provide these services for both Individual and Corporate Organization, 
	      				profad's specialist Accountants are ready to help you with all your Accounting needs, e.g. Tax Return, Corporation Tax, PAYE,
	      				and more.
	      			</p>
	      			
	  				<div class="button">
	  					
	  					<a href="<?php echo URL; ?>services"><span>More</span></a>
	  					
	  				</div>
	      			
	      		</div>
				
			</div>
			
			<?php if(!isset($this->note)): ?>
					
				<div class="row">
					
					<div class="acreditations">
						
						<h1>Acreditation</h1>
						
						<p>Profad Quality Training is accredited by the British Accreditation Council (BAC) as a short course provider, this accreditation covers 
							courses delivered in UK only.
						</p>
						
					</div>
					
				</div>
				
			<?php endif; ?>
			
			<div class="row">
				
				<div class="news">
					
					<h1>News &amp; Publications</h1>
					
					<ul>
						
						<?php if(isset($this->news) && $this->news != 0): ?>
							
							<?php foreach($this->news as $news): ?>
								
								<li>
									
									<div class="columns three"> 
									
										<div class="news-img">
											
											<img src="<?php echo URL; ?>public/images/banner/tester1.png" alt="news photograph"/>
											
										</div>
									
									</div>
									
									<div class="columns thirteen">
										
										<div class="date">
											<p>
												
												<?php echo strtoupper($news['headline']) ?>
												
											</p>
										</div>
										
										<div class="info">
											
											<p>
											
												<?php echo $news['news']; ?> <br>
												<b><?php echo $news['date']; ?></b>
												
											</p>
											
											<span>READ MORE...</span>
											
										</div>
										
									</div>
									
								</li>
								
							<?php endforeach; ?>
							
						<?php endif; ?>
						
						
						<?php if(!isset($this->news) || $this->news == 0): ?>
								
							<li>
								
								<div class="columns four"> 
								
									<div class="news-img">
										
										<img src="<?php echo URL; ?>public/images/banner/tester1.png" alt="news photograph"/>
										
									</div>
								
								</div>
								
								<div class="columns twelve">
									
									<div class="date">
										<p>10-25-2023</p>
									</div>
									
									<div class="info">
										
										<p>
										
											I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me 
											and you can start adding your own content and make changes to the font. Feel free to drag and drop me anywhere you 
											like on your page. I’m a great place for you to tell a story and let your users know a little more about you.
											
										</p>
										
										<span>READ MORE...</span>
										
									</div>
									
								</div>
								
							</li>
							
						<?php endif; ?>
						
					</ul>
					
				</div>
				
			</div>
      		
      	</div>

		<div class="right">
			
			<div class="notice">
					
				<div class="contact">
					
					<div class="info">
						
						<h1>Contact Us</h1>
						
						<span>FOR A FREE CONSULTATION</span>
						
						<h1 class="number">+44 (0) 207 639 0839</h1>
						
						<h1 class="number">+44 (0) 207 732 6832</h1>
						
						<p class="address">Profad London<br>
							Unit 30, The Penarth Centre <br>
							Penarth Street, London <br />
							SE15 1TR.
						</p>
						
						<span>Email</span>
						
						<p>info@profad.org</p>
						
					</div>
					
				</div>
				
				<div class="holder">
					
					<div class="arrow"> </div>
					
				</div>
				
			</div>
			
			<div class="porpular">
				
				<h1>Porpular Courses</h1>
				
				<ul>
					
					<li><a href="<?php echo URL; ?>vocational Training/security Training">Security Training</a></li>
					
					<li><a href="<?php echo URL; ?>vocational Training/health And Social Care">Health and Social Care</a></li>
					
					<li><a href="<?php echo URL; ?>vocational Training/First Aid at Work">First Aid at Work</a></li>
					
					<li><a href="<?php echo URL; ?>vocational Training/Teaching Qualification">Teaching Qualification</a></li>
					
					<li><a href="<?php echo URL; ?>vocational Training/Customer Services">Customer Services</a></li>
					
					<li><a href="<?php echo URL; ?>vocational Training/Accounting">Accounting</a></li>
					
				</ul>
				
			</div>
			
			<div class="promotions">
				
				<h1>Current Campaigns</h1>
				
				<ul>
					
					<li>
						<img id="campaign1" src="<?php echo URL; ?>public/images/campaign/profad-campaign2.jpg" alt="School Of Prestig..."/>
						<div id="big1" class="big">
							<div class="row columns sixteen"><button class="closeBig" style="float: right;" >close</button></div>
							<img id="campaign1Big" src="<?php echo URL; ?>public/images/campaign/profad-campaign2.jpg" alt="School Of Prestig..."/>
						</div>
					</li>
					
					<li>
						<img id="campaign2" src="<?php echo URL; ?>public/images/campaign/profad-campaign4.jpg" alt="Exelent Accounting..."/>
						<div id="big2" class="big">
							<div class="row columns sixteen"><button class="closeBig" style="float: right;" >close</button></div>
							<img id="campaign2" src="<?php echo URL; ?>public/images/campaign/profad-campaign4.jpg" alt="Exelent Accounting..."/>
						</div>
					</li>
					
				</ul>
				
			</div>
			
		</div>
      	
      </div>
      
    </div>
