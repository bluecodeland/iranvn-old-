@extends('layouts.app')
@section('head')
@endsection
@section('content')
<div class="container text-right">

<div id="messages"></div>
<form action="">
<div class="input-group" style="position:fixed; bottom:0;">
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
    var socket = io(':6001');
    
    
    $('form').submit(function(){
      socket.emit('chat message',  `` + '{{ Auth::user()->name }}' + $('#m').val() + ': ' + ' {{ $fullname }}');
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
