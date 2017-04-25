<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // We don't use factories to create just 3 stores
        $stores = [
          ["name" => "Fabrizio", "surname" => "Daiquiri", "email" => "fabrizio.daiquiri@deejay.it"],
          ["name" => "Santa", "surname" => "Claus", "email" => "santa.claus@northpole.com"],
          ["name" => "Lapo", "surname" => "Elgatt", "email" => "info@lapoelgatt.com"]
        ];

        // sets the timestamps to now
        foreach ( $stores as &$store ){
          $store["created_at"] = $store["updated_at"] = Carbon::now();
        }

        DB::table('stores')->insert($stores);
    }
}
