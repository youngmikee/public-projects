/***
 *MET key=106d4aa7-0bf3-40d8-9bc6-8bdea8bdf5ed
 *OPEN WEATHER API KEY = 843f96ebf6a5dc4489be1c4ad0e1d452
 *  
 */



$(document).on("pagebeforecreate" ,function(){
	


//alert(1);
//$('#weathertown').empty();
//$('#weathertype').empty();


	//weatherApp();








/**********************************************Weather App***********************************************************************/

	
	function weatherApp(){
		var appdata = '';
		var info = '';
		
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
				
				var town = $.get("https://api.postcodes.io/postcodes/"+ postcode, function(data, status){
					defaultlocation = data['result'].parliamentary_constituency;
					
					$.get("http://datapoint.metoffice.gov.uk/public/data/val/wxfcs/all/json/sitelist?key=106d4aa7-0bf3-40d8-9bc6-8bdea8bdf5ed", function( sites, status){
						var sitesLocations = sites.Locations.Location;
						$.each(sitesLocations, function(key, value){
							if(value['name'] == defaultlocation){
								locationid = value['id'];
							}
														
						});
						
						$.get("http://datapoint.metoffice.gov.uk/public/data/val/wxfcs/all/json/"+locationid+"?res=3hourly&key=106d4aa7-0bf3-40d8-9bc6-8bdea8bdf5ed", function( weatherinfo, status){
							var weather = weatherinfo.SiteRep.DV;
							var weatherdate = weather.dataDate;
							var type = weather.type;
							weatherlocation = weather.Location
							var weatherperiod = weather.Location['Period'];
							
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
							
							$.each(weatherperiod, function(key, value){
								if(value.value == date){
									todayweather = value;
								}
							});
							
							//var hour = now.getHours();
							var hour = now.getHours() % 12 || 12;
							//console.log(hour);
							var minutes = hour * 60;
							var todayweatherinfo = todayweather.Rep;
				
							for(i = 0; i < todayweatherinfo.length; i++){
								
								if(todayweatherinfo[i].$ >= minutes){
									todaycurrentweather = todayweatherinfo[i];
									break;
								}
								
							}
							
							
							
							var arrayofftemperature = new Array();
							
							for(i = 0; i < todayweatherinfo.length; i++){
								
								arrayofftemperature[i] = parseInt(todayweatherinfo[i].T);
								
							}
							
							var maxtemperature = Math.max.apply(Math, arrayofftemperature);
							var mintemperature = Math.min.apply(Math, arrayofftemperature);
							
							todayhighestweather = maxtemperature;
							todaylowestweather = mintemperature;
							
							
							
							/************************Passing weather data******************************/
							
			
							var weathers = ["Clear night",
							"Sunny day",
							"Partly cloudy (night)",
							"Partly cloudy (day)",
							"Not used",
							"Mist",
							"Fog",
							"Cloudy",
							"Overcast",
							"Light rain shower (night)",
							"Light rain shower (day)",
							"Drizzle",
							"Light rain",
							"Heavy rain shower (night)",
							"Heavy rain shower (day)",
							"Heavy rain",
							"Sleet shower (night)",
							"Sleet shower (day)",
							"Sleet",
							"Hail shower (night)",
							"Hail shower (day)",
							"Hail",
							"Light snow shower (night)",
							"Light snow shower (day)",
							"Light snow",
							"Heavy snow shower (night)",
							"Heavy snow shower (day)",
							"Heavy snow",
							"Thunder shower (night)",
							"Thunder shower (day)",
							"Thunder"];
							
							var weathertype = todaycurrentweather.W;
							weathertype = weathers[weathertype];
							var weathertown = weatherlocation.name;
							var weathernow = todaycurrentweather.T;
							
							appinterface(weathertown, weathertype);
							
						});
							
					});
					
				});
				
			}else{
				//
			}
			
			
		});
		
	}
	
	
	function appinterface(town, type){
		
		//console.log(town);
		//console.log(type);
		//var defaultown = $('#weathertown').text();
		//console.log(defaultown);
		$('#weathertown').empty();
		$('#weathertype').empty();
		$('#weathertown').append(town);
		$('#weathertype').append(type);
		
		
	}
	

	
});



//http://datapoint.metoffice.gov.uk/public/data/val/wxfcs/all/json?res=3hourly&key=106d4aa7-0bf3-40d8-9bc6-8bdea8bdf5ed