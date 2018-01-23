@extends('layouts.app')
@section('head')
<script src="https://simplewebrtc.com/latest-v2.js"></script>
@endsection
@section('content')
<div class="container text-right">
        <video height="300" id="localVideo"></video>
        <div id="remotesVideos"></div>
        <script>
                var webrtc = new SimpleWebRTC({
                    // the id/element dom element that will hold "our" video
                    localVideoEl: 'localVideo',
                    // the id/element dom element that will hold remote videos
                    remoteVideosEl: 'remotesVideos',
                    // immediately ask for camera access
                    autoRequestMedia: true
                  });
                  // we have to wait until it's ready
webrtc.on('readyToCall', function () {
    // you can name it anything
    webrtc.joinRoom('your awesome room name');
  });
        </script>
<div id="messages"></div>
<form action="">
<div class="input-group">
    <input id="m" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
    <span class="input-group-btn">
    <button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
    </span>
</div>
</form>
{{--  <form action="">
  <input id="m" autocomplete="off" /><button>Send</button>
  <button onclick="location.reload();">clear</button>
</form>  --}}
   
<script src="js/socket.io.js"></script>

{{--  <script>
 var socket = io(':6001');
 

</script>  --}}

<script src="js/jquery-3.3.1.min.js"></script>

<script>
  $(function () {
    var socket = io(':8080');
    
    //'{{ Auth::user()->name }}' ++ ': ' + ' {{ $fullname }}'
    $('form').submit(function(){
      socket.emit('chat message',  $('#m').val());
      $('#m').val('');
      return false;
    });
    socket.on('chat message', function(msg){
      $('#messages').append($('<p>').text(msg));
            window.scrollTo(0,document.body.scrollHeight);
    });
    
  });
</script>
</div>
@endsection
