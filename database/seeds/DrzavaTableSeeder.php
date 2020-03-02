<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DrzavaTableSeeder extends Seeder
{
    /**
     * Run the database DRZAVA table seeds.
     *
     * @return void
     */
    public function run()
    {
        $handle = fopen("public/database_data/all_countries.txt", "r");

		if ($handle) {

		    while (($line = trim(fgets($handle))) !== false) {

		    	$data = trim(preg_replace('/[\t\s]+/', " ", $line));

		    	$parts = explode(" ", $data);

		    	if(count($parts) > 0){
		    		$broj = trim($parts[count($parts) - 1]);
		    		$kod = trim($parts[count($parts) - 2]);
		    		$naziv = trim(substr($line, 0, (strrpos($data, $kod) - 1)));

		    		 DB::table('drzava')->insert([
		        				'naziv' => $naziv, 
		        				'kod' => $kod, 
		        				'broj' => $broj, 
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
