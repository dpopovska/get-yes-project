<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use ScopeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'korisnicko_ime', 'roles_id', 'email', 'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Validation rules
     * 
     * @var array
     */
    public static $userRules = [
        'name'           => 'required|max:255',
        'email'          => 'required|email|max:255|unique:users',
        'password'       => 'required|min:6',
        'roles_id'       => 'required|exists:roles,id'
    ];

    /**
     * Get the (INNER) users password reset validation rules.
     *
     * @return array
     */
    public function getResetValidationRules()
    {
        return [
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6'
        ];
    }

    /**
     * (1:m relationship) with the rolji table
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roles(){

        return $this->belongsTo('App\Roles');
    }

    /**
     * Convert the password to hash value before saving
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Check if the user has the given role
     * @param  string $role 
     * @return boolean
     */
    public function checkIfUserIs($role)
    {
       return strtolower($this->roles->name) == strtolower($role);
    }
}
