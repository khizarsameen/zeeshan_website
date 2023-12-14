<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class OrderManagmentController extends Controller
{

    public function updateDlvryStatus(Request $request) {
        Order::where('id', $request->order_id)->update(['delivery_status' => 'delivered']);
        return response()->json('success');
    }

    public function viewOrder(Request $request) {
        $order = Order::find($request->order_id);
        $order_items = OrderItem::
        leftJoin('items', function ($join) {
            $join->on('order_items.item_id', '=', 'items.id');
        })
        ->select('order_items.*', 'items.title', 'items.image_url')
        ->where('order_items.order_id', $order->id)->get();
        return view('admin.order_form', compact('order', 'order_items'));
    }
    public function ordersList(Request $request) {
        if($request->ajax()) {
            $items = DB::table('orders')
            ->leftJoin('users', function ($join) {
                $join->on('orders.user_id', '=', 'users.id');
            })
            ->select('orders.id', 'orders.order_no', 'orders.amount','orders.delivery_status', 'users.name');
            return DataTables::of($items)
                ->addIndexColumn()
    
                ->addColumn('action', function ($row) {
                    $btn = '<button class="btn btn-primary btn-sm btn-vieworder" style="margin-right: 5px;" type="button" value="' . $row->id . '">View Order Details</button>';
                    if($row->delivery_status == 'processing') {
                        $btn .= '<button class="btn btn-warning btn-sm btn-updatestatus" style="margin-right: 5px;" type="button" value="' . $row->id . '">Update Status</button>';
                    } else {
                        $btn .= '<button class="btn btn-warning btn-sm btn-updatestatus" disabled style="margin-right: 5px;" type="button" value="' . $row->id . '">Update Status</button>';

                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        }
        if(auth()->user()->user_type == 0){
            


            return redirect('redirect');
        }
        return view('admin.order_managment');
    }
}
