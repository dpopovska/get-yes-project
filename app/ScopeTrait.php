<?php

namespace App;
use DB;

trait ScopeTrait{

    /**
     * Scope a query to order all data in table by the given parameter.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAllOrderBy($query, $order, $direction = 'ASC')
    {
        return $query->orderBy($order,$direction)->get();
    }
	
	
    /**
    * Select of all data as array for select
    * 
	* @param string $nameforshow
    */
    public function scopeGetAllAsArrayForSelectWith($query, $nameforshow){
        
        return $query->get()->pluck($nameforshow,'id');
    }
}
