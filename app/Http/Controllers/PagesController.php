<?php

namespace App\Http\Controllers;


class PagesController extends Controller
{
public function getIndex() {

    return view('welcome');
    //return view('pages/welcome');
    //return view('pages.welcome');
    //return view('welcome')->with('fullName', $fullname);
    //return view('welcome')->withFullName($fullname);
    

}

}
