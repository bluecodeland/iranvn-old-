@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="css/chat.css">
@endsection
@section('content')

<div class="container" style="padding-top:2vh;">

  <div class="row">
    <div class="col-sm-12 bg"> 
    <div class="circle"></div>
      
    </div>
    <div class="col-sm-12 bg seven">

    </div>
    <div class="col-sm-12 bg bg-success"></div>
    <div class="col-sm-12 bg bg-primary"></div>
    
  </div>

</div>






  <script src="js/socket.io.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/chat.js"></script>
  @endsection
