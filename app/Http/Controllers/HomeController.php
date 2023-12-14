<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $items = DB::table('items')->get();
        $cart_item_count = CartController::cartItemsCount();
        return view('home.userpage', compact('items', 'cart_item_count'));
    }

    public function redirect() {
        if(auth()->user()->user_type == 1) {
            return view('admin.dashboard');
        } else {
            
            $items = DB::table('items')->get();
            $cart_item_count = CartController::cartItemsCount();

            return view('home.userpage', compact('items', 'cart_item_count'));

        }
    }

    public function product_details($id) {
        $item = DB::table('items')->where('id', $id)->first();
        $cart_item_count = CartController::cartItemsCount();

        return view('home.product_details', compact('item', 'cart_item_count'));
    }

    public function addToCart(Request $request) {
        
    }


}
