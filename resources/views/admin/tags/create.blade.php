@extends('adminlte::page')

{{--  @section('title', 'Ganadería - Admin')  --}}

@section('content_header')
    <h1>Crear nueva etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            
            {!! Form::open(['route'=>'admin.tags.store']) !!}
            
            @include('admin.tags.partials.form')
            
            {!! Form::submit('Crear etiqueta', ['class'=>'btn btn-primary']) !!}
            
            
            {!! Form::close() !!}
            
        </div>
    </div>
@stop

@section('js')
   <script src="{{asset('vendor/stringToSlug/stringToSlug.min.js')}}"></script>
   <script>
    $(document).ready( function() {
        $("#name").stringToSlug({
          setEvents: 'keyup keydown blur',
          getPut: '#slug',
          space: '-'
        });
      });
   </script>
@endsection