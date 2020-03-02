<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    protected $table = 'partners';

    use ScopeTrait;

    /**
	 * Fillable fields for the table: Partners
	 * 
	 * @var array
	 */
    protected $fillable = [
    	'name', 'link', 'image', 'description'
    ];
	
    /**
     * Validation rules for the table: Partners
     * 
     * @var array
     */
	public static $partnersRules = [
		'name'            => 'required|unique:partners,name|alpha_space',
		'link'			  => 'required|url',
		'image'           => 'required|image',
		'description'     => 'alpha_num_spec'
	];

    /**
     * Get the result by the given id parameter
     * 
     * @param  integer $id
     * @return object \App\Partners
     */
    public function getPartnerById($id)
    {
        return $this->whereId($id)->first();
    }
}
