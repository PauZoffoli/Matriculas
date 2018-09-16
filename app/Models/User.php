<?php

namespace App\Models;

use Eloquent as Model;

/** LO QUE HAGAMOS AQUÍ NO TIENE EFECTO EN AUTH::USERS PUESTO QUE ESE MODELO ESTÁ DIRECTAMENTE EN APP Y NO EN APP\MODELS, ES DECIR, ES OTRO
 * Class User
 * @package App\Models
 * @version September 12, 2018, 10:18 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection alumnoResponsable
 * @property \Illuminate\Database\Eloquent\Collection detalleBecaAlumno
 * @property \Illuminate\Database\Eloquent\Collection Persona
 * @property \Illuminate\Database\Eloquent\Collection repitencias
 * @property \Illuminate\Database\Eloquent\Collection UserRol
 * @property string name
 * @property string email
 * @property string|\Carbon\Carbon email_verified_at
 * @property string password
 * @property string remember_token
 */
class User extends Model
{

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
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






}
