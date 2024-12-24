@extends('adminlte::page')
@section('title','Webpay')
@section('content')

<main class="container">
    <h5>Webpay</h5>
<ul>
    <li>VCI: <span>{{$datos->vci}}</span></li>
    <li>amount: <span>{{$datos->amount}}</span></li>
    <li>status: <span>{{$datos->status}}</span></li>
    <li>buy_order: <span>{{$datos->buy_order}}</span></li>
    <li>session_id: <span>{{$datos->session_id}}</span></li>
    <li>card_detail: <span>{{$datos->card_detail->card_number}}</span></li>
    <li>accounting_date: <span>{{$datos->accounting_date}}</span></li>
    <li>transaction_date: <span>{{$datos->transaction_date}}</span></li>
    <li>authorization_code: <span>{{$datos->authorization_code}}</span></li>
    <li>payment_type_code: <span>{{$datos->payment_type_code}}</span></li>
    <li>response_code: <span>{{$datos->response_code}}</span></li>
    <li>installments_number: <span>{{$datos->installments_number}}</span></li>
</ul> 
</main>

@endsection