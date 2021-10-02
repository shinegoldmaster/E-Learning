var oldTimeDiff = Number($('.oldcountdiff').val());
$('.chat-box-open').prop('disabled',true);	
$('.chat-box-open').css('cursor', 'no-drop');	
$('.chat-box-open').css('opacity', '0.3');
	var recieverid = $("#reciever_id").val(); //studentid
	showRealTimeChatCount(recieverid, 0);
if(oldTimeDiff > 3){ //600

	$('.countdiff').val(oldTimeDiff);
	timeCountDown();
	 
		/******************************************************************************/
		$('iframe').css('display','none');
		$('.session-content').addClass('hide');
		/******************************************************************************/
		
}else if(oldTimeDiff < -1200){ //-1200~0
	
	window.location.href = "/student/appointments-history";
}else{
		$('.countdiff').val(oldTimeDiff);
		/******************************************************************************/
		$('iframe').css('display','inherit');	
		$('.session-content').removeClass('hide');		
		/******************************************************************************/
		
		
	timeIncreaseUp();
}

function timeCountDown(){
	
	var x = setInterval(function() {		
		
		var countdiff = $('.countdiff').val();								
		var timeDiff = Number(countdiff) - 1;		
		$('.countdiff').val(timeDiff);
		
		//left Time calculations for days, hours, minutes and seconds
		var days = Math.floor(timeDiff / (60 * 60 * 24));
		var hours = Math.floor((timeDiff % (60 * 60 * 24)) / (60 * 60));
		var minutes = Math.floor((timeDiff % (60 * 60)) / (60));
		var seconds = Math.floor((timeDiff % (60)));
		if(hours < 10) hours = "0" + hours;
		if(minutes < 10) minutes = "0" + minutes;
		if(seconds < 10) seconds = "0" + seconds;
		
		var html = '<time class="kk__start-on-time"><span class="kkcountdown-box">';
		if(days != 0)
			html+= '<span class="kkc-days">'+days+'</span><span class="kkc-days-text">:</span>';
		html+= '<span class="kkc-hours">'+ hours +'</span><span class="kkc-hours-text">:</span><span class="kkc-min">'+ minutes +'</span><span class="kkc-min-text">:</span><span class="kkc-sec">' +seconds+'</span><span class="kkc-sec-text"></span></span></time>';
		
		$('#timer-bar').html(html);
		
		// If the count down is over, write some text 
		if (timeDiff < 0){
			
			clearInterval(x);
			$('.countdiff').val(0);			
			$('.connect-counter').css('display', 'none');
			timeIncreaseUp();	
			$('.chat-box-open').prop('disabled',false);
			$('.chat-box-open').css('cursor', 'pointer');				
			$('.chat-box-open').css('opacity', '1');				
		}
		
		if(timeDiff == 600){ //600						
			$('#time_alret_button').trigger('click');
		}
	}, 1000);
}

function timeIncreaseUp(){
	 
		/******************************************************************************/
		$('iframe').css('display','inherit');
		$('.session-content').removeClass('hide');
		/******************************************************************************/
		
		
	$('#callStatus').html('Doing ....');
	$('.chat-box-open').prop('disabled',false);	
	$('.chat-box-open').css('cursor', 'pointer');	
	$('.chat-box-open').css('opacity', '1');
	$('.connect-counter').css('display', 'none');
	var y = setInterval(function() {		

		var reciever_id = $("#reciever_id").val(); //studentid
		showRealTimeChatCount(reciever_id, 1);
		
		var countdiff = $('.countdiff').val();							
		var timeDiff = parseInt(countdiff) - 1;
		$('.countdiff').val(timeDiff);				
		
		var minutes = Math.abs(Math.floor((timeDiff % (60 * 60)) / (60)));
		var seconds = Math.abs(Math.floor((timeDiff % (60))));
		
		if(minutes < 10) minutes = "0" + minutes;
		if(seconds < 10) seconds = "0" + seconds;
		
		
		
		var html = '<span class="kkc-min">'+ minutes +'</span><span class="kkc-min-text">:</span><span class="kkc-sec">' +seconds+'</span><span class="kkc-sec-text"></span></span></time>';
		
		$('#timer-bar').html(html);		
		
		if (timeDiff < -1200) { //1200
			clearInterval(y);
			$('.countdiff').val("");$('iframe').css('display','none');										
			$('#timer-bar').html('---End---');
			$('#callStatus').html('End');
			$('.chat-box-open').prop('disabled',true);	
			$('.chat-box-open').css('cursor', 'no-drop');	
			$('.chat-box-open').css('opacity', '0.3');
			$('.chat-container').css('display', 'none');
			setTimeout(function(){ 
				window.location = '/student/appointments-history';
			}, 10000);			
		}
		
	}, 1000);
}

	function showRealTimeChatCount(id, flag){
		 
		if(id != "0") {
			$.ajax({
				method	: "POST",
				url		: "/chat/count/" + id,
				data	: {
					"reciever_id" : id					
				},
				success	: function(res){
					if(flag == 0){
						$('#defaultMsgCountStudent').val(res.count);
					}else{
						var defaultMsgCount = $('#defaultMsgCountStudent').val();
						if(res.count > defaultMsgCount){
							$('#messagecountstudent').html("New");	
							$('#messagecountstudent').css('display', 'inherit');	
							
							setTimeout(function(){$('#defaultMsgCountStudent').val(res.count);}, 10000);
						}else{
							$('#messagecountstudent').css('display', 'none');	
						}
					}
					
				}
			});
		}
			
	}
	