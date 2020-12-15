<?php

namespace App\Http\Controllers;
use App\AllPizza;
use App\Cart;
use App\CartDetail;
use App\EditDelete;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EditDeletePizza extends Controller
{

    protected $table = 'pizza';
    public function edit2($pizza)
    {
        $pizza = AllPizza::where('id', $pizza )->first();

        return view ('editpizza', ['pizza'=>$pizza]);
    }
    public function edit($Pizzaid, Request $request){

        $request->validate([
            'pizzanameupdate'=>'required|string|max:20',
            'pizzapriceupdate'=>'required|numeric|min:10000',
            'Descupdate'=>'required|string|max:20',
            'pizzaimageupdate'=>'required|image'
        ]);
//        if ($request->fails()) {
//            return redirect('/editpizza')
//                ->withErrors($request)
//                ->withInput();
//        }
        $photo = $request->file('pizzaimageupdate');
        $photo->move(public_path('/css/foto'),$photo->getClientOriginalName());

        DB::table('pizza')->where('id',$Pizzaid)->update([
            'Pizza_name' => $request->pizzanameupdate,
            'Pizza_price' => $request->pizzapriceupdate,
            'Pizza_desc' => $request->Descupdate,
            'pizza_photo'=>$photo->getClientOriginalName(),
        ]);

        return redirect('/home');
    }
    public function delete($deletepizza){

        DB::table('pizza')->where('id',$deletepizza)->delete();

        return redirect('/home');
    }
    public function detail($pizza){
        $pizza = AllPizza::where('id', $pizza )->first();

        return view ('deletepizza', ['pizza'=>$pizza]);
    }
    public function detailcart($pizza){
        $pizza = AllPizza::where('id', $pizza )->first();

        return view ('cartPizza', ['pizza'=>$pizza]);
    }
    public function addCart(Request $request,$userid,$pizza_id)
    {
        $users = User::where('id' , $userid)->first();
        $pizza = AllPizza::where('id' , $pizza_id)->first();
        $validasi = Validator::make($request->all(),[
           'QuantityCart'=>'required|min:1'
        ]);
        if ($validasi->fails()) {
            return redirect('/cartPizza')
                ->withErrors($validasi)
                ->withInput();
        }
        DB::table('cart')->insert([
            'qty'=>$request->QuantityCart,

            'PizzaName'=>$pizza->Pizza_name,
            'PizzaPrice'=>$pizza->Pizza_price,
            'User_id'=>$users->id,
            'Pizza_id'=>$pizza->id,
            'total '=>$pizza->Pizza_price * $request->QuantityCart

        ]);
        return redirect('/home');


    }
    public function cartOrder(Request $request,$id)
    {
        $pizzas = AllPizza::where('id',$id)->first();
        $tanggal = Carbon::now();
        //simpan ke Cart
        $carts = new Cart;
        $carts->qty = $request->QuantityCart;
        $carts->User_id = Auth::user()->id;
        $carts->tanggal = $tanggal;
        $carts->status = 0;
        $carts->pizzaid =$pizzas->id;
        $carts-> namaorder = $pizzas ->Pizza_name;
        $carts-> photocart = $pizzas ->Pizza_photo;
        $carts-> total = $pizzas ->Pizza_price*$request->QuantityCart;
        $carts->save();
        //simpan ke Cartdetail
//
//        $pizzas2 = AllPizza::where('id',$id)->first();
//        $cartid = Cart::where('User_id', Auth::user()->id)->where('status',0)->first();
//
//        $CartDetail = new CartDetail;
//        $CartDetail->Qty = $request->QuantityCart;
//        $CartDetail-> pizza_id = $pizzas2;
//        $CartDetail->cart_id = $cartid;
//
//        $CartDetail-> Totalharga = $pizzas ->Pizza_price*$request->QuantityCart;
//        $CartDetail->save();

        return redirect('/home');


    }
    public function cartView()
    {
        $cart = Cart::all();
        return view('cartPizzaview',compact('cart'));

    }
    public function cartUpdate(Request $request, $id ,$pizzaid )
    {
        $pizzas = AllPizza::where('id',$pizzaid)->first();
        $cart = Cart::where('id',$id)->first();
        DB::table('cart')->where('id',$id)->update([

            'qty'=>$request->qtyupdate,
           'total'=>$pizzas ->Pizza_price*$request->qtyupdate

        ]);
        return redirect('/cartPizzaview');
    }

    public function cartDelete($cartid )
    {
        DB::table('cart')->where('id',$cartid)->delete();

        return redirect('/cartPizzaview');
    }

    public function CheckoutCart($id)
    {
        $user = Auth::user();
        $cart = Cart::where('id',$id)->first();
        DB::table('cartdetail')->insert([
            'Qty'=>$cart->qty,
            'tanggaltransaksi'=>$cart->tanggal,
            'cart_id'=>$cart->id,
            'pizza_id'=>$cart->pizzaid,
            'Totalharga'=>$cart->total


        ]);
        DB::table('cart')->where('id',$id)->delete();

    }
    public function transactionView()
    {
        $tr = CartDetail::all();
        return view('viewTransaction',compact('tr'));

    }
}

