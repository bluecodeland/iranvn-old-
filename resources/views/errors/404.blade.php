{{--  <h2>{{ $exception->getMessage() }}</h2>  --}}
@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="text-center">صفحه مورد نظر یافت نشد. </h2>
<div id="app">

    <example-component>

        
    </example-component>
</div>
<script>
    var app = new Vue({
        el: '#app',
        data: {
          message: 'Hello Vue!'
        }
      })

</script>
</div>
@endsection
