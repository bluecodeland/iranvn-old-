<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Verta;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

        $v = new Verta(); //1396-02-02 15:32:08
        $v = verta(); //1396-02-02 15:32:08
        return view('home')->with('fullname', $v);
    }

    
}
