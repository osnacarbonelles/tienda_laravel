<?php

namespace App\Http\Controllers;

use App\Product;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Cart;

class CartController extends Controller
{
    public function shop()
    {
        $products = Product::all();
        // return dd($products);
        return view('shop')->withTitle('E-COMMERCE STORE | SHOP')->with(['products' => $products]);
    }

    public function cart()  {
        $cartCollection = \Cart::getContent();
        // dd($cartCollection);
        return view('cart')->withTitle('E-COMMERCE STORE | CART')->with(['cartCollection' => $cartCollection]);;
    }

    public function add(Request $request){
        \Cart::add(array(
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->img,
                'slug' => $request->slug
            )
        ));

        return redirect()->route('cart.index')->with('success_msg', '¡El artículo se ha agregado!');
    }

    public function remove(Request $request){
        \Cart::remove($request->id);
        return redirect()->route('cart.index')->with('success_msg', '¡El artículo se ha retirado!');
    }

    public function update(Request $request){
        \Cart::update($request->id,
            array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity
                ),
        ));
        return redirect()->route('cart.index')->with('success_msg', '¡El carrito está actualizado!');
    }

    public function comprado(Request $request) {
        Cart::clear();
        $listaProducto = DB::table('products')->get();
        $email = 'osnace@gmail.com';
        $gmail = 'Estimado cliente, ya ha realizado su compra!';
        Mail::to($email)->send(new SendMail($gmail));
        return redirect()->route('cart.index')->with('success_msg', '¡La compra se ha enviado a su correo!');;
    }

}
