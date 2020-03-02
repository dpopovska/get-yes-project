<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
	protected $table = 'roles';
	
    /**
	 * Fillable fields for the table: Roles
	 * 
	 * @var array
	 */
    protected $fillable = [
    	'name', 'created_at', 'updated_at'
    ];
	
	/**
    * Get all roles with their ids and names
    *
    * @return collection
    */
    public function scopeAllRolesWitnIdNaziv(){
        
        return $this->lists('name', 'id')->all();
    }
}
