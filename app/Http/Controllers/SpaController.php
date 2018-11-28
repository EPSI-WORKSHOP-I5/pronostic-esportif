<?php

namespace App\Http\Controllers;

class SpaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display vue's view.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }
}
