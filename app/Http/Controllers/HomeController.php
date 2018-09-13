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
     * https://stackoverflow.com/questions/23546331/using-auth-to-get-the-role-of-user-in-a-pivot-table
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()){
         return null;
        }


        //Rol 1 Administrador
       if(Auth::user()->hasRole('Secretariado')) {
            dd("Funcionó");
        }

        //return view('home');
    }
}
