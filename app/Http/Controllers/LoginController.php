<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        return view('login');
    }
    public function Token_login(Request $request)
    {

        $validated = $request->validate([
            'token_unique' => ['required', 'exists:users'],
        ]);


$user = User::where('token_unique',$request->token_unique)->first();
        $data = User::findOrFail($user->id);
        Auth::guard('web')->login($data);
        return redirect()->route('dashboard');
    }


}
