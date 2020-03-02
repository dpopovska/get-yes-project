<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResearchCategory extends Model
{
    protected $table = 'research_category';

    /**
	 * Fillable fields for the table: ResearchCategory
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
