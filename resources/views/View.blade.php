<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="5">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>

</head>
<body>

@foreach ($pizza as $PizzaView)


    <div class="card ml-5">
        <a style="text-decoration: none" href ="/login/{{$PizzaView->id}}">
            <img src="{{ asset('assets/'.$PizzaView->Pizza_photo) }}" alt="" style="width:100%">
            <h1 style="color: black">{{$PizzaView->Pizza_name}}</h1>
            <p class="price">Rp. {{$PizzaView->Pizza_price}}</p>
            <p style="color: dimgray">{{$PizzaView->Pizza_desc}}</p>
        </a>
    </div>

@endforeach
</body>
</html>
