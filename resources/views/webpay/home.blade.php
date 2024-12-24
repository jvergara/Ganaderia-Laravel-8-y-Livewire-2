@extends('adminlte::page')

@section('title', 'Webpay - Admin')

@section('content_header')
    <a href="{{route('admin.posts.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo post</a>   
@stop

@section('content')

<main class="container">
    <h1>Webpay</h1>
     {{--  <x-flash />  --}}
    <ul>
       <li><strong>Producto</strong>: Calculadora</li>
       <li><strong>Valor</strong>: $2000</li>
       <li><strong>Cantidad</strong>: 1</li>
       <li><strong>Orden de compra</strong>: OC123456</li>
    </ul>

    <h6>Tarjetas de prueba</h6>
    <table style="border: 1px solid #000; width: 100%;">
        <thead style="text-align: center;">
            <th>Tipo de tarjeta</th>
            <th>Detalle</th>
            <th>Resultado</th>
        </thead>
        <tbody>
            <tr>
                <td>VISA</td>
                <td>
                    4051 8856 0044 6623
                    CVV 123
                    cualquier fecha de expiración
                </td>
                <td>
                    Genera transacciones aprobadas.
                </td>
            </tr>
            <tr>
                <td>Redcompra</td>
                <td>4051 8842 3993 7763</td>
                <td>Genera transacciones aprobadas</td>
            </tr>
            <tr>
                <td>Prepago VISA</td>
                <td>4051 8860 0005 6590
                    CVV 123
                    cualquier fecha de exp.</td>
                <td>transacciones aprobadas.</td>
            </tr>
        </tbody>
    </table>
    <br>
   <a href="{{route('webpay_pagar')}}">Pagar</a>
</main>

@stop
