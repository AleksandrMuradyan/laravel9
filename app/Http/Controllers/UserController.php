<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('token');
    }
    public function index(){

        return view('dashboard.index');
    }
    public function product_list(){

$product = Product::all()->toJson();
    return view('dashboard.product_list',['product'=>$product]);
    }
    public function create_product(Request $request)
    {
       $request->validate([
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'max:255'],
        ]);

           $data = new Product();
            $data->name = $request->name;
            $data->price = $request->price;
            $data->description = $request->description;
            $data->save();
        $log = New Log();
        $log->user_id = Auth::user()->id;
        $log->name = Auth::user()->name;
        $log->action = 'CREATE';
        $log->save();
            return response()->json('success', 200);

    }

    public function product_edit($id)
    {
        $data = Product::findOrFail($id)->toJson();

        return view('dashboard.product_update',compact('data'));
    }
    public function product_update(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'name' => ['required', 'max:255'],
            'price' => ['required', 'numeric'],
            'description' => ['required', 'max:255'],
        ]);

        $data = Product::Find($request->id);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->update();
        $log = New Log();
        $log->user_id = Auth::user()->id;
        $log->name = Auth::user()->name;
        $log->action = 'UPDATE';
        $log->save();
        return response()->json('success', 200);

    }

    public function product_delete($id)
    {
        $data = Product::findOrFail($id)->toJson();;
        return view('dashboard.product_delete',compact('data'));
    }
    public function delete_product(Request $request)
    {


        $request->validate([
            'id' => ['required'],
        ]);

        $data = Product::Find($request->id);

        $data->delete();
        $log = New Log();
        $log->user_id = Auth::user()->id;
        $log->name = Auth::user()->name;
        $log->action = 'DELETE';
        $log->save();
        return response()->json('success', 200);
    }
    public function logs(){
 $data = Log::all()->toJson();
        return view('dashboard.logs',compact('data'));
    }

}
