@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="css/chat.css">
@endsection
@section('content')

<div class="container" style="padding-top:2vh;">
  <div class="row">
    <div class="col-sm-12 bg"> 
      <div class="d-flex flex-wrap align-content-center ">
        <div class="p-2"> <div class="circle d-flex align-items-center" id="usersConnected"></div>
        <div class="p-2 top">کاربر آنلاین ()</div>
      </div>
    </div>
      
    </div>
    <div class="col-sm-12 bg seven" id="notes">

    </div>
    <div class="col-sm-12 bg bg-success d-flex align-items-center"><input id="m" type="text" class="form-control input-sm chat_input" placeholder="Write your message here..."  autocomplete="off" /></div>
    <div class="col-sm-12 bg bg-danger d-flex align-items-center" >  <button id="newNote" type="button" class="btn btn-primary">ارسال</button>
     <button id="delete" type="button" class="btn btn-primary">پاک کردن</button><span id="typing"></span>
    
    </div>
    
  </div>

</div>
<label for="{{ Auth::user()->name }}" id="username" style=" display:none;">{{ Auth::user()->name }}</label>
<label for="{{ Carbon\Carbon::now('Asia/Tehran')}}" id="time" style=" display:none;"> {{ Carbon\Carbon::now('Asia/Tehran')}}</label>




  <script src="js/socket.io.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/chat.js"></script>
  @endsection
