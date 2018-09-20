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
        return $this->hasMany(\App\Models\Persona::class, 'idUser');
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

     /**
     * Get all of the posts for the country.
         public function apoderados()
    {
        return $this->hasManyThrough('App\Apoderado', 'App\Persona', 'id', '');
    }*/



   /* public function tipos()
    {
        return $this->hasManyThrough(
            'App\Persona',
            'App\User',
            'idUser', // Foreign key on users table...
            'user_id', // Foreign key on posts table...
            'id', // Local key on countries table...
            'id' // Local key on users table...
        );
        return $this->hasManyThrough('App\Persona', 'App\User', 'id')->;
    }

    public function orders(){
        return $this->hasManyThrough('Contact', 'Account', 'owner_id')->join('orders','contact.id','=','orders.contact_ID')->select('orders.*');
    }*/


}
