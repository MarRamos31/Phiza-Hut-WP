@extends('layouts.app')

@section('content')
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Transaction History</title>
</head>
<body>
@foreach($cartdetail as $cart1)
@can('thisisMember')
    <div class="col-md-4">
        <div class="card-group ">
            <div>
                <div class="card">
                    <div class="card-body">
                        <p>Transaction at {{$cart1->tanggaltransaksi}}</p>

                    </div>

                </div>
            </div>
        </div>

    </div>


@endcan
    @can('thisisAdmin')

        <div class="col-md-4">
            <div class="card-group ">
                <div>
                    <div class="card">
                        <div class="card-body">
                            <p>Transaction at {{$cart1->tanggaltransaksi}}</p>


                        </div>

                    </div>
                </div>
            </div>

        </div>

    @endcan
@endforeach

</body>
</html>


@endsection
