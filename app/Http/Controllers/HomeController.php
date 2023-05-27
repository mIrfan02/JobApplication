<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class HomeController extends Controller
{
    protected function authenticated()
    {
        if (auth()->user()->hasRole('super-admin')) {
            return redirect()->route('admin_dashboard');
        } else {
            return redirect()->route('login');
        }
    }
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
        // return view('home');
        return redirect()->route('admin_dashboard');
    }
}
