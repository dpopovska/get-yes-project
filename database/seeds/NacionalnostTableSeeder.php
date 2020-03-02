<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NacionalnostTableSeeder extends Seeder
{
    /**
     * Run the database NACIONALNOST table seeds.
     *
     * @return void
     */
    public function run()
    {
    	$nacionalnosti = ['Македонец', 'Албанец', 'Турчин', 'Ром', 'Србин', 'Бошњак', 'Друго'];
    	foreach($nacionalnosti as $nacionalnost){
    		DB::table('nacionalnost')->insert([
    									'naziv' => $nacionalnost, 
    									'created_at' => Carbon::now()->toDateTimeString(), 
    									'updated_at' => Carbon::now()->toDateTimeString()
    								]);
    	}
        
    }
}
