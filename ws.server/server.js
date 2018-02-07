
var mysql = require('mysql')
var io = require('socket.io')(8080);
// Define our db creds
var db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  database: 'iranvn_db'
})
var users = {};
// Log any errors connected to the db
db.connect(function(err){
  if (err) console.log(err)
})
// Define/initialize our global vars
var notes = []
var isInitNotes = false
var socketCount = 0

io.sockets.on('connection', function(socket){
  
    // Socket has connected, increase socket count
  socketCount++
  // Let all sockets know how many are connected
  io.sockets.emit('users connected', socketCount)

  socket.on('disconnect', function() {
      // Decrease the socket count on a disconnect, emit
      socketCount--
      io.sockets.emit('users connected', socketCount)
  })

  socket.on('new note', function(data){
      // New note added, push to all sockets and insert into db
      notes.push(data)
      io.sockets.emit('new note', data)
      // Use node's db injection format to filter incoming data
      db.query('INSERT INTO notes (note) VALUES (?)', data.note)
  })
  //delete data
  socket.on('delete', function(){
    // New note added, push to all sockets and insert into db
    io.sockets.emit('delete')
    db.query('DELETE FROM notes');
    notes = [];
    io.sockets.emit('initial notes', notes)
    
    // io.sockets.emit('users_count', clients);
})
  socket.on('typing', function(isTyping) {
    // io.sockets.emit('updateTyping', isTyping);
    //show is typing to everyone exept who is typing
    socket.broadcast.emit('updateTyping', isTyping);
});
  // Check to see if initial query/notes are set
  if (! isInitNotes) {
      // Initial app start, run db query
      db.query('SELECT * FROM notes')
          .on('result', function(data){
              // Push results onto the notes array
              notes.push(data)
          })
          .on('end', function(){
              // Only emit notes after query has been completed
              socket.emit('initial notes', notes)
          })

      isInitNotes = true
  } else {
      // Initial notes already exist, send out
      socket.emit('initial notes', notes)
  }
})


// io.on('connection', function(socket){
// console.log('New Connection');
// //io.emit('chat message', 'new user connected')
// socket.on('disconnect', function(){
//     console.log('user disconnected');
//   });
//   socket.on('chat message', function(msg){
//     io.emit('chat message', msg);
//  });

// });