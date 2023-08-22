@extends('layouts.app')

@section('title-block') Заказы @endsection
@section('content')



<h1>Все заказы</h1>

<div class="orders">
    @foreach($orders as $order)
    <div class="order"> 
        <h3>Заказ # {{ $order['id'] }} </h3>
        <p>Предметы: {{ $order['items'] }}</p>
        <p>Смоимость заказа {{ $order['price'] }}</p>
    </div>
    @endforeach
</div>

<h3 class="mt-5 ml-5">Стоимость всех заказов: <i>{{ $prices }}</i> </h3>

@endsection