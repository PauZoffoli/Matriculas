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
        //dd('x');
        return $user->id == $persona->idUser;
    }
}
