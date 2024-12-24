@extends('adminlte::page')

@section('title', 'Ganadería - Users')

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')

    @if (session('info'))
      <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
      </div>  
    @endif

    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-sm">
                    <p class="h5">Nombre</p>
                    <p class="form-control">{{$user->name}}</p>
                </div>
                <div class="col-sm">
                    <p class="h5">Email</p>
                    <p class="form-control">{{$user->email}}</p>
                </div>
            </div>

            <h2 class="h5">Listado de roles</h2>
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label>
                            
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}

                        </label>
                    </div>
                @endforeach 
                
                {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
                           
            {!! Form::close() !!}
            
        </div>
    </div>
@stop