@extends('layouts.app')

@section('content')

    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart View</title>
</head>
<body>

    <div class="container ">
    @foreach($cart as $cartview)


    <div class="card ml-5">
        <img class="card-img-top" src="{{ asset('css/foto/'.$cartview->photocart) }}" alt="" width="100px" height="100px">

        <p > {{$cartview->namaorder}}</p>

        <p>Rp.{{$cartview->total}}</p>

        <p>Quantity : {{$cartview->qty}}</p>

        <form action="/updatecart/{{$cartview->id}}/{{$cartview->pizzaid}}" method="post" enctype="multipart/form-data">
            @csrf
        <p> Quantity</p>
        <input type="number" class="form-control" id="qtycart" name="qtyupdate">

        <button type="submit" class="btn btn-primary btn-sm " >Update button</button>
        </form>


        <a href="/deletecart/{{$cartview->id}}">
        <button type="button"  class="btn btn-secondary btn-sm">Delete button</button>
        </a>


    </div>



    @endforeach
        <form action="">
        <div class="row justify-content-center">
            <a>
        <button type="submit" class="bt btn-danger ">Checkout</button>
            </a>
            </form>
        </div>


    </div>


</body>
</html>
@endsection
