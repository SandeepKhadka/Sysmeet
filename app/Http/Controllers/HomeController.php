<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.admin')->with('success', 'Welcome Admin!');
    }

    public function admin()
    {
        // return view('layouts.admin')->with('success', 'Welcome Admin!');
        return redirect()->route('admin.home')->with('success', 'Welcome Admin!');
    }
}
