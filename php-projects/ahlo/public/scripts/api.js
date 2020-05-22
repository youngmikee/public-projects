
$(document).ready(function($){

var info = '';
	
	function weatherApp(){
		var appdata = '';
		
		var defaultlocation = '';
		var locationid = '';
		var todayweather = '';
		var todaycurrentweather = '';
		var todayhighestweather = '';
		var todaylowestweather = '';
		
		
		$.get('app_weathers', function(data, status){
			
			if(data != ''){
				
				//var obj = JSON.parse(data); // convert data to json object
				//var postcode = obj.postcode;
				var str = data;
				var str = str.replace('"', '');
				var postcode = str.replace('"', '');
				postcode = postcode.replace(/\s/g, ''); // trim or replace all spaces from the post code
				//var city = obj.city;
				
				//console.log(postcode);
				
				var town = $.get("https://api.postcodes.io/postcodes/"+ postcode, function(data, status){
					//console.log(data['result'].parliamentary_constituency);
					defaultlocation = data['result'].parliamentary_constituency;
					
					$.get("http://datapoint.metoffice.gov.uk/public/data/val/wxfcs/all/json/sitelist?key=106d4aa7-0bf3-40d8-9bc6-8bdea8bdf5ed", function( sites, status){
						//console.log(sites.Locations.Location);
						var sitesLocations = sites.Locations.Location;
						$.each(sitesLocations, function(key, value){
							if(value['name'] == defaultlocation){
								//console.log(value['id']);
								locationid = value['id'];
							}
														
						});
						
						//console.log(locationid);
						$.get("http://datapoint.metoffice.gov.uk/public/data/val/wxfcs/all/json/"+locationid+"?res=3hourly&key=106d4aa7-0bf3-40d8-9bc6-8bdea8bdf5ed", function( weatherinfo, status){
							//console.log(weatherinfo.SiteRep.DV);
							var weather = weatherinfo.SiteRep.DV;
							var weatherdate = weather.dataDate;
							var weathertype = weather.type;
							var weatherlocation = weather.Location
							var weatherperiod = weather.Location['Period'];
							//console.log(weatherperiod);
							
							var now = new Date();
							var month = (now.getMonth()+1);
							if(month < 10){
								month = '0'+month;
							}
							var day = now.getDate();
							if(day < 10){
								day = '0'+day;
							}
							var year = now.getFullYear();
							var realdate = year+'-'+month+'-'+day;
							var date = realdate+'Z';
							
							//console.log('"'+date+'"');
							
							$.each(weatherperiod, function(key, value){
								//console.log(value.value);
								if(value.value == date){
									//console.log(value);
									todayweather = value;
								}
							});
							
							//console.log(todayweather);
							var hour = now.getHours();
							var minutes = hour * 60;
							var todayweatherinfo = todayweather.Rep;
							//console.log(todayweatherinfo);
				
							for(i = 0; i < todayweatherinfo.length; i++){
								
								//console.log(todayweatherinfo[i].$);
								if(todayweatherinfo[i].$ > minutes){
									//console.log(todayweatherinfo[i]);
									todaycurrentweather = todayweatherinfo[i];
									break;
								}
								
							}
							
							var arrayofftemperature = new Array();
							
							for(i = 0; i < todayweatherinfo.length; i++){
								
								arrayofftemperature[i] = parseInt(todayweatherinfo[i].T);
								
							}
							
							//console.log(arrayofftemperature);
							
							var maxtemperature = Math.max.apply(Math, arrayofftemperature);
							var mintemperature = Math.min.apply(Math, arrayofftemperature);
							
							//console.log(maxtemperature);
							//console.log(mintemperature);
							
							
							
							//console.log(todaycurrentweather);
							//console.log(todayweatherinfo[0].T);
							todayhighestweather = maxtemperature;
							todaylowestweather = mintemperature;
							//console.log(todaylowestweather);
							//console.log(locationid);
					
							
						});
							
					});
					
				});
				
				appdata = {"weather":[
							{"current": todaycurrentweather},
							{"high": todayhighestweather},
							{"low": todaylowestweather}
						]};
				
			}else{
				//alert(data);
			}
			
			
		});
		
		//return locationid;
		
	}
	
	
	var weatherdata = weatherApp();
	//console.log(weatherdata);
	
});



//http://datapoint.metoffice.gov.uk/public/data/val/wxfcs/all/json?res=3hourly&key=106d4aa7-0bf3-40d8-9bc6-8bdea8bdf5ed