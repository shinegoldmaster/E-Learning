$(document).ready(function(){
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});	
	var reciever_id = $("#reciever_id").val();
	var odd_time_interval;
	var my_name = $("#my_name").val();	
	var re_name = $("#receiver_name").val();	
	
	
	/*--- Send message ---*/
	
	$("#btn-chat").click(function(){
	
		var message = $("#send-message").val();	
		
		if(reciever_id == "0") return;
		if(message == "") return;
		
		$.ajax({
			method	: "POST",
			url		: "/chat/send/" + reciever_id,
			data	: {
				"reciever_id" : reciever_id,				
				"message"	: message,
			},
			success	: function(res){
				
				if(res != 0){
					
					$("#send-message").val("");
					
					var html_msg = '<li class="right clearfix">';
					html_msg += 		'<div class="chat-body clearfix">';
					html_msg += 			'<div class="header">';
					html_msg += 				'<small class=" text-muted"><span class="glyphicon glyphicon-time"></span> Current </small>';
					html_msg += 				'<strong class="pull-right primary-font">' + my_name + '</strong>';
					html_msg += 			'</div>';
					html_msg += 			'<p>';
					html_msg += 				message;
					html_msg += 			'</p>';
					html_msg += 		'</div>';
					html_msg +=  '</li>';
					
					$(".chat").append(html_msg);
					$("#chat-body").scrollTop($("#chat-body").prop("scrollHeight"));
				}
			}
		});
	});
	
	$("#send-message").keyup(function(event){
		event.preventDefault();
		if(event.which == 13){
			$("#btn-chat").click();
		}
	});
	
	
	/*---- get chat content via time loopg -----*/
	
	function get_message(re_id, re_name){
		

		odd_time_interval = setInterval(function() {
			
			var html_msg = "";
			
			$.ajax({
				method	: "POST",
				url		: "/chat/get/" + re_id,
								
				success	: function(res){
					var msgs = res.msgs;
					var now = res.time;
					var time_ago = 0;

					$("#chat-contents").empty();
					
					$.each(msgs, function(i, item){
						time_ago = get_timeago(now, msgs[i].chat_time);
						if(msgs[i].sender_id == re_id){
							
							html_msg += '<li class="right clearfix">';
							html_msg += 		'<div class="chat-body clearfix">';
							html_msg += 			'<div class="header" style="text-align: left;">';
							html_msg += 				'<small class=" text-muted"><i class="fa fa-clock-o"></i>&nbsp;' + time_ago + '</small>';
							
							
							html_msg += 			'</div><div style="display:flex">';
							html_msg += 			'<div class="student" style="flex:9"><p class="text-right">';
							html_msg += 				msgs[i].contents;
							html_msg += 			'</p></div>';
							html_msg += '<div style="flex:1"><img src="http://booking.com/images/icon/student.png" alt="'+my_name+'"  /></div></div>';
							html_msg += 		'</div>';
							html_msg +=  '</li>';
							
						}else{
							
							html_msg += '<li class="left clearfix">';
							html_msg += 		'<div class="chat-body clearfix">';
							html_msg += 			'<div class="header" style="text-align: right;">';
							html_msg += 				'<small class=" text-muted"><i class="fa fa-clock-o"></i>&nbsp;' + time_ago + '</small>';
							html_msg += 			'</div>';
							
							
							html_msg += 			'</div><div style="display:flex">';
							html_msg += 			'<div style="flex:1"><img src="http://booking.com/images/icon/man.png" alt="'+re_name+'"  /></div>';
							html_msg += 			'<div class="instructor" style="flex:9"><p class="text-left">';
							html_msg += 				msgs[i].contents;
							html_msg += 			'</p></div></div>';				
							
							html_msg += 		'</div>';
							html_msg +=  '</li>';
							
						}
						time_ago = 0;
					});
					$("#chat-contents").append(html_msg);
					$("#chat-body").scrollTop($("#chat-body").prop("scrollHeight"));
				}
			});

		}, 2000);

	}
	
	function get_timeago(now, time){
		
		var diff = parseInt((now - time) / 60);
		
		var rlt = "Just now";
		if(diff > 1 && diff < 60){
			rlt = diff + " mins ago";
		}else if(diff >60 && diff < 1440){
			rlt = parseInt((diff / 60)) + " hours ago";
		}else if(diff > 1440 && diff < 10080){
			rlt = parseInt(parseInt(diff / 60) / 24) + " days ago";
		}else if(diff > 10080){
			rlt = parseInt(parseInt(parseInt(diff / 60) % 24) % 7) + " weeks ago";
		}
		
		return rlt;
	}
	
	$(document).on('click','.chat-box-open', function(){
		var reciever_id = $("#reciever_id").val();
		
		var re_name = $("#receiver_name").val();	
		get_message(reciever_id, re_name);	
		$('#chat-box-min-max').trigger('click');
		$('.chat-container').css('display', 'inherit');		
	});
	
	$(document).on('click','.chat-box-close', function(){
		$('.chat-container').css('display', 'none');
		clearInterval(odd_time_interval);
	});

});