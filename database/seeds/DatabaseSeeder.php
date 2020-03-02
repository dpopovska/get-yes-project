<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Eloquent::unguard(); // temporarily disable the mass assignment protection of the model, so we can seed all model properties.

        // $this->call(NacionalnostTableSeeder::class);

        // $this->call(DrzavaTableSeeder::class);
         
        // $this->call(NacinStudiranjeTableSeeder::class);
         
        // $this->call(VidPredmetTableSeeder::class);
         
        // $this->call(StatusPrijavaSeeder::class);
        
        // $this->call(SrednoUcilisteSeeder::class);

        // $this->call(OpstinaTableSeeder::class);

        // $this->call(NaselenoMestoTableSeeder::class);
         
        // $this->call(StatusStudentSeeder::class);
         
        $this->call(PodstatusStudentSeeder::class);
         
        $this->call(StatusPodstatusStudentSeeder::class);

        Eloquent::reguard(); // opposite of Model::unguard();
    }
}
