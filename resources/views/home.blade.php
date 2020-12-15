@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

</div>
   <div>
       <div class="md-form mt-auto">

           <input class="form-control " width="50px"  type="text" placeholder="Search" aria-label="Search">
       </div>
   </div>

        <div>
           <div class="row mt-4 mx-4 justify-content-center ">

               <h1>Our Freshly made Pizza</h1>
              <div class="row-cols-1" >
                  <a href="/addpizza">    <button class="btn btn-secondary" >Add Pizza</button></a>
              </div>




                    @foreach($pizza->chunk(3) as $pitza2)
                         <div class="row mt-5 mx-5 d-flex justify-content-center">
                            @foreach($pitza2 as $pitza3)
                                <div class="col-md-4">
{{--                                <a style="text-decoration: none" href ="/welcome/{{$pitza3->id}}"></a>--}}

                                    <div class="card-group" >
                                        <div class="card " style="width: 1000px">
                                            <img class="card-img-top" src="{{ asset('css/foto/'.$pitza3->Pizza_photo) }}" alt="" style="" width="300px" height="300px">
                                               <div class="card-body">
                                        @canany(['thisisAdmin','thisisMember'])
                                    <a href="/cartPizza/{{$pitza3->id}}"  style="color: black">{{$pitza3->Pizza_name}}</a> <br>
                                                   @endcanany
                                    <strong  style="color: dimgray">Rp.{{$pitza3->Pizza_price}}</strong><br>
                                                   @can('thisisAdmin')

                                    <a href="/editpizza/{{$pitza3->id    }}">    <button class="btn btn-primary">Edit Pizza</button></a>
                                    <a href="/deletepizza/{{$pitza3->id}}">    <button class="btn btn-secondary">Delete Pizza</button></a>
                                                   @endcan
                                            </div>
                                            </div>
                                        </div>
                        </div>

                                    @endforeach


                    @endforeach
{{--                    <h1 style="color: black">{{$pitza->Pizza_name}}</h1>--}}
{{--                    <p class="price">Rp. {{$pitza->Pizza_price}}</p>--}}
{{--                    <p style="color: dimgray">{{$pitza->Pizza_desc}}</p>--}}




        </div>
@endsection
