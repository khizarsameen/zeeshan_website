<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CartController extends Controller
{

    public static function cartItemsCount() {
        $qty = Cart::where('user_id', auth()->user()->id ?? 0)->sum('qty');
        return $qty;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $items = DB::table('cart')
            ->leftJoin('items', function ($join) {
                $join->on('cart.item_id', '=', 'items.id');
            })
            ->select('cart.id', 'items.title', 'cart.qty', 'cart.rate', 'cart.amount')
            ->where('cart.user_id', auth()->user()->id);

            $totalAmount = Cart::where('user_id', auth()->user()->id)->sum('amount');
            return DataTables::of($items)
                ->addIndexColumn()
    
                ->addColumn('action', function ($row) {
                    $btn = '<button class="btn btn-danger btn-sm btn-delete" type="button" value="' . $row->id . '"><i class="fa fa-trash"></button>';
    
                    return $btn;
                })
                ->rawColumns(['action'])
                ->with('amount', $totalAmount)
                ->make(true);

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::check()) {
            $price = Item::find($request->item_id)->price ?? 0;
            $cart = Cart::where('item_id', $request->item_id)->where('user_id', auth()->user()->id)->first();
            if($cart) {
                $cart->qty += $request->qty;
                $cart->rate = $price;
                $cart->amount = $cart->qty * $cart->rate;
                $cart->save();
            } else {
                
                $amount = $request->qty * $price;
                Cart::create(['item_id' => $request->item_id, 'user_id' => auth()->user()->id,
                'qty' => $request->qty, 'rate' => $price, 'amount' => $amount]);
            }

            $cart_items  = DB::table('cart')
            ->leftJoin('items', function ($join) {
                $join->on('cart.item_id', '=', 'items.id');
            })
            ->select('cart.id', 'items.title', 'cart.qty', 'cart.amount')
            ->where('cart.user_id', auth()->user()->id)->get();
            return response()->json(['logged_in' => true, 'message' => 'Added to Cart !', 'cart_items' => $cart_items]);    
        } else {
            return response()->json(['logged_in' => false, 'message' => 'Not Added to Cart !']);    

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        Cart::destroy($cart->id);
    }

    public function incrementQty(Request $request){
        $qty = $request->qty + 1;
        $cart = Cart::find($request->cart_id);
         
        $cart->qty = $qty;
        $cart->amount = $cart->rate * $cart->qty;
        $cart->save();
        $user_id = auth()->user()->id;
        $cart->grand_total = Cart::where('user_id', $user_id)->sum('amount');
        $cart->grand_qty = Cart::where('user_id', $user_id)->sum('qty');
        return response()->json($cart);
    }
    
    public function decrementQty(Request $request){
        $qty = $request->qty - 1;
        $cart = Cart::find($request->cart_id);
        if($cart->qty == 1) {
            $cart->status = 'not_updated';
            return response()->json($cart);
        }
        $cart->qty = $qty;
        $cart->amount = $cart->rate * $cart->qty;
        $cart->save();
        $cart->status = 'updated';
        $user_id = auth()->user()->id;
        $cart->grand_total = Cart::where('user_id', $user_id)->sum('amount');
        $cart->grand_qty = Cart::where('user_id', $user_id)->sum('qty');


        return response()->json($cart);
    }

    public function getItems(Request $request) {
        if(Auth::check()) {
            $user_id = auth()->user()->id;
            $cart_items  = DB::table('cart')
            ->leftJoin('items', function ($join) {
                $join->on('cart.item_id', '=', 'items.id');
            })
            ->select('cart.id', 'items.title', 'cart.qty', 'cart.amount')
            ->where('cart.user_id', $user_id)->get();

            // $cart_total = Cart::where('user_id', $user_id)->sum('amount');
            
            return response()->json(['cart_items' => $cart_items, 'logged_in' => true]);
        } else {
            return response()->json(['logged_in' => false]);

        }
        
    }
}
