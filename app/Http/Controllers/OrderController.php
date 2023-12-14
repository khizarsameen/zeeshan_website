<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function orderCompleted(Request $request) {
        $order_no = $request->order_no;
        return view('home.order_complete', compact('order_no'));
    }
    public function orderBilling() {
        $cart_item_count = CartController::cartItemsCount();

        return view('home.billing_form', compact('cart_item_count'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $rules = [
            'contact' => 'required',
            'ship_region' => 'required',
            'ship_firstname' => 'required',
            'ship_lastname' => 'required',
            'ship_address' => 'required',
            'ship_city' => 'required',
            'ship_postalcode' => 'required',
            'ship_phone' => 'required',
            'pmnt_type' => 'required',
        ];

        if(($request->billing_type == 2)) {
            $rules['billing_region'] = 'required';
            $rules['billing_firstname'] = 'required';
            $rules['billing_lastname'] = 'required';
            $rules['billing_address'] = 'required';
            $rules['billing_city'] = 'required';
            $rules['billing_postalcode'] = 'required';
            $rules['billing_phone'] = 'required';
        } 

        $messages = [
            'contact.required' => 'Contact must be entered !',
            'ship_region.required' => 'Region mus be selected !',
            'ship_firstname.required' => 'First name must be entered !',
            'ship_lastname.required' => 'Last name must be entered !',
            'ship_address.required' => 'Address must be entered !',
            'ship_city.required' => 'City must be entered !',
            'ship_postalcode.required' => 'Postal code must be entered !',
            'ship_phone.required' => 'Phone must be entered !',
            
            'billing_region.required' => 'Region mus be selected !',
            'billing_firstname.required' => 'First name must be entered !',
            'billing_lastname.required' => 'Last name must be entered !',
            'billing_address.required' => 'Address must be entered !',
            'billing_city.required' => 'City must be entered !',
            'billing_postalcode.required' => 'Postal code must be entered !',
            'billing_phone.required' => 'Phone must be entered !',



        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        return DB::transaction(function () use ($request) {
            if($request->order_id > 0) {
                $order_no = $request->order_no;
            } else {
                $order_no = Order::max('order_no');
                if(is_null($order_no)) {
                    $order_no = 1;
                }

                $order_no++;
            }

            $user_id = auth()->user()->id;
            $cart_items = DB::table('cart')
            ->select('item_id', 'qty', 'rate', 'amount')
            ->where('user_id', $user_id)
            ->get();

            if($request->billing_type == 2) {
                $billing_region = $request->billing_region;
                $billing_firstname = $request->billing_firstname;
                $billing_lastname = $request->billing_lastname;
                $billing_address = $request->billing_address;
                $billing_city = $request->billing_city;
                $billing_postalcode = $request->billing_postalcode;
                $billing_phone = $request->billing_phone;
            } else {
                $billing_region = $request->ship_region;
                $billing_firstname = $request->ship_firstname; 
                $billing_lastname = $request->ship_lastname;
                $billing_address = $request->ship_address;
                $billing_city = $request->ship_city;
                $billing_postalcode = $request->ship_postalcode;
                $billing_phone = $request->ship_phone;
            }
                
                

            $data = [
                'order_no' => $order_no,
                'contact' => $request->contact,
                'ship_region' => $request->ship_region,
                'ship_firstname' => $request->ship_firstname,
                'ship_lastname' => $request->ship_lastname,
                'ship_address' => $request->ship_address,
                'ship_city' => $request->ship_city,
                'ship_postalcode' => $request->ship_postalcode,
                'ship_phone' => $request->ship_phone,
                'bill_region' => $billing_region,
                'bill_firstname' => $billing_firstname,
                'bill_lastname' => $billing_lastname,
                'bill_address' => $billing_address,
                'bill_city' => $billing_city,
                'bill_postalcode' => $billing_postalcode,
                'bill_phone' => $billing_phone,
                'amount' => $cart_items->sum('amount'),
                'delivery_status' => 'processing',
                'user_id' => $user_id
            ];

            $order = Order::updateOrCreate(
                ['id' => $request->order_id],
                $data
            );

            $order_items = [];
            foreach($cart_items as $cit) {
                $row = [
                    'order_id' => $order->id,
                    'item_id' => $cit->item_id,
                    'qty' => $cit->qty,
                    'rate' => $cit->rate,
                    'amount' => $cit->amount
                ];

                array_push($order_items, $row);
            }

            OrderItem::insert($order_items);

            Cart::where('user_id', auth()->user()->id)->delete();                
                
             return response()->json(['order_id' => $order->id, 'order_no' => $order->order_no]);   

                
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
