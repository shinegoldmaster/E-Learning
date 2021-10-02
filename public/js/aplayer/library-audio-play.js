function openAudioPlayer(id){		
	var url = document.location.origin + "/librarys/play-audio/" + id;
	myWindow = window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=400,width=600,height=300");
	$('#play-button').css('display', 'none');
	$('#play-button').css('margin', '0 auto');
	$('#close-button').css('display', 'inherit');
	$('#close-button').css('margin', '0 auto');
}
function pauseAudionPlayer(){
	 myWindow.close();
	 $('#play-button').css('display', 'inherit');
	 $('#play-button').css('margin', '0 auto');
	 $('#close-button').css('display', 'none');
	 $('#close-button').css('margin', '0 auto');
}