	(function() {
		$(document).ready(function() {

		});
		var params = {},
			r = /([^&=]+)=?([^&]*)/g;

		function d(s) {
			return decodeURIComponent(s.replace(/\+/g, ' '));
		}

		var match, search = window.location.search;
		while (match = r.exec(search.substring(1))) {
			params[d(match[1])] = d(match[2]);

			if(d(match[2]) === 'true' || d(match[2]) === 'false') {
				params[d(match[1])] = d(match[2]) === 'true' ? true : false;
			}
		}

		window.params = params;
	})();

	var recordingDIV = document.querySelector('.recordrtc');
	var recordingMedia = recordingDIV.querySelector('.recording-media');
	var recordingPlayer = recordingDIV.querySelector('video');
	var mediaContainerFormat = recordingDIV.querySelector('.media-container-format');

	recordingDIV.querySelector('#record-start-button').onclick = function() {
		var button = this;

		if(button.innerHTML === 'Stop Recording') {
			button.disabled = true;
			button.disableStateWaiting = true;
			setTimeout(function() {
				button.disabled = false;
				button.disableStateWaiting = false;
			}, 2 * 1000);

			button.innerHTML = 'Start Recording';

			function stopStream() {
				if(button.stream && button.stream.stop) {
					button.stream.stop();
					button.stream = null;
				}
			}

			if(button.recordRTC) {
				if(button.recordRTC.length) {
					button.recordRTC[0].stopRecording(function(url) {	
						if(!button.recordRTC[1]) {
							button.recordingEndedCallback(url);
							stopStream();

							saveToDiskOrOpenNewTab(button.recordRTC[0]);
							return;
						}

						button.recordRTC[1].stopRecording(function(url) {
							button.recordingEndedCallback(url);
							stopStream();
						});
					});
				}
				else {
					button.recordRTC.stopRecording(function(url) {
						button.recordingEndedCallback(url);
						stopStream();

						saveToDiskOrOpenNewTab(button.recordRTC);
					});
				}
			}

			return;
		}

		button.disabled = true;

		var commonConfig = {
			onMediaCaptured: function(stream) {
				button.stream = stream;
				if(button.mediaCapturedCallback) {
					button.mediaCapturedCallback();
				}

				button.innerHTML = 'Stop Recording';
				button.disabled = false;
			},
			onMediaStopped: function() {
				button.innerHTML = 'Start Recording';

				if(!button.disableStateWaiting) {
					button.disabled = false;
				}
				
			}
		};

		if(recordingMedia.value === 'record-audio') {
			captureAudio(commonConfig);

			button.mediaCapturedCallback = function() {
				button.recordRTC = RecordRTC(button.stream, {
					type: 'audio',
					bufferSize: typeof params.bufferSize == 'undefined' ? 0 : parseInt(params.bufferSize),
					sampleRate: typeof params.sampleRate == 'undefined' ? 44100 : parseInt(params.sampleRate),
					leftChannel: params.leftChannel || false,
					disableLogs: params.disableLogs || false,
					recorderType: webrtcDetectedBrowser === 'edge' ? StereoAudioRecorder : null
				});

				button.recordingEndedCallback = function(url) {
					
					saveToDiskOrOpenNewTab(button.recordRTC);
					$('#upload-to-server').trigger('click');
					$('.hidden-div').css('display','none !important');
				};

				button.recordRTC.startRecording();
			};
		}

		
	};


	function captureAudio(config) {
		captureUserMedia({audio: true}, function(audioStream) {
			recordingPlayer.srcObject = audioStream;
			recordingPlayer.play();

			config.onMediaCaptured(audioStream);

			audioStream.onended = function() {				
				config.onMediaStopped();
			};
		}, function(error) {
			config.onMediaCapturingFailed(error);
		});
	}

	if(webrtcDetectedBrowser === 'edge' || webrtcDetectedBrowser === 'firefox' || webrtcDetectedBrowser === 'chrome') {    
		recordingMedia.innerHTML = '<option value="record-audio">Audio</option>';
		setMediaContainerFormat(['WAV']);
	}


	function captureUserMedia(mediaConstraints, successCallback, errorCallback) {
		navigator.mediaDevices.getUserMedia(mediaConstraints).then(successCallback).catch(errorCallback);
	}

    function setMediaContainerFormat(arrayOfOptionsSupported) {
		var options = Array.prototype.slice.call(
			mediaContainerFormat.querySelectorAll('option')
		);

		var selectedItem;
		options.forEach(function(option) {
			option.disabled = true;

			if(arrayOfOptionsSupported.indexOf(option.value) !== -1) {
				option.disabled = false;

				if(!selectedItem) {
					option.selected = true;
					selectedItem = option;
				}
			}
		});
	}

	recordingMedia.onchange = function() {                
		setMediaContainerFormat(['WAV', 'Ogg']);
	};
	
	

   function saveToDiskOrOpenNewTab(recordRTC) {
		recordingDIV.querySelector('#save-to-disk').parentNode.style.display = 'block';
		recordingDIV.querySelector('#save-to-disk').onclick = function() {
			if(!recordRTC) return alert('No recording found.');

			recordRTC.save();
		};

		recordingDIV.querySelector('#open-new-tab').onclick = function() {
			if(!recordRTC) return alert('No recording found.');

			window.open(recordRTC.toURL());
		};

		recordingDIV.querySelector('#upload-to-server').disabled = false;
		recordingDIV.querySelector('#upload-to-server').onclick = function() {
			
			if(!recordRTC) return alert('No recording found.');
			this.disabled = true;

			var button = this;
			uploadToServer(recordRTC, function(progress, fileURL) {
				if(progress === 'ended') {
					button.disabled = false;
					button.innerHTML = 'Click to download from server';
					button.onclick = function() {
						window.open(fileURL);
					};
					return;
				}
				button.innerHTML = progress;
			});
		};
	}

	
	var listOfFilesUploaded = [];

	function uploadToServer(recordRTC, callback) {
		var blob = recordRTC instanceof Blob ? recordRTC : recordRTC.blob;
		var fileType = blob.type.split('/')[0] || 'audio';
		var fileName = (Math.random() * 1000).toString().replace('.', '');

		if (fileType === 'audio') {
			fileName += '.' + (!!navigator.mozGetUserMedia ? 'mp3' : 'wav');
			document.getElementById('voice-record-input').value = fileName;
		} else {
			fileName += '.webm';
		}

		// create FormData
		var formData = new FormData();
		formData.append(fileType + '-filename', fileName);
		formData.append(fileType + '-blob', blob);

		callback('Uploading ' + fileType + ' recording to server.');
		var savePhpUrl = document.location.origin + "/audio/voicerecordsave.php";
		makeXMLHttpRequest(savePhpUrl, formData, function(progress) {
			if (progress !== 'upload-ended') {
				callback(progress);
				return;
			}

			var initialURL = location.href.replace(location.href.split('/').pop(), '') + 'uploads/';

			callback('ended', initialURL + fileName);

			// to make sure we can delete as soon as visitor leaves
			listOfFilesUploaded.push(initialURL + fileName);
		});
	}

	function makeXMLHttpRequest(url, data, callback) {
		var request = new XMLHttpRequest();
		request.onreadystatechange = function() {
			if (request.readyState == 4 && request.status == 200) {
				callback('upload-ended');
			}
		};

		request.upload.onloadstart = function() {
			callback('Upload started...');
		};

		request.upload.onprogress = function(event) {
			callback('Upload Progress ' + Math.round(event.loaded / event.total * 100) + "%");
		};

		request.upload.onload = function() {
			callback('progress-about-to-end');
		};

		request.upload.onload = function() {
			callback('progress-ended');
		};

		request.upload.onerror = function(error) {
			callback('Failed to upload to server');
			console.error('XMLHttpRequest failed', error);
		};

		request.upload.onabort = function(error) {
			callback('Upload aborted.');
			console.error('XMLHttpRequest aborted', error);
		};

		request.open('POST', url);
		request.send(data);
	}

	window.onbeforeunload = function() {
		recordingDIV.querySelector('button').disabled = false;
		recordingMedia.disabled = false;
		mediaContainerFormat.disabled = false;

		if(!listOfFilesUploaded.length) return;

		listOfFilesUploaded.forEach(function(fileURL) {
			var request = new XMLHttpRequest();
			request.onreadystatechange = function() {
				if (request.readyState == 4 && request.status == 200) {
					if(this.responseText === ' problem deleting files.') {
						alert('Failed to delete ' + fileURL + ' from the server.');
						return;
					}

					listOfFilesUploaded = [];
					alert('You can leave now. Your files are removed from the server.');
				}
			};
			request.open('POST', 'delete.php');

			var formData = new FormData();
			formData.append('delete-file', fileURL.split('/').pop());
			request.send(formData);
		});

		return 'Please wait few seconds before your recordings are deleted from the server.';
	};