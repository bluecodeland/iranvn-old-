$(document).ready(function(){
    // Connect to our node/websockets server
    //var socket = io.connect(':8080');
         var socket = io(':8282');

    // Initial set of notes, loop through and add to list
    socket.on('initial notes', function(data){
        var html = ''
        for (var i = 0; i < data.length; i++){
            // We store html as a var then add to DOM after for efficiency
            html += '<p>' + data[i].note + '</p>'
        }
        $('#notes').html(html)
        $('#notes').scrollTop($('#notes')[0].scrollHeight - $('#notes')[0].clientHeight);

    })
 
    // New note emitted, add it to our list of current notes
    socket.on('new note', function(data){
        $('#notes').append('<p>' + data.note + '</p>')
    $('#notes').scrollTop($('#notes')[0].scrollHeight - $('#notes')[0].clientHeight);
        
    
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
var uName = $(username).html();
var sendTime  = $(time).html();
   socket.on('updateTyping', function(isTyping) {
  if (isTyping === true) {
    $('#typing').html( uName + 'is typing...');
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
    var newNote =  $('#m').val() + uName +sendTime;
        socket.emit('new note', {note: newNote});
        $('#m').val('');
        
        
        
        
    })
    $('#m').keydown(function(e){
      if (e.keyCode == 13) {
      var newNote =  $('#m').val() + uName +sendTime;
          socket.emit('new note', {note: newNote});
          $('#m').val('');
          }
          
      })

})

