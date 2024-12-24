@extends('adminlte::page')

@section('title', 'Paypal Transactions')

@section('content_header')
    <h1>Paypal Transactions</h1>
@stop

@section('content')
    <p>Bienvenido al panel de control.</p>

    @livewire('admin.transactions-index')

@stop