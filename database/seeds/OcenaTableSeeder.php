<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OcenaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oceniArray = [ 5 => ['F',0.00,50.00], 6 => ['D',51.00,60.00], 7 => ['C',61.00,70.00], 8 => ['B',71.00,80.00], 9 => ['A',81.00,90.00], 10 => ['A+',91.00,100.00]];
		
		foreach ($oceniArray as $key => $ocena) {

			 DB::table('ocena')->insert([
				'ocena' => $key, 
				'ekts_ocena' => $ocena[0], 
				'min_bodovi' => $ocena[1],
				'max_bodovi' => $ocena[2],
				'created_at' => Carbon::now()->toDateTimeString(), 
				'updated_at' => Carbon::now()->toDateTimeString()
			]);
		}	
    }
}
