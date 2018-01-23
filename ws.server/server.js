
var io = require('socket.io')(8080);
io.on('connection', function(socket){
console.log('New Connection');
//io.emit('chat message', 'new user connected')
socket.on('disconnect', function(){
    console.log('user disconnected');
  });
  socket.on('chat message', function(msg){
    io.emit('chat message', msg);
 });

});