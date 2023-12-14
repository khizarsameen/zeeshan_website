<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $items = DB::table('items')->select('id', 'title', 'price');
            return DataTables::of($items)
                ->addIndexColumn()
    
                ->addColumn('action', function ($row) {
                    $editRoute = route('items.edit', array('item' => $row->id));
                    $delRoute = route('items.destroy', array('item' => $row->id));
                    $btn = '<button class="btn btn-primary btn-sm btn-edit" style="margin-right: 5px;" type="button" value="' . $row->id . '">Edit</button>';
                    $btn .= '<button class="btn btn-danger btn-sm btn-delete" type="button" value="' . $row->id . '">Delete</button>';
    
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);

        }
        if(auth()->user()->user_type == 0){
            


            return redirect('redirect');
        }
            return view('admin.items');

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
            'title' => 'required|unique:items,title,' . $request->item_id,
            'description' => 'required',
            'price' => 'required|numeric|gt:0'

        ];

        if(!($request->item_id > 0)) {
            $rules['item_image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        } else if(($request->item_id > 0) && ($request->hasFile('item_image'))){
            $rules['item_image'] = 'image|mimes:jpeg,png,jpg,gif|max:2048';

        }

        $messages = [
            'title.required' => 'Item Title must be entered !',
            'title.unique' => 'Item with this title already exists !',
            'description.required' => 'Item description must be entered !',
            'price.required' => 'Price must be entered !',
            'item_image.required' => 'Image file must be selected !',



        ];

        Validator::make($request->all(), $rules, $messages)->validate();

        return DB::transaction(function () use ($request) {
            $imageName = Item::find($request->item_id)->image_url ?? "";
            if ($request->hasFile('item_image')) {
                $imageName = $request->title.'.' . $request->file('item_image')->getClientOriginalExtension();
                // $imagePath = $request->file('item_image')->storeAs('public/images', $imageName);
                $imagePath = $request->item_image->move('product', $imageName);
                // Your logic to save $imagePath or $imageName in the database or perform other actions.
            }

            $data = [
                'title' => $request->title, 'description' => $request->description,
                'image_url' => "$imageName", 'price' => $request->price,'quantity_available' => 0
            ];

            $rec = Item::updateOrCreate(['id' => $request->item_id], $data);

            return response()->json(['message' => 'success']);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $item->image_url = asset("product/$item->image_url");
        return $item;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item, Request $request)
    {
        if ($request->check == 'true') {
            $chk = OrderItem::where('item_id', $item->id)->exists();
            if ($chk) {
                return response()->json(['errors' => ['error' => 'Order has been placed for this item cannot delete']], 422);
            }
            // $chk = UserMovie::where('movie_id', $movie->id)->exists();
            // if ($chk) {
            //     return response()->json(['errors' => ['error' => 'Movie once rented cannot be deleted']], 422);
            // }
        } else {
            Item::destroy($item->id);
            File::delete(public_path("product/$item->image_url"));
        }
    }

    public function getAllItems() {
        $items = Item::select('items.*')->paginate(2);
        $cart_item_count = CartController::cartItemsCount();

        return view('home.allitems', compact('items', 'cart_item_count'));
    }
}
