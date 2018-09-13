<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $table = 'users';

        const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function personas()
    {
        return $this->hasMany(\App\Models\Persona::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userRols()
    {
        return $this->hasMany(\App\Models\UserRol::class);
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     Many to many
     **/
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Roles::class, 'user_rol','idUser','idRol');
    }

  //https://stackoverflow.com/questions/23546331/using-auth-to-get-the-role-of-user-in-a-pivot-table
    public function hasRole($role = null) {
        $hasRole = false;
        $hasRole = !$this->roles->filter(function($item) use ($role) {
        return $item->nombre == $role;
        })->isEmpty();
        return $hasRole;
    }

    //https://stackoverflow.com/questions/23546331/using-auth-to-get-the-role-of-user-in-a-pivot-table
    public function hasPersona($id = null) {
        $hasPersona = false;
        $hasPersona = !$this->personas->filter(function($item) use ($id) {
        return $item->id == $id;
        })->isEmpty();
        return $hasPersona;
    }
}
