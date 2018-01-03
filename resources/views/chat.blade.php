@extends('layouts.app')

@section('content')
       <div id="app" class="container">
            <div class="row mt-5">
                <div class="col-md-8 offset-md-2">
                    <div class="card text-dark bg-light ">
                        <div class="card-header">ChatRoom</div>
        
                        <div class="card-body">
                            
                                <chat-log></chat-log>
                                <chat-composer></chat-composer>

                                
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
