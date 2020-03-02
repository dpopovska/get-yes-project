<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StatusPodstatusStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusi = DB::table('status_student')->get();
        $podstatusi = DB::table('podstatus_student')->get();

    	  foreach($statusi as $status){

	    	  	foreach($podstatusi as $podstatus){

	    	  		DB::table('podstatus_student_status_student')->insert([
							  'status_student_id' => $status->id,
							  'podstatus_student_id' => $podstatus->id,
							  'created_at' => Carbon::now()->toDateTimeString(), 
							  'updated_at' => Carbon::now()->toDateTimeString()
	    			]);

	    	  	}    
    	  }
    }
}
