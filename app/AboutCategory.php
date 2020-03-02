<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutCategory extends Model
{
    protected $table = 'about_category';

    /**
	 * Fillable fields for the table: AboutCategory
	 * 
	 * @var array
	 */
    protected $fillable = ['category'];

    /**
    * Select of all about categories in array with id & category
    */
    public function getAllCategoriesAsArray(){
        
        return $this->lists('category', 'id')->all();
    }
}
