<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;


class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register(StoreUserRequest $request)
    {

        $data = $request->all();
        session(['name' => $data['name']]);
        session(['lastname' => $data['lastname']]);
        session(['email' => $data['email']]);


        return redirect()->route('info');;
    }
}
