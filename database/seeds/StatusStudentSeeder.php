<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StatusStudentSeeder extends Seeder
{
    /**
     * Run the database StatusStudent table seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusi = ['Редовен', 'Апсолвент'];

    	  foreach($statusi as $status){
    		    DB::table('status_student')->insert([
    									'status' => $status,
    									'created_at' => Carbon::now()->toDateTimeString(), 
    									'updated_at' => Carbon::now()->toDateTimeString()
    						 ]);
    	}
    }
}
