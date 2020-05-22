						
    <div id="contact" class="middle columns sixteen">
      
      
      <div class="main">
      	
      	<div class="row">
      		
      		<h1><span class="title">Contact</span></h1>
      		
      	</div>
      	
      	<div class="left">
      		
      		<div class="address">
      			
      			<h1>Address</h1>
      			
      			<p>Unit 30, The Penarth Centre<br />
      				Penarth Street, London<br />
      				SE15 1TR.
      			</p>
      			
      		</div>

			<div class="map">
				
				<div id="googleMap" class="google-maps"></div>
				
			</div>
      		
      	</div>

		<div class="right">
			
			<div class="telephone">
				
				<h1>Telephone, Fax &amp; Email</h1>
				
				<span class="tel">+44 (0) 207 639 0839 </span>
				<br />
				<span class="tel">+44 (0) 207 732 6832</span>
				<br />
				<span class="fax">+44 (0) 207 681 3003</span>
				<br />
				<span class="email">info@profad.org</span>
				<br />
				<span class="web"><a href="http://www.profad.org">www.profad.org</a></span>
				
			</div>
			
			<div class="feedback">
				
				<a style="visibility: hidden;" name="feedback">Feedback</a>
				
				<form id="feedbackForm" action="contact Us/feedback" method="post">
					
					<input type="text" name="name" placeholder="Name" required="" />
					
					<input type="email" name="email" placeholder="Email" required="" />
					
					<input type="text" name="subject" placeholder="Subject" required="" />
					
					<textarea name="message" placeholder="Message" maxlength="70" ></textarea>
					
					<input type="submit" name="send" title="send" value="Send" />
					
					
				</form>
				
				<h1 id="feedbackSent">Message Sent!</h1>
				
			</div>
			
		</div>
      	
      </div>
      
    </div>

	<script>
	
		var myCenter = new google.maps.LatLng(51.483833,-0.055048);
		
		function initialize(){
			
			var mapProp = {
				center:myCenter,
				zoom:15,
			    panControl:true,
			    zoomControl:true,
			    mapTypeControl:true,
			    scaleControl:true,
			    streetViewControl:true,
			    overviewMapControl:true,
			    rotateControl:true, 
			    zoomControlOptions: {
			    	style:google.maps.ZoomControlStyle.DEFAULT
			    },
			    
				mapTypeId:google.maps.MapTypeId.ROADMAP
			};
			var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
			
			var marker=new google.maps.Marker({
			  position:myCenter,
			  });
			  
			marker.setMap(map);
			
			var infowindow = new google.maps.InfoWindow({
			  content:"Unit 30, The Penarth Center	Penarth Street, London	SE15 1TR."
			  });
			
			google.maps.event.addListener(marker, 'mouseover', function() {
			  infowindow.open(map,marker);
			  });
		
		}
		
		google.maps.event.addDomListener(window, 'load', initialize);
		
	</script>
