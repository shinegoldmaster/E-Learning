<!DOCTYPE html>
<head>
  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('css/voicechat/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/voicechat/styles.css') }}" rel="stylesheet">    
</head>
<body style="background-color: #fff0;">

<div class="container">
    <div class="row">

        <div class="col-sm-12" style="display:none">
            <div id="my-number-section" class="text-center">
                <div id="my-number">{{trans('layout.LOADING')}}</div>
                
                <div id="my-number-permalink" >
                    <span class="glyphicon glyphicon-link"></span>
                    {{trans('layout.call_link')}}:
                    <a id="my-number-link" href="...">https://...</a>
                </div>
            </div>
            
        </div>

        <div class="col-sm-12">
           
            
                <div class="col-sm-6 col-xs-6" style="display:none">
                   
                    <input id="number" class="form-control" type="number" placeholder="Type Recipient's #">
                   
                </div>
            
                <div class="col-sm-12 col-xs-12 dial-buttons text-center">
                    <button id="dial" class="btn btn-primary">
                        {{trans('layout.accept')}}
                    </button>
                   
                    <button id="hangup" class="btn btn-danger">
                        {{trans('layout.decline')}}
                    </button>                    
                </div>
            </div>
       
    </div>
</div>


<script src="https://cdn.pubnub.com/pubnub.js"></script>

<!-- WebRTC SDK -->
<script src="{{ asset('js/voicechat/webrtc.js') }}"></script>
<script src="{{ asset('js/voicechat/sound.js') }}"></script>
<script>(function(){
	
var receiverID =  location.href.split('&')[1].split('=')[1];

document.getElementById('number').value = receiverID;
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Generate Random Number if Needed
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
var urlargs         = urlparams();
var my_number       = PUBNUB.$('my-number');
var my_link         = PUBNUB.$('my-number-link');
var number          = urlargs.number || Math.floor(Math.random()*999+1);

my_number.number    = number;
my_number.innerHTML = ''+my_number.number;
my_link.href        = location.href.split('?')[0] + '?call=' + number;
my_link.innerHTML   = my_link.href;

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Update Location if Not Set
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
if (!('number' in urlargs)) {
    urlargs.number = my_number.number;
    location.href = urlstring(urlargs);
    return;
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Get URL Params
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function urlparams() {
    var params = {};
    if (location.href.indexOf('?') < 0) return params;

    PUBNUB.each(
        location.href.split('?')[1].split('&'),
        function(data) { var d = data.split('='); params[d[0]] = d[1]; }
    );

    return params;
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Construct URL Param String
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function urlstring(params) {
    return location.href.split('?')[0] + '?' + PUBNUB.map(
        params, function( key, val) { return key + '=' + val }
    ).join('&');
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Calling & Answering Service
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-


var phone     = window.phone = PHONE({    
    number        : my_number.number, // listen on this line
    publish_key   : 'pub-c-28f6e4ee-6da2-459b-9af8-edd4ccb73b48',
    subscribe_key : 'sub-c-645ec9ce-83d8-11e7-ac3a-f2b7c362e666',
	media         : { audio : true, video : false },
    ssl           : true
});

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Video Session Connected
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function connected(session) {
 
    PUBNUB.$('number').value = ''+session.number;
    sounds.play('sound/hi');
  
}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Video Session Ended
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function ended(session) {
    
  
    sounds.play('sound/goodbye');
   
}



// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Start Phone Call
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
function dial(number) {
    
    var session = phone.dial(number);
   
    if (!session) return;

}

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Ready to Send or Receive Calls
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
phone.ready(function(){
  

    // Auto Call
    if ('call' in urlargs) {
        var number = urlargs['call'];
        PUBNUB.$('number').value = number;
        dial(number);
    }

    // Make a Phone Call
    PUBNUB.bind( 'mousedown,touchstart', PUBNUB.$('dial'), function(){
        var number = PUBNUB.$('number').value;
        if (!number) return;
        dial(number);
    } );

  
    PUBNUB.bind( 'mousedown,touchstart', PUBNUB.$('hangup'), function() {
        phone.hangup();
        
    } );

});

// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
// Receiver for Calls
// -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
phone.receive(function(session){
   
    session.connected(connected);
    session.ended(ended);
    
});


})();</script>
</body>
</html>
