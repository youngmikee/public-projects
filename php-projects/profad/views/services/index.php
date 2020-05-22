    <div id="training" class="middle columns sixteen">
      
      <div class="slide">
      	
      	<img src="<?php echo(isset($this->img))? URL.'/'.$this->img : 'public/images/banner/corporate-image.jpg' ?>" alt="business banner"/>
      	
      </div>
      
      <div class="main">
      	
      	<div class="row gray">
      		
      		<h1><span class="title"><?php echo(isset($this->heading)) ? $this->heading : "Business Services" ?></span></h1>
      		
      	</div>
      	
		<div class="row white">
				
	      	<div class="left">
	
				<div class="menu">
					
					<h1>Services</h1>
					
					<?php if(!isset($this->businesses) || empty($this->businesses)): ?>
						
						<a href="#">Health and Social Care</a>
						
						<ul>
							
							<li>
								<a href="#">Level One Health and Social Care</a>
							</li>
							
						</ul>
						
					<?php endif; ?>
					
					<?php if(isset($this->businesses) && !empty($this->businesses) && is_array($this->businesses)): ?>
						
						<?php foreach($this->businesses as $businesses): ?>
									
							<a href="<?php echo(isset($this->controller)) ? URL.$this->controller.'/'.$businesses['title'] : '' ?>"><?php echo $businesses['title'] ?></a>
							
							<?php if(isset($this->services)): ?>
									
								<ul>
									
									<?php foreach($this->services as $services): ?>
										
										<?php if($services['business'] == $businesses['title']): ?>
												
											<li>
												<a href="<?php echo(isset($this->controller)) ? URL.$this->controller.'/'.$businesses['title'].'/'.$services['link'] : '' ?>"><?php echo $services['title'] ?></a>
											</li>
											
										<?php endif; ?>
									
									<?php endforeach; ?>
									
								</ul>
								
							<?php endif; ?>
							
						<?php endforeach; ?>
						
					<?php endif; ?>
					
					<?php if(isset($this->businesses) && !empty($this->businesses) && !is_array($this->businesses)): ?>
						
						<a id="course<?php echo $this->businesses?>" class="tog"  href="#" ><?php echo $this->businesses ?></a>
						
						<?php if(isset($this->services)): ?>
							
							<ul>
							
								<?php foreach($this->services as $services): ?>
									
									<?php if($services['business'] == $this->businesses): ?>
										
										<li>
											
											<a href="<?php echo(isset($this->controller)) ? URL.$this->controller.'/'.$this->businesses.'/'.$services['link'] : '' ?>"><?php echo $services['title'] ?></a>
											
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
						
						<h1>Business Services Information</h1>
						
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
					
					<div class="buttons">
						
						<h1>Please Get intouch and Register your interest Today</h1>
						
						<a href="<?php echo URL; ?>contact Us/#feedback" id="contact">Contact Us</a>
						
						<a href="#" id="apply">Book Appointment</a>
						
					</div>
					
				</div>
				
				<?php if(isset($this->promo) && !empty($this->promo)): ?>
						
					<div class="row">
						
						<ul class="promo">
							
								<li>
									
									<img src="<?php echo(isset($this->promo)) ? URL."/".$this->promo : "" ?>" />
									
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
