@extends('layouts.app')

@section('content')

    <!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"  href="{{asset('css/home.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

    <title>Cart Pizza</title>
</head>
</html>

<form action="{{url('cart')}}/{{$pizza->id}}" method="post" enctype="multipart/form-data" >
    @csrf

<div class="row mt-2 mx-auto d-flex justify-content-center">
    <div class="col-4 py-2 px-0 text-center ">
        <img src="{{ asset('css/foto/'.$pizza->Pizza_photo) }}" alt="" style="width:100%" width="200px" height="200px">
        <div class="col-3 py-2 px-0 text-center ">
            <p href=""   style="color: black">{{$pizza->Pizza_name}}</p>
            <p c style="color: dimgray">Rp.{{$pizza->Pizza_price}}</p>
            <p c style="color: dimgray">{{$pizza->Pizza_desc}}</p>
            @can('thisisMember')
            <p>Input Quantity</p>
            <input type="number" class="form-control" id="qtycart" name="QuantityCart">

            <button type="submit" class="btn btn-danger" >Add to Cart</button>
            @endcan
        </div>
    </div>
</div>
</form>
@endsection
