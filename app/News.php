<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $table = 'news';
	
    /**
	 * Fillable fields for the table: News
	 * 
	 * @var array
	 */
    protected $fillable = ['url_unique', 'title', 'image', 'thumbnail', 'description', 'created_by', 'updated_by'];


    /**
     * Validation rules
     * 
     * @var array
     */
    public static $newsRules = [
        'title'          => 'required|alpha_num_spec',
        'description'    => 'required',
        'thumbnail'      => 'image',
        'image'          => 'required|image'
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
     * Scope a query to order all news by the given parameter.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAllOrderBy($query, $order, $direction = 'ASC')
    {
        return $query->orderBy($order, $direction)->with('creator')->get();
    }

    /**
     * Get the result by the given id parameter
     * 
     * @param  integer $id
     * @return object \App\News
     */
    public function getNewsById($id)
    {
        return $this->whereId($id)->first();
    }

    /**
     * Get last added X news added in the database
     * 
     * @param integer $how_many
     * @return Collection
     */
    public function getLastNews($how_many)
    {
    	return $this->orderBy('created_at', 'DESC')->take(4)->get();
    }

    /**
     * Get all news (use them with pagination)
     * 
     * @param string $keyword
     * @param string $year
     * @param string $month
     * @return Eloquent Builder
     */
    public function getNewsList($keyword, $year, $month)
    {
        // In case user makes search request through the news
        if(!is_null($keyword))
            return $this->where("title", "LIKE", "%$keyword%")->orWhere("description", "LIKE", "%$keyword%")->orderBy('created_at', 'DESC'); 
        else if(!is_null($year)){
            if(!is_null($month)) return $this->where(DB::raw("YEAR(created_at)"), "=", $year)->where(DB::raw("MONTH(created_at)"), "=", $month)->orderBy('created_at', 'DESC');
            else return $this->where(DB::raw("YEAR(created_at)"), "=", $year)->orderBy('created_at', 'DESC');
        }
        else return $this->orderBy('created_at', 'DESC');
    }

    /**
     * Get count of all news in a current OR selected year (grouped by month)
     *
     * @param string $selected_year
     * @return Collection
     */
    public function getArchiveByYear($selected_year)
    {
        $results_array = [];

        $year = (!is_null($selected_year)) ? $selected_year : Carbon::now()->year;

        $results = $this->select(DB::raw("MONTH(created_at) as month, count(id) as news_in_a_month"))->where(DB::raw("YEAR(created_at)"), "=", $year)
                        ->groupBy(DB::raw("MONTH(created_at)"))->orderBy("created_at")->get()->toArray();

        foreach ($results as $key => $value) {
            $results_array[$value['month']] = $value['news_in_a_month'];
            unset($results[$key]);
        }
        
        return $results_array;
    }
}
