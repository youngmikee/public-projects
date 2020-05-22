			
			
			<div id="controller-list" class="row columns sixteen">
			
				<div class="content">
	
					<div class="heading">
						<?php echo(isset($this->tag_title))? $this->tag_title : "Complete List" ?>
					</div>
					
					<div class="list">
						
						<ul class="table columns sixteen">
							
							<?php if(isset($this->lists)) foreach($this->lists as $list): ?>
								
								<li class="table-row">
									
									<a href="<?php echo URL; ?><?php echo(isset($this->controller)) ? $this->controller : "services" ?>/<?php echo $list['business'] ?>/<?php echo $list['link'] ?>"><?php echo $list['title'] ?></a>
								
								</li>
								
							<?php endforeach; ?>
							
						</ul>
						
					</div>
	
				</div>
				
			</div>