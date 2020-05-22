$(document).ready(function(){
	
	var wait = 0;
	var init = 0;
	var staffsMsg = 0;
	var checkEngage;
	var getChatMsgs;
	var off = 0;
	//var on = 1;
	var chat;
	var chat2;
	var chatON = 0;
	var messenger = 0;
	
	/*
	
	$('.noSub').hide();
	$('#PST li').show();
	$('#HSC li').show();
	$('.tog').mouseenter(function(){
		
		var clas = $(this).attr('id');
		clas = "." + clas;
		
		$(clas).show("slow");
		
	});
	
	
	$('.noSub').mouseleave(function(){
		
		var id = $(this).attr('id');
		id = "#" + id;
		
		$(id).hide("slow");
		
	});

	*/
	
	$('#apply').click(function(){
		$('.applicationForm').show("slow");	
		
	});
	
	$('#applicationForm').submit(function( event ){
		//alert(1);
		event.preventDefault();
		
		var $form = $(this),
		name = $form.find( "input[name='name']" ).val(),
		email = $form.find( "input[name='email']" ).val(),
		mobile = $form.find( "input[name='mobile']" ).val(),
		course = $form.find( "input[name='course']" ).val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, { name: name, email: email, mobile: mobile, course: course} );
		
		posting.done(function( data ){
			
			if(data == 1){
				
				name = $form.find( "input[name='name']" ).val(''),
				email = $form.find( "input[name='email']" ).val(''),
				mobile = $form.find( "input[name='mobile']" ).val(''),
				course = $form.find( "input[name='course']" ).val(''),
				
				$('#applicationSent').toggle();
				
			    setTimeout(function(){
					$('#applicationSent').toggle();
				}, 4000);
				
			}else{
				
				$('#applicationFail').toggle();
				
			    setTimeout(function(){
					$('#applicationFail').toggle();
				}, 5000);
				
			}
			
	
		});
		
		//console.log(term);
		
		
	});
	
	$('#closeApply').click(function(){
		$('.applicationForm').hide("slow");	
	});

	$('#campaign1').click(function(){
		$('#big1').show("slow");
	});
	
	$('#campaign2').click(function(){
		$('#big2').show("slow");
	});

	$('.closeBig').click(function(){
		$('.big').hide("slow");
	});
	
	


/***********************************DASHBOARD CHAT***************************************/


/**************ON CHAT************************/
	
    $("#on").click(function(){
        $(this).hide();
        $("#off").show();
        $.get('portal/onChat', function(data){
    
    		//console.log(data);
        	
        });
        
	    
		chat = setInterval(function(){
				
				$.getJSON('portal/checkEngage', function(visitor){
		        	if(visitor == 0){
		        		
		        		console.log("no engaged visitor");
		        		
		        	}else{
		     
				        $.getJSON('portal/getChatMsgs', function(message){
				        	if(message == 0){
				        		
								$('#chatHead').remove();
				        		$('#dashboardInterface ul').append('<li id="chatHead"><div class="columns sixteen chatRow"> <p>Hi am ' + visitor[0].visitor + ' and i will like some assistance with: <b>' + visitor[0].subject + '?</b> </p> </div></li>');
				        		
				        	}else{
				        		
				        		//console.log(message.length);
				        		if(message.length > messenger){

									$('.msgList').remove();
									$.each(message, function(key, value){
										
				        			
					        			$('#dashboardInterface ul').append('<li class="msgList row columns sixteen"><div class="columns three"> <b>' + value.time + ' <br> ' + value.sender + ':</b></div><div class="columns thirteen chatRow"> ' + value.message + ' </div></li>');
					        
										
									});
			
				        		}
				        		
				        		messenger = message.length;
				        		
				        	}
				
				        });

		        		
		        	}
		
		        });
				        
		}, 1000);
 
       
       
    });
    

 /************************************STAFF CHAT FORM*******************************************/
   
	$('#dashboardForm').submit(function( event ){
		//alert(1);
		event.preventDefault();
		
		var $form = $(this),
		 msg = $form.find( "input[name='msg']" ).val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, { msg: msg } );
		
		posting.done(function( data ){
			
			if(data == 1){
								
				msg = $form.find( "input[name='msg']" ).val('');
				//console.log(10);
				//staffMsg = 1;
				
			}else{
				
				alert(data);
				
			}
			
	
		});
		
		//console.log(term);
		
		
	});   
	

    
 /******************************LIVE CHAT******************************************/

    $("#chatBtn").click(function(){
		 var value = $(this).attr("value");
		 //alert(value);
		if(value == "Livechat | Offline"){
			window.open('contact Us/messenger','MsgWindow', 'width=400, height=485');
		}else{
			//alert(value);
			window.open('contact Us/liveMessenger','MsgWindow', 'width=400, height=480');
		}	
			
    });
    
 
 /************************************CONNECT FORM*******************************************/
   
	$('#connectForm').submit(function( event ){
		//alert(1);
		event.preventDefault();
		
		var messengers = 0;
		
		var $form = $(this),
		name = $form.find( "input[name='name']" ).val(),
		email = $form.find( "input[name='email']" ).val(),
		subject = $form.find( "input[name='subject']" ).val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, { name: name, email: email, subject: subject } );
		
		posting.done(function( data ){
			
			if(data == 0){
				
				//alert(data);
				$('#connectForm').toggle();
				$('#connectFail').toggle();
								
			}else{
				
				name = $form.find( "input[name='name']" ).val(''),
				email = $form.find( "input[name='email']" ).val(''),
				subject = $form.find( "input[name='type']" ).val('');
				
				
				$('#stag1').toggle();
				$('#stag2').toggle();
				
				//console.log("Welcome To LiveChat with Profad Training and Services");
				
				
				chat = setInterval(function(){
						
					$.getJSON('checkEngage', function(staff){
						
						if(staff == 0){
							
							if(messengers > 0){
								
								setTimeout(function(){
									
									$('#interface ul').append('<li><div class="columns sixteen"> <p>Thanks: Chat is Ended...</p> </div></li>');
									
								}, 2000);
								
							}else{
								
								console.log("Staff is not engaged");
								
							}
							
						}else{
							
					        $.getJSON('getChatMsgs', function(message){
					        	if(message == 0){
										        		
									setTimeout(function(){
										
										$('.welcom').remove();
										
										$('#interface ul').append('<li><div class="welcom columns sixteen"> <p>Welcome: please an adviser will be with you shortly...</p> </div></li>');
										
									}, 2000);
					        		
					        		//console.log("no msg");
					        		
					        	}else{
					        		
					        		//console.log(message.length);	
					        		$('.welcom').remove();	 
					        		
					        		if(message.length > messengers){
		
										$('.msgList').remove();
		
										$.each(message, function(key, value){
											
					        			
						        			$('#interface ul').append('<li class="msgList row columns sixteen"><div class="columns three"> <b>' + value.time + ' <br> ' + value.sender + ':</b></div><div class="columns thirteen chatRow"> ' + value.message + ' </div></li>');
						        
											
										});
				
					        		}
					        		
					        		messengers = message.length;   			
					        		
					        	}
					
					        });							
							
						}
						
					});
					
				}, 2000);
				
			}
			
	
		});
		
		//console.log(term);
		
		
	}); 
	

 /************************************VISITOR CHAT FORM*******************************************/
   
	$('#chatForm').submit(function( event ){
		//alert(1);
		event.preventDefault();
		
		var $form = $(this),
		 msg = $form.find( "input[name='msg']" ).val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, { msg: msg } );
		
		posting.done(function( data ){
			
			if(data == 1){
								
				msg = $form.find( "input[name='msg']" ).val('');
				
			}else{
				
				alert(data);
				
			}
			
	
		});
		
		//console.log(term);
		
		
	});      
	
	
/*****************************STOP CHAT BTN*****************************************/

	$('#stopChat').click(function(){
		//window.close();
		$.get('contact Us/disConnect', function(data){
			
			clearInterval(chat);
			
		});
	});

  /**************************************************OFF CHAT***********************************/  
    $("#off").click(function(){
        $(this).hide();
        $("#on").show();
        $.get('portal/offChat', function(data){
        	
        	$('.chatRow').parent().remove();
        	clearInterval(chat);
        	
        });
       
       engaged = 0;
       
       
    });
    
    $("#logo").click(function(){
   		 $(this).attr({
	        "href" : "http://www.w3schools.com/jquery",
	        "title" : "W3Schools jQuery Tutorial"
    	});
    });
    

    
/*************************DASHBOARD BUTTON*****************************************/
    $("#dashboardBtn").click(function(){
    	$("#chat").show("slow");
    	$("#inbox").hide();
    	$(".crud").hide();
    });
    
    
/***********************INBOX BUTTON************************************/
    $("#inboxBtn").click(function(){  

		var msg1 = 0;
		
		if(wait == 0){
			$('#wait').toggle();
			wait = 1;
		}
		
		//$("#blocker").show();
    	
		
		setInterval(function(){

	        $.getJSON('portal/getMsgs', function(data){

		       	if(data.length > msg1 || data.length < msg1 ){
		       		
    	 			// if its already set remove and put new.
    	 			$(".yes-message").remove();
		       		
	    	 		for (var i = 0; i < data.length; i++){
					
			        	if(data[i].viewed == 1){
							//$(".yes-message").remove();
 							$('#inbox ul').append('<li class="yes-message" style=" background-color: white "> <div class="date columns three">'+ data[i].date +'</div> <div frm=" '+ data[i].sender + ' " dat=" ' + data[i].date + ' " rel=" ' + data[i].id + ' " val=" ' + data[i].message + ' " class="subject columns eleven">'+ data[i].subject +'</div> <div class="delete columns two"> <button class="del" rel="'+ data[i].id +'">Delete</button> </div> </li>');
			   							
						}else{
							
			            	$('#inbox ul').append('<li class="yes-message id=" row' + i + ' "> <div class="date columns three">'+ data[i].date +'</div> <div frm=" '+ data[i].sender + ' " dat=" ' + data[i].date + ' " rel=" ' + data[i].id + ' " val=" ' + data[i].message + ' " class="subject columns eleven">'+ data[i].subject +'</div> <div class="delete columns two"> <button class="del" rel="'+ data[i].id +'">Delete</button> </div> </li>');
			        								
						}
			        
			        }
						        
					$(".del").click(function(){
						
						delItem = $(this);
						var id = $(this).attr('rel');
						
						$.post('portal/delMsg', {'id': id} ,function(data, status){
							
							delItem.parent().parent().remove();
							
						}, 'json');
						
					});
					
					$('.subject').click(function(){
						
						clicked = $(this);
						var msg = $(this).attr('val');
						var id = $(this).attr('rel')
						var sub = $(this).text();
						var frm = $(this).attr('frm');
						var dat = $(this).attr('dat');
						
						$.post('portal/viewedMsg', {'id': id}, function(data, status){
							
							clicked.parent().css("background-color", "white");
							
						});
						
						$(".data").remove();
						$(".field").remove();
						$('#inboxMsg .sub').append('<span class="data"> ' + sub + ' </span>');
						$('#inboxMsg .frm').append('<span class="data"> ' + frm + ' </span>');
						$('#inboxMsg .dat').append('<span class="data"> ' + dat + ' </span>');
						$('.msgSelected').append('<div class="row columns sixteen field"> '+ msg + ' </div>');
						
						//alert(id);
						$('#inbox').hide("slow");
						$('#inboxMsg').show("slow");
						
					});
	       		
		       	}
		       	
		       	msg1 = data.length;
		        
			});

		}, 3000);
    	
    	
    	setTimeout(function(){
		    //$("#blocker").hide();
		    $("#wait").hide();
		}, 3000);
    	
    	$("#chat").hide();
    	if(init == 0){
    		$("#inbox").delay(3000).show("slow");
    		init = 1;
    	}else{
    		$("#inbox").show("slow");
    	}
    	$(".crud").hide();
    	
    });
    
 
/***************************CLOSE SELECTED MESSAGE***********************************/
	
	$("#closeMsg").click(function(){

		$('#inbox').show("slow");
		$('#inboxMsg').hide("slow");
		
	});

  
/**************************CRUD BUTTON*********************************************/  
    $("#crudBtn").click(function(){
    	$("#subBtn").toggle(function(){
		    $("#crudBtn").click(function(){
		    	$("#create").hide();
		    	$("#update").hide();
		    	$("#delete").hide();
		    });
    	});
    	
    });

/*************************CREATE UPDATE DELETE*************************************/
    
    $("#createBtn").click(function(){
    	$("#create").show("slow");
    	$("#update").hide();
    	$("#delete").hide();
    	$("#chat").hide();
    	$("#inbox").hide();
    });
    
    $("#updateBtn").click(function(){
    	$("#create").hide();
    	$("#update").delay(3000).show("slow");
    	$("#delete").hide();
    	$("#chat").hide();
    	$("#inbox").hide();
    });
    
    $("#deleteBtn").click(function(){
    	$("#create").hide();
    	$("#update").hide();
    	$("#delete").show("slow");
    	$("#chat").hide();
    	$("#inbox").hide();
    });
    
/**************************CRUD CREATE BUTTON OPTIONS*******************************/
    $("#business").click(function(){
    	$("#businessForm").show("slow");
    	$("#serviceForm").hide();
    	$("#trainingForm").hide();
    	$("#courseForm").hide();
    	$("#subjectForm").hide();
    	$("#newsForm").hide();
    });
    
    $("#service").click(function(){
    	$("#businessForm").hide();
    	$("#serviceForm").show("slow");
    	$("#trainingForm").hide();
    	$("#courseForm").hide();
    	$("#subjectForm").hide();
    	$("#newsForm").hide();
    });
    
    $("#training").click(function(){
    	$("#businessForm").hide();
    	$("#serviceForm").hide();
    	$("#trainingForm").show("slow");
    	$("#courseForm").hide();
    	$("#subjectForm").hide();
    	$("#newsForm").hide();
    });
    
    $("#course").click(function(){
    	$("#businessForm").hide();
    	$("#serviceForm").hide();
    	$("#trainingForm").hide();
    	$("#courseForm").show("slow");
    	$("#subjectForm").hide();
    	$("#newsForm").hide();
    });
    
    $("#subject").click(function(){
    	$("#businessForm").hide();
    	$("#serviceForm").hide();
    	$("#trainingForm").hide();
    	$("#courseForm").hide();
    	$("#subjectForm").show("slow");
    	$("#newsForm").hide();
    });
    
    $("#news").click(function(){
    	$("#businessForm").hide();
    	$("#serviceForm").hide();
    	$("#trainingForm").hide();
    	$("#courseForm").hide();
    	$("#subjectForm").hide();
    	$("#newsForm").show("slow");
    });
    


    
/********************************CREATE BUSINESS*********************************/
	 
	$('#businessForm').submit(function( event ){
		//alert(1);
		event.preventDefault();
		
		var $form = $(this),
		title = $form.find( "input[name='title']" ).val(),
		abr = $form.find( "input[name='abriviation']" ).val(),
		type = $form.find( "input[name='type']" ).val(),
		note = $form.find( "textarea[name='note']" ).val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, { title: title, abr: abr, type: type, note: note } );
		
		posting.done(function( data ){
			
			if(data == 1){
						
				title = $form.find( "input[name='title']" ).val(''),
				abr = $form.find( "input[name='abriviation']" ).val(''),
				type = $form.find( "input[name='type']" ).val(''),
				note = $form.find( "textarea[name='note']" ).val('');
				
				$('#crudNotice').toggle();
				$('#crudOk').toggle();
				
			    setTimeout(function(){
					$('#crudNotice').toggle();
					$('#crudOk').toggle();
				}, 3000);
				
			}else{
				//alert(data);
				
				$('#crudNotice').toggle();
				$('#crudFail').toggle();
				
			    setTimeout(function(){
					$('#crudNotice').toggle();
					$('#crudFail').toggle();
				}, 5000);
				
			}
			
	
		});
		
		//console.log(term);
		
		
	});

/*****************************CREATE SERVICES***********************************/

	$('#serviceForm').submit(function( event ){
		//alert(1);
		event.preventDefault();
		
		var $form = $(this),
		title = $form.find( "input[name='title']" ).val(),
		business = $form.find( "input[name='business']" ).val(),
		cost = $form.find( "input[name='cost']" ).val(),
		note = $form.find( "textarea[name='note']" ).val(),
		link = $form.find( "input[name='link']" ).val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, { title: title, business: business, cost: cost, note: note, link: link } );
		
		posting.done(function( data ){
			
			if(data == 1){
						
				title = $form.find( "input[name='title']" ).val(''),
				business = $form.find( "input[name='business']" ).val(''),
				cost = $form.find( "input[name='cost']" ).val(''),
				note = $form.find( "textarea[name='note']" ).val(''),
				link = $form.find( "input[name='link']" ).val('');
				
				$('#crudNotice').toggle();
				$('#crudOk').toggle();
				
			    setTimeout(function(){
					$('#crudNotice').toggle();
					$('#crudOk').toggle();
				}, 3000);
				
			}else{
				//alert(data);
				
				$('#crudNotice').toggle();
				$('#crudFail').toggle();
				
			    setTimeout(function(){
					$('#crudNotice').toggle();
					$('#crudFail').toggle();
				}, 5000);
				
			}
			
	
		});
		
		//console.log(term);
		
		
	});
	
	
/*************************CREATE TRAINING******************************/

	$('#trainingForm').submit(function( event ){
		//alert(1);
		event.preventDefault();
		
		var $form = $(this),
		title = $form.find( "input[name='title']" ).val(),
		abr = $form.find( "input[name='abriviation']" ).val(),
		type = $form.find( "input[name='type']" ).val(),
		note = $form.find( "textarea[name='note']" ).val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, { title: title, abr: abr, type: type, note: note } );
		
		posting.done(function( data ){
			
			if(data == 1){
						
				title = $form.find( "input[name='title']" ).val(''),
				abr = $form.find( "input[name='abriviation']" ).val(''),
				type = $form.find( "input[name='type']" ).val(''),
				note = $form.find( "textarea[name='note']" ).val('');
				
				$('#crudNotice').toggle();
				$('#crudOk').toggle();
				
			    setTimeout(function(){
					$('#crudNotice').toggle();
					$('#crudOk').toggle();
				}, 3000);
				
			}else{
				//alert(data);
				
				$('#crudNotice').toggle();
				$('#crudFail').toggle();
				
			    setTimeout(function(){
					$('#crudNotice').toggle();
					$('#crudFail').toggle();
				}, 5000);
				
			}
			
	
		});
		
		//console.log(term);
		
		
	});

	
/************************CREATE COURSE*********************************/

	$('#courseForm').submit(function( event ){
		//alert(1);
		event.preventDefault();
		
		var $form = $(this),
		title = $form.find( "input[name='title']" ).val(),
		abr = $form.find( "input[name='abriviation']" ).val(),
		training = $form.find( "input[name='training']" ).val(),
		link = $form.find( "input[name='link']" ).val(),
		note = $form.find( "textarea[name='note']" ).val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, { title: title, abr: abr, training: training, link: link, note: note } );
		
		posting.done(function( data ){
			
			if(data == 1){
						
				title = $form.find( "input[name='title']" ).val(''),
				abr = $form.find( "input[name='abriviation']" ).val(''),
				training = $form.find( "input[name='training']" ).val(''),
				link = $form.find( "input[name='link']" ).val(''),
				note = $form.find( "textarea[name='note']" ).val('');
				
				$('#crudNotice').toggle();
				$('#crudOk').toggle();
				
			    setTimeout(function(){
					$('#crudNotice').toggle();
					$('#crudOk').toggle();
				}, 3000);
				
			}else{
				//alert(data);
				
				$('#crudNotice').toggle();
				$('#crudFail').toggle();
				
			    setTimeout(function(){
					$('#crudNotice').toggle();
					$('#crudFail').toggle();
				}, 5000);
				
			}
			
	
		});
		
		//console.log(term);
		
		
	});
	
	
/******************************CREATE SUBJECT*****************************/

	$('#subjectForm').submit(function( event ){
		//alert(1);
		event.preventDefault();
		
		var $form = $(this),
		title = $form.find( "input[name='title']" ).val(),
		course = $form.find( "input[name='course']" ).val(),
		training = $form.find( "input[name='training']" ).val(),
		duration = $form.find( "input[name='duration']" ).val(),
		cost = $form.find( "input[name='cost']" ).val(),
		note = $form.find( "textarea[name='note']" ).val(),
		location = $form.find( "input[name='location']" ).val(),
		link = $form.find( "input[name='link']" ).val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, { title: title, course: course, training: training, duration: duration, cost: cost, note: note, location: location, link: link } );
		
		posting.done(function( data ){
			
			if(data == 1){
						
				title = $form.find( "input[name='title']" ).val(''),
				course = $form.find( "input[name='course']" ).val(''),
				training = $form.find( "input[name='training']" ).val(''),
				duration = $form.find( "input[name='duration']" ).val(''),
				cost = $form.find( "input[name='cost']" ).val(''),
				note = $form.find( "textarea[name='note']" ).val(''),
				location = $form.find( "input[name='location']" ).val(''),
				link = $form.find( "input[name='link']" ).val('');
				
				$('#crudNotice').toggle();
				$('#crudOk').toggle();
				
			    setTimeout(function(){
					$('#crudNotice').toggle();
					$('#crudOk').toggle();
				}, 3000);
				
			}else{
				//alert(data);
				
				$('#crudNotice').toggle();
				$('#crudFail').toggle();
				
			    setTimeout(function(){
					$('#crudNotice').toggle();
					$('#crudFail').toggle();
				}, 5000);
				
			}
			
	
		});
		
		//console.log(term);
		
		
	});
	

/******************************CREATE NEWS*******************************/

	$('#newsForm').submit(function( event ){
		//alert(1);
		event.preventDefault();
		
		var $form = $(this),
		title = $form.find( "input[name='title']" ).val(),
		headline = $form.find( "input[name='headline']" ).val(),
		news = $form.find( "textarea[name='news']" ).val(),
		image = $form.find( "select[name='image']" ).val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, { title: title, headline: headline, news: news, image: image } );
		
		posting.done(function( data ){
			
			if(data == 1){
				
				title = $form.find( "input[name='title']" ).val(''),
				headline = $form.find( "input[name='headline']" ).val(''),
				news = $form.find( "textarea[name='news']" ).val(''),
				image = $form.find( "select[name='image']" ).val('Select Image');
				
				$('#crudNotice').toggle();
				$('#crudOk').toggle();
				
			    setTimeout(function(){
					$('#crudNotice').toggle();
					$('#crudOk').toggle();
				}, 3000);
				
			}else{
				//alert(data);
				
				$('#crudNotice').toggle();
				$('#crudFail').toggle();
				
			    setTimeout(function(){
					$('#crudNotice').toggle();
					$('#crudFail').toggle();
				}, 5000);
				
			}
			
	
		});
		
		//console.log(term);
		
		
	});


/********************************************************UPDATE****************************************/
		
	$( "#updateTables" ).change(function() {
	
	  //alert( "Handler for .change() called." );
	 var str = $( "#updateTables option:selected" ).val();
	  //alert(str);
	  var url ="portal/getTableRow/"+str;
	  var url2 = "portal/getTableColumns/"+str;
	  $(".rowList").remove();
	  
	  $("#dbInput").val('');
	  
	 
	  $.get(url, function(data){
	  	
	  	$.each( data, function(key, value){
	  		//console.log(value.title);
	  		$("#updateRows").append("<option value='"+ value.title +"' id=' " + value.id + " ' class='rowList'>" + value.title + "</option");
	  	});
	  	
	  }, 'json'); 
	  
	  $("#updateRows").change(function(){
	  	
		$.getJSON(url2, function(data2){
		  	//console.log(data);
		  	$.each( data2, function(key, value){
		  		$("#dbColumns").append("<option value='"+ value +"' class='rowList'>" + value + "</option");
		  	});	
		  	
	
	  		$("#dbColumns").change(function(){
	  			$("#dbInput").val('');
	  			
	  			var id = $( "#updateRows option:selected" ).attr("id");
	  			var col = $( "#dbColumns option:selected" ).val();
	  			var table = str;
	  			//console.log(id);
	  			var url3 = "portal/getColum/";
	  			
				var posting = $.post( url3, { table: table, col: col, id: id } );
					
				posting.done(function( data ){
					
					//console.log(data);
					$("#dbInput").attr("placeholder", data.replace('"', '').replace('"', ''));
					
				}, 'JSON');
	  			
	  		});
		  	
		});
	  	
	  });
		  
	  
		//alert(1);
		//str = $( "#dbColumns option:selected" ).val();
		//var url ="portal/getTableRow/"+str;
		
		//$("#dbInput").attr("placeholder", data.value);
			
	  
	  
	});
	
	
/*******************************************UPDATE FORM****************************************/
	
	$('#updateForm').submit(function( event ){
		//alert(1);
		event.preventDefault();
		
		var $form = $(this),
		dbTable = $form.find( "select[name='dbTable']" ).val(),
		dbRow = $form.find( "select[name='dbRow']" ).val(),
		dbColumn = $form.find( "select[name='dbColumn']" ).val(),
		dbInput = $form.find( "textarea[name='dbInput']" ).val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, { dbTable: dbTable, dbRow: dbRow, dbColumn: dbColumn, dbInput: dbInput } );
		
		posting.done(function( data ){
			
			if(data == 1){
				
				dbRow = $form.find( "select[name='dbRow']" ).val(''),
				dbColumn = $form.find( "select[name='dbColumn']" ).val(''),
				dbInput = $form.find( "textarea[name='dbInput']" ).val(''),
				
				$('#updateNotice').toggle();
				$('#updateOk').toggle();
				
			    setTimeout(function(){
					$('#updateNotice').toggle();
					$('#updateOk').toggle();
				}, 3000);
				
			}else{
				
				alert(data);
				
				$('#updateNotice').toggle();
				$('#updateFail').toggle();
				
			    setTimeout(function(){
					$('#updateNotice').toggle();
					$('#updateFail').toggle();
				}, 5000);
				
			}
			
	
		});
		
		//console.log(term);
		
		
	});
	
/***************************************DELETE****************************************/

	$( "#deleteTables" ).change(function() {
	  //alert( "Handler for .change() called." );
	  str = $( "#deleteTables option:selected" ).val();
	  //alert(str);
	  var url ="portal/getTableRow/"+str;
	  $(".rowList").remove();
	  
	 
	  $.get(url, function(data){
	  	
	  	$.each( data, function(key, value){
	  		//console.log(value.title);
	  		$("#deleteRows").append("<option value='"+ value.title +"' class='rowList'>" + value.title + "</option");
	  	});
	  	
	  }, 'json'); 
	  
	});
	

/**************************************Delete Form***************************************/

	$('#deleteForm').submit(function( event ){
		//alert(1);
		event.preventDefault();
		
		var $form = $(this),
		dbTable = $form.find( "select[name='dbTable']" ).val(),
		dbRow = $form.find( "select[name='dbRow']" ).val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, { dbTable: dbTable, dbRow: dbRow } );
		
		posting.done(function( data ){
			
			if(data == 1){
				
				dbRow = $form.find( "select[name='dbRow']" ).val(''),
				$('#deleteNotice').toggle();
				$('#deleteOk').toggle();
				
			    setTimeout(function(){
					$('#deleteNotice').toggle();
					$('#deleteOk').toggle();
				}, 3000);
				
			}else{
				
				$('#deleteNotice').toggle();
				$('#deleteFail').toggle();
				
			    setTimeout(function(){
					$('#deleteNotice').toggle();
					$('#deleteFail').toggle();
				}, 5000);
				
			}
			
	
		});
		
		//console.log(term);
		
		
	});
	

/*************************************FEEDBACK FORM****************************************/

	$('#feedbackForm').submit(function( event ){
		//alert(1);
		event.preventDefault();
		
		var $form = $(this),
		name = $form.find( "input[name='name']" ).val(),
		email = $form.find( "input[name='email']" ).val(),
		subject = $form.find( "input[name='subject']" ).val(),
		message = $form.find( "textarea[name='message']" ).val(),
		url = $form.attr( "action" );
		
		var posting = $.post( url, { name: name, email: email, subject: subject, message: message } );
		
		posting.done(function( data ){
			
			if(data == 1){
		
				name = $form.find( "input[name='name']" ).val(''),
				email = $form.find( "input[name='email']" ).val(''),
				subject = $form.find( "input[name='subject']" ).val(''),
				message = $form.find( "textarea[name='message']" ).val(''),
				
				$('#feedbackSent').toggle();
				
			    setTimeout(function(){
					$('#feedbackSent').toggle();
				}, 4000);
				
			}else{
				
				$('#deleteFail').toggle();
				
			    setTimeout(function(){
					$('#feedbackFail').toggle();
				}, 5000);
				
			}
			
	
		});
		
		//console.log(term);
		
		
	});


});