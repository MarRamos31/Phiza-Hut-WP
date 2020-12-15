@extends('layouts.app')

@section('content')

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"  href="{{asset('css/home.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">

    <title>User All</title>
</head>
<body>
<table class="table table-responsive table-bordered">
    <thead class="table-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Adress</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Gender</th>
    </tr>
    </thead>
    <tbody>

        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user ->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user ->Address }}</td>

                <td>{{'$user->Phone-Number' }}</td>
                <td>{{$user ->Gender}}</td>



            </tr>
        @endforeach




    </tbody>
</table>

</body>
</html>
@endsection
