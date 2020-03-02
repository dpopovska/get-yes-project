<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OpstinaTableSeeder extends Seeder
{
    /**
     * Run the database OPSTINA table seeds.
     *
     * @return void
     */
    public function run()
    {
        $handle = fopen("public/database_data/all_regions.txt", "r");

		if ($handle) {

		    while (($line = trim(fgets($handle))) !== false) {

		    	$data = trim(preg_replace('/[\t\s]+/', " ", $line));

		    	$parts = explode(" ", $data);

		    	if(count($parts) > 0){
		    		$drzava = trim($parts[count($parts) - 1]);
		    		$maticen_broj = trim($parts[count($parts) - 2]);
		    		$naziv = trim(substr($line, 0, (strrpos($data, $maticen_broj) - 1)));

		    		 DB::table('opstina')->insert([
		        				'naziv' => $naziv, 
		        				'maticen_broj' => $maticen_broj, 
		        				'postenski_kod' => '',
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
