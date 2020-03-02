<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{
    protected $table = 'research';
	
    /**
	 * Fillable fields for the table: Research
	 * 
	 * @var array
	 */
    protected $fillable = ['document', 'title', 'description', 'research_category_id', 'created_by', 'updated_by'];

    /**
     * Validation rules
     * 
     * @var array
     */
    public static $researchRules = [
        'document'             => 'required|mimes:pdf,doc,docx,txt',
        'title'                => 'required|alpha_num_spec',
        'description'          => 'required',
        'research_category_id' => 'exists:research_category,id',
    ];

    /**
     * (1:m relationship) with the users table
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    /**
	 * Each research can be related with only one category
	 * (1:m relatioship)
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
    public function research_category(){

    	return $this->belongsTo('App\ResearchCategory');
    }

    /**
     * Scope a query to order all news by the given parameter.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAllOrderBy($query, $order, $direction = 'ASC')
    {
        return $query->orderBy($order, $direction)->with('creator', 'research_category')->get();
    }

    /**
     * Get the result by the given id parameter
     * 
     * @param  integer $id
     * @return object \App\Research
     */
    public function getResearchById($id)
    {
        return $this->whereId($id)->first();
    }

}
