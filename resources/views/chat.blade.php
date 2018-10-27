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
<label for="{{ Auth::user()->name }}" id="username" >{{ Auth::user()->name }}</label>
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
  <script src="js/chat.js"></script>
 
@endsection
