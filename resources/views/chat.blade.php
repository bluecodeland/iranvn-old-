@extends('layouts.app')
@section('head')
@endsection
@section('content')
<span id="typing"></span>
<div class="container text-right">
  <div id="usersConnected" class="bg-primary"></div>
  <div id="notes"></div>
  <div>
          <input id="m" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..."  autocomplete="off" />
        <button id="newNote" type="button" class="btn btn-primary">ارسال</button>
      @if (Auth::user()->role === 'user')  
        <button id="delete" type="button" class="btn btn-primary">پاک کردن</button>
       @endif 
      </div>
  {{--  <div id="messages"></div>
<form action="">
<div class="input-group">
    <input id="m" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..." />
    <span class="input-group-btn">
    <button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
    </span>
</div>
</form>  --}}
{{--  <form action="">
  <input id="m" autocomplete="off" /><button>Send</button>
  <button onclick="location.reload();">clear</button>
</form>
     --}}

{{--  <script>
// var socket = io(':6001');
       var socket = io(':8282');


</script>  --}}
<script src="js/socket.io.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script>
  $(document).ready(function(){
      // Connect to our node/websockets server
      window.scrollTo(0,document.body.scrollHeight);
      //var socket = io.connect(':8080');
  	       var socket = io(':8282');

      // Initial set of notes, loop through and add to list
      socket.on('initial notes', function(data){
          var html = ''
          for (var i = 0; i < data.length; i++){
              // We store html as a var then add to DOM after for efficiency
              html += '<div class=talk-bubble tri-right round border right-top> <div class=talktext><p>' + data[i].note + '</p></div></div>'
          }
          $('#notes').html(html)
      })
   
      // New note emitted, add it to our list of current notes
      socket.on('new note', function(data){
          $('#notes').append('<p>' + data.note + '</p>')
      })
   
      // New socket connected, display new count on page
      socket.on('users connected', function(data){
          $('#usersConnected').html('Users connected: ' + data)
      })
   
     // Typing
     $('#m').keyup(function(e) {
      if (e.which === 13) {
        socket.emit('typing', false);
        // send();
      } else if ($('#m').val() !== '') {
        socket.emit('typing', true);
      } else {
        socket.emit('typing', false);
      }
    });

     socket.on('updateTyping', function(isTyping) {
		if (isTyping === true) {
			$('#typing').html('{{ Auth::user()->name }}' + ' is typing...');
		} else {
			$('#typing').html('');
		}
	});
    // delete note
    $('#delete').click(function(){
                 socket.emit('delete');
                 //location.reload();         
                
      })
     
      // Add a new (random) note, emit to server to let others know
     
      $('#newNote').click(function(){
      var newNote =  $('#m').val() + ': {{ Auth::user()->name }}   ';
          socket.emit('new note', {note: newNote});
          $('#m').val('');
          
          window.scrollTo(-10,document.body.scrollHeight);
          
      })
      $('#m').keydown(function(e){
        if (e.keyCode == 13) {
        var newNote =  $('#m').val() + ': {{ Auth::user()->name }}   ';
            socket.emit('new note', {note: newNote});
            $('#m').val('');
            window.scrollTo(-10,document.body.scrollHeight);}
            
        })
  
  })
  </script>
  
{{--  <script>
  $(function () {
    var socket = io(':8282');
    
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
</script>  --}}
</div>

@endsection
