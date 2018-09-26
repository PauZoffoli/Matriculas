<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Persona;
use App\Models\User;
use App\Models\Apoderado;
use Illuminate\Validation\ValidationException;
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

        $persona = Auth::user()->personas->first();
        
        // Laravel – querying any level far relations with simple trick https://softonsofa.com/laravel-querying-any-level-far-relations-with-simple-trick/   HASMANYTHROUGH
        //https://medium.com/@cvallejo/autenticaci%C3%B3n-de-usuarios-y-roles-en-laravel-5-5-97ab59552d91

        //No todos los usuarios tienen por qué tener una persona
        if($persona!=null){ //Comprobar si el usuario tiene una persona
        //Comprobar si ese usuario tiene una persona de tipo ApoderadoPostulante.
            if(Auth::user()->hasRole('ApoderadoPostulante')) { //Comprobar el rol de usuario de la persona
                return route('apoderadosPostulantes.edit');
            }
        }
    }
      
        return view('MatriculaPostulante.index');
    }
}
