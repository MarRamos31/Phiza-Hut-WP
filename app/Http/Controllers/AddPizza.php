<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AddPizza extends Controller
{
    //
    function addPizza(Request $request)
    {
        $validasi = Validator::make($request->all(),[
            'pizzanameadd'=>'required|string|max:20',
            'pizzapriceadd'=>'required|numeric|min:10000',
            'Desc'=>'required|string|max:20',
            'pizzaimageadd'=>'required|image'
        ]);
        if ($validasi->fails()) {
            return redirect('/addpizza')
                ->withErrors($validasi)
                ->withInput();
        }
        $photo = $request->file('pizzaimageadd');
        $photo->move(public_path('/css/foto'),$photo->getClientOriginalName());
        DB::table('pizza')->insert(
            ['Pizza_name'=>$request->pizzanameadd,
                'Pizza_price'=>$request->pizzapriceadd,
                'Pizza_desc'=>$request->Desc,
                'pizza_photo'=>$photo->getClientOriginalName()]
        );
        return redirect('/home');


    }
}
