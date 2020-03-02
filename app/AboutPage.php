<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $table = 'about';

    /**
	 * Fillable fields for the table: About
	 * 
	 * @var array
	 */
    protected $fillable = [
    	'name', 'title', 'image', 'biography', 'about_category_id'
    ];
	
    /**
     * Validation rules for the table: About
     * 
     * @var array
     */
	public static $aboutRules = [
		'name'            	=> 'required|unique:about,name|alpha_space',
		'title'			  	=> 'required|alpha_num_spec',
		'about_category_id' => 'exists:about_category,id',
		'biography'       	=> 'required|alpha_num_spec',
		'image'           	=> 'required|image'
	];

	/**
	 * Each member can be related with only one category
	 * (1:m relatioship)
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function about_category(){

    	return $this->belongsTo('App\AboutCategory');
    }

	/**
     * Scope a query to order all about page members by the given parameter.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAllOrderBy($query, $order, $direction = 'ASC')
    {
        return $query->orderBy($order, $direction)->with('about_category')->get();
    }

    /**
     * Get the result by the given id parameter
     * 
     * @param  integer $id
     * @return object \App\AboutPage
     */
    public function getMemberById($id)
    {
        return $this->whereId($id)->first();
    }
}
