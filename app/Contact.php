<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    /**
	 * Fillable fields for the table: Contact
	 * 
	 * @var array
	 */
    protected $fillable = [
    	'full_name', 'email', 'message'
    ];
	
    /**
     * Validation rules for the table: Contact
     * 
     * @var array
     */
	public static $contactRules = [
		'full_name'      => 'required|alpha_space',
		'email'          => 'required|email',
		'message'        => 'required|alpha_num_spec'
	];
}
