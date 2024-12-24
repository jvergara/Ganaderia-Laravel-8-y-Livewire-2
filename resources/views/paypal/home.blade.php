@extends('adminlte::page')

@section('title', 'Paypal - Inicio')

{{--  @section('content_header')
    <a href="{{route('admin.posts.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo post</a>   
@stop  --}}

{{--  <x-app-layout>  --}}

    @section('content')

    <main class="container">

    {{--  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">  --}}
{{--          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">  --}}

    <h1>Pagar con Paypal</h1>
    <ul>
       <li><strong>Producto</strong>: Calculadora</li>
       <li><strong>Valor</strong>: USD {{$orden->monto}}</li>
       <li><strong>Cantidad</strong>: 1</li>
       <li><strong>Orden de compra</strong>: {{"order_".$orden->id}}</li>
    </ul>

   <a class="btn btn-warning" href="{{$response->json()['links'][1]['href']}}"><i class="fab fa-paypal"></i> Pagar</a>

        {{--  </div>  --}}
{{--      </div>  --}}
   
</main>

@stop

{{--  </x-app-layout>  --}}
