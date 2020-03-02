<?php

	$handle = fopen("database_data/all_subregions.txt", "r");

		if ($handle) {

		    while (($line = trim(fgets($handle))) !== false) {

		    	$data = trim(preg_replace('/[\t\s]+/', " ", $line));

		    	$parts = explode(" ", $data);

		    	if(count($parts) > 0){
		    		foreach ($parts as $part) { 
					    if (is_numeric($part)) {
					        $maticen_broj = $part;
					        break;
					    } 
					}

		    		$naziv = trim(substr($line, 0, (strrpos($data, $maticen_broj) - 1)));
		    		$opstina = trim(substr($line, (strrpos($data, $maticen_broj) + strlen($maticen_broj))));

		    		// $id_opstina = DB::table('opstina')->where('naziv', $opstina)->get()->first();

		    		var_dump($naziv); echo "<br>";
		    		var_dump($opstina); echo "<br>";
		    		var_dump($opstina); echo "<br>";
		    		echo "<br>";

		    		 // DB::table('opstina')->insert([
		       //  				'naziv' => $naziv, 
		       //  				'maticen_broj' => $maticen_broj, 
		       //  				'postenski_kod' => '',
		       //  				'drzava_id' => 130, // Foreign key for MACEDONIA 
		       //  				'created_at' => Carbon::now()->toDateTimeString(), 
		       //  				'updated_at' => Carbon::now()->toDateTimeString()
		       //  			]);
		    	}
		    }

		     dd('1');

		    fclose($handle);
		} else {
		    // error opening the file.
		}

?>