<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (!Auth::guest()){
        
        //Modelo de Auth está directamente en APP y no en app/models
        if(Auth::user()->hasRole('Secretariado')) {
             return redirect('apoderadosPostulantes');
        }

        //Modelo de Auth está directamente en APP y no en app/models
        if(Auth::user()->hasRole('ApoderadoPotulante')) {
            if(Auth::user()->personas('ApoderadoPotulante')) {
                return route('apoderadosPostulantes.edit', [$apoderado->id]);
            }
        }

        route('apoderados.edit', [$apoderado->id])

    
    }
    return view('home');
}
}
