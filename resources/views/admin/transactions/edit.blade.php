@extends('adminlte::page')

@section('title', 'Paypal - Edit Transaction')

@section('content_header')
    <h1>Editar transaction</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="comtainer">
    
            
            {!! Form::model($transaction, ['route' => ['admin.transactions.update', $transaction], 'autocomplete'=>'off', 'files'=>true, 'method'=>'put']) !!}
            
            @include('admin.transactions.partials.form')            
            
            {!! Form::submit('Actualizar transaction', ['class'=>'btn btn-primary']) !!}            
            
            {!! Form::close() !!}

            
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position:absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
   <script src="{{asset('vendor/stringToSlug/stringToSlug.min.js')}}"></script>
   <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
   <script>
    $(document).ready( function() {
        $("#name").stringToSlug({
          setEvents: 'keyup keydown blur',
          getPut: '#slug',
          space: '-'
        });
        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );
        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
      });
      
      //Cambiar imagen
      document.getElementById('file').addEventListener('change', cambiarImagen);
      function cambiarImagen(event){
        var file = event.target.files[0];
        var reader = new FileReader();
        reader.onload = (event) => {
            document.getElementById('picture').setAttribute('src', event.target.result); 
        };
            reader.readAsDataURL(file);
      }


   </script>
@endsection