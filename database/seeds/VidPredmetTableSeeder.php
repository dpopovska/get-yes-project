<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VidPredmetTableSeeder extends Seeder
{
    /**
     * Run the database VidPredmet table seeds.
     *
     * @return void
     */
    public function run()
    {
        $vidovi = ['Задолжителен', 'Факултетски', 'Универзитетски'];
    	foreach($vidovi as $vid){
    		DB::table('vid_predmet')->insert([
    									'vid' => $vid, 
    									'created_at' => Carbon::now()->toDateTimeString(), 
    									'updated_at' => Carbon::now()->toDateTimeString()
    								]);
    	}
    }
}
