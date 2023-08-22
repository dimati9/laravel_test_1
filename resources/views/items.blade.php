@extends('layouts.app')

@section('title-block') Каталог @endsection
@section('content')


    <h1>Каталог</h1>

    @if(isset($_GET['good']))
    <div class="alert alert-success" role="alert">
    Заказ успешно создан
    </div>
    @endif
    <hr>
    @if($errors->any())

    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('order-form') }}" method="post">
        @csrf

        <div class="items">

        <div class="item form-group">
            <h4>Бананы - 15.9/шт</h4>
            <input type="hidden" name="name[]" value="Бананы">
            <input type="hidden" name="price[]" value="15.9">
           
            <label>Введите нужное количество штук
            <input type="number" name="count[]" placeholder="Введите кол-во" class="form-control">
            </label>
        </div>

        <div class="item form-group">
            <h4>Орехи - 200р/пачка</h4>
            <input type="hidden" name="name[]" value="Орехи">
            <input type="hidden" name="price[]" value="200">
            <label>Введите нужное количество пачек
            <input type="number" name="count[]" placeholder="Введите кол-во" class="form-control">
            </label>
        </div>

        <div class="item form-group">
            <h4>Пиво - 150р/л</h4>
            <input type="hidden" name="name[]" value="Пиво">
            <input type="hidden" name="price[]" value="150">
            <label>Введите нужное количество литров
            <input type="number" name="count[]" placeholder="Введите кол-во" class="form-control">
            </label>
        </div>

        </div>

        <div class="h-100 d-flex align-items-center justify-content-center mt-5">
        <input type="submit" class="btn btn-success" value="Создать заказ">
        </div>
    </form>
@endsection