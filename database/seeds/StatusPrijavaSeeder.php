<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StatusPrijavaSeeder extends Seeder
{
    /**
     * Run the database StatusPrijava table seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusi = ['Пријавен', 'Положен', 'Неположен', 'Поништен'];
    	foreach($statusi as $status){
    		DB::table('status_prijava')->insert([
    									'status' => $status, 
    									'created_at' => Carbon::now()->toDateTimeString(), 
    									'updated_at' => Carbon::now()->toDateTimeString()
    								]);
    	}
    }
}
