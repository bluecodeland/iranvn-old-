@extends('layouts.app')
@section('head')
@endsection
@section('content')

<div class="container" style="padding-top:5vh;">
  <div class="row">
  <div class="col-sm-12 bg-danger rounded ">
    <span id="typing"></span>
  </div>
<div class="col-sm-12 bg-success rounded" id="usersConnected">
</div>
<div id="notes"  class="col-sm-12 text-right" style="min-height:70vh; max-height:70vh; height:70vh; overflow-y: scroll;"></div>
        <div class="col-sm-8">
          <input id="m" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..."  autocomplete="off" />
        </div>
        <div class="col-sm-2">
          <button id="newNote" type="button" class="btn btn-primary">ارسال</button>
        </div>
        </div>
        @if (Auth::user()->role === 'user')  
          <div class="col-sm-2"><button id="delete" type="button" class="btn btn-primary">پاک کردن</button></div>
         @endif 
        </div>


  <script src="js/socket.io.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script scr="js/chat.js"></script>
  {{-- <script>
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
            $('#usersConnected').html('کاربر آنلاین: ' + data)
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
            
            window.scrollTo(0,document.body.scrollHeight);
            
            
        })
        $('#m').keydown(function(e){
          if (e.keyCode == 13) {
          var newNote =  $('#m').val() + ': {{ Auth::user()->name }}   ';
              socket.emit('new note', {note: newNote});
              $('#m').val('');
              window.scrollTo(0,document.body.scrollHeight);}
              
          })
    
    })
    </script> --}}
@endsection
