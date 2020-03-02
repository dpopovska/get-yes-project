<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PodstatusStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pod_statusi =  ['Активен', 'Во мирување', 'Неактивен', 'Испишан', 'Дипломиран'];

        foreach($pod_statusi as $pod_status){
            DB::table('podstatus_student')->insert([
                      'podstatus' => $pod_status,
                      'created_at' => Carbon::now()->toDateTimeString(), 
                      'updated_at' => Carbon::now()->toDateTimeString()
            ]);
        }   	
    }
}
