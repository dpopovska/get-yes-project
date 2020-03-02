<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'subscriptions';
	
	use ScopeTrait;

    /**
	 * Fillable fields for the table: Subscriptions
	 * 
	 * @var array
	 */
    protected $fillable = ['email'];

}
