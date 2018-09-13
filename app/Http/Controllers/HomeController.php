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

        
        dd("Hola  ".Auth::user()->personas->first());
        //Modelo de Auth está directamente en APP y no en app/models
        if(Auth::user()->hasRole('ApoderadoPotulante')) {

            $apoderado= Apoderado::with([Auth::user()->personas->first()])->get();
            dd($apoderado->toArray());
            //Ahora tengo que traer a la mesa el Id del Apoderado Asociado para poder editarlo.

            //Pregunta si existe la persona de tipo Apoderado
            if(Auth::user()->personas('ApoderadoPotulante')) {

                //Pregunta si existe el Apoderado efectivamente
                return route('apoderadosPostulantes.edit', [$apoderado->id]);
            }
        }

        route('apoderados.edit', [$apoderado->id])

    
    }
    return view('home');
}
}
