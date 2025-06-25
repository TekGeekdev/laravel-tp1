<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'email' => 'required|email|exists:users',
        'password' => 'required|min:2|max:20'
    ]);
        $credentials = $request->only('email', 'password');
        if(!Auth::validate($credentials)):
            return redirect(route('login'))
                    ->withErrors(trans('auth.failed'))
                    ->withInput();
        endif;

        
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return redirect()->intended(route('student.index'))->withSuccess(trans('lang.message_success_connected'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
