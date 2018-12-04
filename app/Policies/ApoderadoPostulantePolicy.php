<?php

namespace App\Policies;

use App\User;
use App\Models\Persona;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApoderadoPostulantePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function pass(User $user, Persona $persona)
    {
        return $user->id == $persona->idUser;
    }

    public function alumnoDeApoderado(User $user, Persona $persona)
    {
        return $user->persona->id == $persona->alumno->apoderado->persona->id;
    }

    public function revisorOAdministrador(User $user)
    {
        if($user->hasRole('Secretariado'))
        {
            return true;
        }
        return false;
    }
}
