<?php

namespace App\Applications\Administration\Auth\Http\Controllers;
use App\Applications\Administration\Base\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;


class AuthController extends BaseController
{
    protected $redirectPath = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('guest', ['except' => 'getLogout']);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getPrincipal()
    {
        return 'Junior';
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
