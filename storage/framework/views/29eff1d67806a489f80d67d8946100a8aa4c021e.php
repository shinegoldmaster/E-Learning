
<html>
<head>
	<link rel="stylesheet" href="<?php echo e(asset('css/aplayer/player.css')); ?>">
	<script src="<?php echo e(asset('js/aplayer/audio.min.js')); ?>"></script>        
	<script>
		audiojs.events.ready(function() {
			audiojs.createAll();
		});
	</script>		
</head>
	
	<div class="audio-play-div">
		<audio id="jp_audio_0" preload="metadata" src="<?php echo e(asset($audio_src)); ?>"></audio>
	</div>

</html>
