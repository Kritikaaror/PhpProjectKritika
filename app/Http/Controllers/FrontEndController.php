<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Session;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index', ['products' => Product::paginate(3)]);
    }

    public function singleProduct($id)
    {
        return view('single', ['product' => Product::find($id)]);
    }
    
    public function searchFunction(){
        
        return view('searchpage');
    }
    
     public function wishlist()
    {
        return view('wishlist');
    }
    
    public function add_to_wishlist()
    {
        $pdt = Product::find(request()->pdt_id);

        $wishlistItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price
        ]);

        Cart::associate($wishlistItem->rowId, 'App\Product');
        Session::flash('success', 'Product added to wish List.');

        return redirect()->route('wishlist');
    }
    
     public function wishlist_delete($id)
    {
        Cart::remove($id);

        Session::flash('success', 'Product removed from the wish list');
        return redirect()->back();
    }

}
