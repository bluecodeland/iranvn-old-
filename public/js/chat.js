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
    $('#typing').html($("#username").html + 'is typing...');
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

