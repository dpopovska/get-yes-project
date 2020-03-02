<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materials extends Model
{
    protected $table = 'materials';

    use ScopeTrait;

    /**
	 * Fillable fields for the table: Materials
	 * 
	 * @var array
	 */
    protected $fillable = [
    	'file', 'title', 'description', 'created_by', 'updated_by'
    ];

    /**
     * Validation rules
     * 
     * @var array
     */
    public static $newsRules = [
    	'file'			 => 'required|mimes:pdf,doc,docx,txt',
        'title'          => 'required|alpha_num_spec',
        'description'    => 'required'
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
     * Get the result by the given id parameter
     * 
     * @param  integer $id
     * @return object \App\Partners
     */
    public function getMaterialById($id)
    {
        return $this->whereId($id)->first();
    }
}
