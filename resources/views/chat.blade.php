@extends('layouts.app')

@section('content')

<section id="chat-app">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4">
                Your ID: <h4 id="peer-id" data-toggle="tooltip" data-placement="top" title="Click to copy peer ID"></h3>
                <a href="#getUserNameModal" data-toggle="modal">change</a>
            </div>
            <div class="col-lg-6 col-md-6 mb-5 hide">
                <div class="form-inline">
                    <div class="form-group mr-sm-3">
                        <label for="inputPeerUserId" class="sr-only">Password</label>
                        <input type="text" class="form-control" id="inputPeerUserId" placeholder="Enter your friends ID">
                    </div>
                    <button type="button" class="btn btn-outline-primary" id='connect-btn'>Connect</button>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Online Users</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="onlinepeers"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid chat-container">
    <div class="row">
    </div>
</div>

<!-- Portfolio Modals -->
<!-- Use the modals below to showcase details about your portfolio projects! -->
<!-- Portfolio Modal 1 -->
<div class="portfolio-modal modal" id="videoCallPanel" tabindex="-1" role="dialog" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal end-call hide" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2 class="title">Video Call</h2>
                            <div class="pure-u-2-3" id="video-container">
                                <video id="their-video" autoplay=""></video>
                                <video id="my-video" muted="true" autoplay=""></video>
                            </div>
                            
                            <div class="text-center mt-3">
                                <button type="button" class="btn btn-secondary mute-audio ml-3 mt-2"><i class="fa fa-microphone-slash"></i>Mute Audio</button>
                                <button type="button" class="btn btn-secondary mute-video ml-3 mt-2"><i class="fa fa-video-camera"></i>Mute Video</button>
                                <button type="button" class="btn btn-danger end-call ml-3 mt-2" data-dismiss="modal"><i class="fa fa-times"></i>End Call</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="getUserNameModal" tabindex="-1" role="dialog" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop='static'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Enter your Name</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="user-name">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary username-done">Done</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal" id="callConfirmationModal" tabindex="-1" role="dialog" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop='static'>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title peer-name"></h5>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger reject-call" data-dismiss="modal">Reject</button>
                <button type="button" class="btn btn-primary accept-call" data-dismiss="modal">Accept</button>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

<script src="js/peer.js"></script>
<script src="js/appchat.js"></script>
<script src="js/peer-client.js"></script>



@endsection
