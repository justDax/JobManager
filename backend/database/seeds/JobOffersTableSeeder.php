<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class JobOffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fabrizio = App\Store::where([ ["name", "Fabrizio"], ["surname", "Daiquiri"] ])->first();
        $santa = App\Store::where([ ["name", "Santa"], ["surname", "Claus"] ])->first();

        $offers = [
          ["title" => "Cercasi assistente fashion blogger", "description" => "Il grandissimo fashion blogger Fabrizio Daiquiri cerca uno schiavetto. Se sei interessato a fare esperienza nel campo della moda, questa è un opportunità più inica che rara. Impara dal migliore. #fabrizio #suninmilan #fashionblogger", "store_id" => $fabrizio->id ],
          ["title" => "Renna da slitta", "description" => "Cerco una renna da slitta per la notte del 24 daicembre. Hohohoho.", "store_id" => $santa->id ],
          ["title" => "Camerieri per aperisecret", "description" => "Il magnifico, splendido e sublime Fabrizio Daiquiri cerca 3 camerieri per organizzare il suo aperisecret. Non sai cos'è un aperisecret? Si tratta di un aperitivo segreto con password all'ingresso. Dress code giacca in paillette. #aperisecret #fabriziodaiquiri #fashion #nonricordolapassword", "store_id" => $fabrizio->id]
        ];

        // sets the timestamps to now
        foreach ( $offers as &$offer ){
          $offer["created_at"] = $offer["updated_at"] = Carbon::now();
        }


        DB::table('job_offers')->insert($offers);
    }
}
