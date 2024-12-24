@extends('adminlte::page')
@section('title','Webpay')
@section('content')
<main class="container">
        <h1>Webpay</h1>
        pagando..... 

        <form action="{{$datos->url}}" name="form" method="POST">
        <input type="hidden" name="token_ws" value="{{$datos->token}}" />
        </form>


        <script type="text/javascript">
            window.onload = function () {
            document.form.submit();
            };
        </script>
</main>

@endsection