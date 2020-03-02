<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SrednoUcilisteSeeder extends Seeder
{
    /**
     * Run the database SrednoUciliste table seeds.
     *
     * @return void
     */
    public function run()
    {
        $handle = fopen("public/database_data/all_schools.txt", "r");

		if ($handle) {

		    while (($line = trim(fgets($handle))) !== false) {

		    	$data = trim(preg_replace('/[\t\s]+/', " ", $line));

		    	$parts = explode(" ", $data);

		    	if(count($parts) > 0){
		    		$zemja = trim($parts[count($parts) - 1]);
	    			$naziv = trim(substr($line, 0, (strrpos($data, $zemja) - 1)));

		    		 DB::table('sredno_uciliste')->insert([
		        				'naziv' => $naziv, 
		        				'drzava_id' => 130, // Foreign key for MACEDONIA
		        				'created_at' => Carbon::now()->toDateTimeString(), 
		        				'updated_at' => Carbon::now()->toDateTimeString()
		        			]);
		    	}
		       
		    }

		    fclose($handle);
		} else {
		    // error opening the file.
		}
    }
}
