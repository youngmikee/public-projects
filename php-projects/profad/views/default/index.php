    <div id="training" class="middle columns sixteen">
      
      <div class="slide">
      	
      	<img src="<?php echo URL; ?><?php echo(isset($this->img))? $this->img : "public/images/banner/corporate-image.jpg" ?>" alt="Vocational/Professional/Corporate Training banner"/>
      	
      </div>
      
      <div class="main">
      	
      	<div class="row gray">
      		
      		<h1><span class="title"><?php echo(isset($this->heading)) ? $this->heading : "Vocational Training" ?></span></h1>
      		
      	</div>
      	
		<div class="row white">
				
	      	<div class="left">
	
				<div class="menu">
					
					<h1>Courses</h1>
					
					<?php if(!isset($this->courses) || empty($this->courses)): ?>
						
						<a href="#">Health and Social Care</a>
						
						<ul>
							
							<li>
								<a href="#">Level One Health and Social Care</a>
							</li>
							
						</ul>
						
					<?php endif; ?>
					
					<?php if(isset($this->courses) && !empty($this->courses) && is_array($this->courses)): ?>
						
						<?php $total = count($this->courses) ?>
						
						<?php foreach($this->courses as $courses): ?>
							
							<a id="course<?php echo $courses['id']?>" class="tog"  href="<?php echo URL; ?><?php echo(isset($courses['link'])) ? $this->controller."/".$courses['link'] : "" ?>"><?php echo $courses['title'] ?></a>
							
							<?php if(isset($this->subjects)): ?>
								
								<ul id="<?php echo $courses['abriviation']?>" class="course<?php echo $courses['id']?> <?php echo($total > 2) ? 'noSub' : "" ?>">
									
									<?php foreach($this->subjects as $subjects): ?>
										
										<?php if($subjects['course'] == $courses['title']): ?>
														
											<li>
												
												<a href="<?php echo URL; ?><?php echo(isset($this->controller)) ? $this->controller.'/'.$courses['link'].'/'.$subjects['link'] : "" ?>">
													
													<?php echo $subjects['title']; ?>
													
												</a>
												
											</li>
											
										<?php endif; ?>
										
									<?php endforeach; ?>
									
								</ul>
								
							<?php endif; ?>
						
						<?php endforeach; ?>
						
					<?php endif; ?>
					
					
					<?php if(isset($this->courses) && !empty($this->courses) && !is_array($this->courses)): ?>
						
						<a id="course<?php echo $this->courses?>" class="tog"  href="#" ><?php echo $this->courses ?></a>
						
						<?php if(isset($this->subjects)): ?>
							
							<ul>
							
								<?php foreach($this->subjects as $subjects): ?>
									
									<?php if($subjects['course'] == $this->courses): ?>
										
										<li>
											
											<a href="<?php echo(isset($this->controller)) ? URL.$this->controller.'/'.$this->courses.'/'.$subjects['link'] : '' ?>"><?php echo $subjects['title'] ?></a>
											
										</li>
										
									<?php endif; ?>
									
								<?php endforeach; ?>
							
							</ul>
							
						<?php endif; ?>
						
					<?php endif; ?>
					
				</div>
	      		
	      	</div>
	
			<div class="right">
	
				<div class="introduction">
					
					<?php if(!isset($this->note)): ?>
					
						<h1>Training Information</h1>
						
						<p>These are Work based Qualification, designed to equip learners with Vocational skills and knowledge needed to carry out various tasks, 
							Ranging from Health and Social Care, First Aid at Work, Security, Teaching, Customer Service and more. A Diploma qualification in any 
							of these is an essential requirement for any individual looking to carry out these task in England, Wales and Northern Ireland.
						</p>
						
						<p>These are the recognized qualifications for Health and Social Care workers, First Aid workers, Teaching Assistants, Teachers, Customer Service and many more</p>
						
						<p>At Profad Quality Training, We are delighted at the prospect of you considering to have your next training course(s) with us . We will 
							endeavor to provide and make available for you all necessary information and materials on our website for your intended course(s) as we 
							continue to update the site as regularly as possible as new information is made available.
							
							<h2><u>Provision</u></h2>
							<ul>
								<li>Food</li>
								<li>Beans</li>
							</ul>
						</p>
					
					<?php endif; ?>
					
					<?php if(isset($this->note)): ?>
						
						<?php echo $this->note; ?>
					
					<?php endif; ?>
					
				</div>
				
				<div class="row">
					
					<div class="acreditations">
						
						<h1>Acreditation</h1>
						
						<p>Profad Quality Training is accredited by the British Accreditation Council (BAC) as a short course provider, this accreditation covers 
							courses delivered in UK only.
						</p>
						
					</div>
					
				</div>
				
				<div class="row">
					
					<div class="buttons">
						
						<h1>Please Get intouch and Register your interest Today</h1>
						
						<button id="apply">Apply</button>
						
						<div class="applicationForm">
							<div style="width: 100%; height: 30px;"><input type="button" id="closeApply" style="float: right;" value="Close"/></div>
							<form id="applicationForm"  method="post" action="contact Us/application">
								<h1>Quick Application</h1>
								<label>Your Name:</label>
								<input type="text" name="name" />
								<label>Your Email:</label>
								<input type="text" name="email" />
								<label>Your Mobile:</label>
								<input type="tel" name="mobile" />
								<label>Choosen Training / Course Name:</label>
								<input type="text" name="course" />
								<input type="submit" name="" value="Apply" />
							</form>
							<div id="applicationSent"><p>Application Sent !</p></div>
							
							<div id="applicationFail"><p>Application not Sent !</p></div>
						</div>
						
						<a href="#" id="prospectus">Download Prospectus</a>
						
					</div>
					
				</div>

				<?php if(isset($this->promo) && !empty($this->promo)): ?>
						
					<div class="row">
						
						<ul class="promo">
							
								<li>
									
									<img src="<?php echo(isset($this->promo)) ? URL.'/'.$this->promo : "" ?>" />
									
								</li>
									
								<li>
									
									<img style="float: right;" src="<?php echo(isset($this->promo1)) ? URL.'/'.$this->promo1 : "" ?>" />
									
								</li>
							
						</ul>
						
					</div>
					
				<?php endif; ?>
	
			</div>
			
		</div>
      	
      </div>
      
    </div>


