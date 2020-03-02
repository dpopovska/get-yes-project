<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NacinStudiranjeTableSeeder extends Seeder
{
    /**
     * Run the database NacinStudiranje table seeds.
     *
     * @return void
     */
    public function run()
    {
        $nacini = ['Редовен', 'Вонреден'];
    	foreach($nacini as $nacin){
    		DB::table('nacin_studiranje')->insert([
    									'naziv' => $nacin, 
    									'created_at' => Carbon::now()->toDateTimeString(), 
    									'updated_at' => Carbon::now()->toDateTimeString()
    								]);
    	}
    }
}
