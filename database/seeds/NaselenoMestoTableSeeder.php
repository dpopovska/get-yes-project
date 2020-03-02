<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class NaselenoMestoTableSeeder extends Seeder
{
    /**
     * Run the database NaselenoMesto table seeds.
     *
     * @return void
     */
    public function run()
    {
        $handle = fopen("public/database_data/all_subregions.txt", "r");

		if ($handle) {

		    while (($line = trim(fgets($handle))) !== false) {

		    	$data = trim(preg_replace('/[\t\s]+/', " ", $line));

		    	$parts = explode(" ", $data);

		    	if(count($parts) > 0){
		    		foreach ($parts as $part) { 
					    if (is_numeric($part) && strlen((string)$part) > 1) {
					        $maticen_broj = $part;
					        break;
					    } 
					}

		    		$naziv = trim(substr($line, 0, (strrpos($data, $maticen_broj) - 1)));
		    		$opstina = trim(substr($line, (strrpos($data, $maticen_broj) + strlen($maticen_broj))));

		    		$id_opstina = DB::table('opstina')->where('naziv', $opstina)->first();

		    		DB::table('naseleno_mesto')->insert([
		        				'naziv' => $naziv, 
		        				'maticen_broj' => $maticen_broj, 
		        				'opstina_id' => $id_opstina->id, 
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
