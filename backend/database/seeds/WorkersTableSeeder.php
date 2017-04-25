<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {     
        // number of workers to create
        $totalWorkers = 10;

        // static workers, bause of... reasons
        $workers = [
          ["name" => "Cerbiatto", "surname" => "Delbosco", "email" => "cerbiatto@deejay.it"],
          ["name" => "Leprotto", "surname" => "Delbosco", "email" => "leprotto@deejay.it"],
          ["name" => "Rudolph", "surname" => "Reindeer", "email" => "rudolph@reindeers.com"]
        ];

        // sets the timestamps to now
        foreach ( $workers as &$worker ){
          $worker["created_at"] = $worker["updated_at"] = Carbon::now();
        }
        DB::table('workers')->insert($workers);

        // and let's create the others using factories
        if ( count($workers) < $totalWorkers ){
          factory(App\Worker::class, $totalWorkers - count($workers) )->create();
        }
    }
}
