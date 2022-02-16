<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        // echo "Welcome to Product Page";
        // return Product::all();
        $data = Product::all();
        return view('product', ['products' => $data]);
    }
    function detail($id)
    {
        $product =  Product::find($id);
        return view('detail', ['product' => $product]);
    }
    function addToCart(Request $req)
    {
        if ($req->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    static function cartItem()
    {
        $userId = session('user')['id'];
        // print_r($userId);
        return Cart::where('user_id', $userId)->count();
        // print_r($data);

    }

    function cartList()
    {
        // echo "CartLst";
        if(session('user')){
        $userId = session('user')['id'];
        $cartlist_item = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*','cart.id as cart_id')
            ->get();

        //print_r($cartlist_item);
        return view('cartlist', ['cartlist_item' => $cartlist_item]);
        }else{
            return redirect('/login');
        }
    }

    function removeCartItem($id)
    {
        Cart::destroy($id);
        return redirect('/cartlist');
    }

    function test(){
        
    }

    function multiply(){
        
    }



}