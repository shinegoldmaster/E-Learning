
$(document).ready(function() {

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});		
	
	/**** get session default time and current o'click *****/
	$.ajax({
		type:"POST",
		url: "/getdefaulttime",								
		success: function(result){
			console.table(result);
			if(result.status == '1'){					
				var html = "";
				var defaultTime = Number(result.dtime);
				//var currentOclock = Number(recult.ctime) + 1;			
				for(var i = 0; i < 24; i++){
					for(var j = 0; j < 60 ; j+= defaultTime){
						var clock = i;
						var minute = j;						
						var second = "00";
						if(clock < 10) clock = "0" + clock;
						if(minute < 10) minute = "0" + minute;
						
						var item = clock + ":" + minute + ":" + second;
						html += "<option>";
						html += item;						
						html += "</option>";						
					}
				}		
				
				
				$('.selectpicker optgroup').html(html);				
			}else{
				alert("Connect Error!");
			}
		  
		}
	});
  
});
