<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $items = DB::table('users')->select('id', 'email', 'name', 'user_type');
            return DataTables::of($items)
                ->addIndexColumn()
                ->addColumn('user_type', function ($row) {
                    return $row->user_type == '1' ? 'Admin' : 'Guest';
                    
                })
                ->addColumn('action', function ($row) {
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
            return view('admin.users');
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
            'user_name' => 'required',
            'user_email' => 'required|unique:users,email,' . $request->user_id,


        ];



        $messages = [
            'user_name.required' => 'Name must be entered',
            'user_email.required' => 'Email must be entered',
            'user_email.unique' => 'Email must be unique',
            'user_password.required' => 'Password must be entered',



        ];

        if (!($request->user_id > 0)) {
            $rules['user_password'] = 'required|string|min:8';
        }

        Validator::make($request->all(), $rules, $messages)->validate();

        return DB::transaction(function () use ($request) {
            if ($request->user_id > 0) {
                $data = [
                    'name' => $request->user_name,
                    'email' => $request->user_email,
                    'user_type' => $request->user_type,
                ];

                if ($request->user_password) {
                    $data['password'] = Hash::make($request->user_password);
                }

                User::where('id', $request->user_id)->update($data);
            } else {
                $data = [
                    'name' => $request->user_name,
                    'email' => $request->user_email,
                    'user_type' => $request->user_type,
                    'password' => Hash::make($request->user_password),
                ];

                User::create($data);
            }


            return response()->json(['message' => 'success']);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin_user, Request $request)
    {
        if ($request->check == 'true') {
            $chk = Order::where('user_id', $admin_user->id)
                ->exists();
            if ($chk) {
                return response()->json(['errors' => ['error' => 'Entries exists under this user cannot be deleted']], 422);
            }

            $count = User::where('user_type', 1)->count();
            if ($count == 1) {
                return response()->json(['errors' => ['error' => 'Atlease single admin user must be present']], 422);
            }
        } else {
            User::destroy($admin_user->id);
        }
    }
}
