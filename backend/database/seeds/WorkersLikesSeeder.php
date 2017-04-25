<?php

use Illuminate\Database\Seeder;

class WorkersLikesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Stores
        $fabrizio = App\Store::where([ ["name", "Fabrizio"], ["surname", "Daiquiri"] ])->first();
        $santa = App\Store::where([ ["name", "Santa"], ["surname", "Claus"] ])->first();

        // Workers
        $cerbiatto = App\Worker::where("name", "Cerbiatto")->first();
        $leprotto = App\Worker::where("name", "Leprotto")->first();
        $rudolph = App\Worker::where("name", "Rudolph")->first();
        // get all workers except the three above
        $randomWorkers = App\Worker::inRandomOrder()->whereNotIn("id", [$cerbiatto->id, $leprotto->id, $rudolph->id])->take(3)->get();

        // JobOffers
        $fashionJob = $fabrizio->jobOffers->first();
        $santaJob = $santa->jobOffers->first();
        $secondJob = $fabrizio->jobOffers->get(1);

        // build likes
        $fashionJob->workers()->save($cerbiatto);
        $fashionJob->workers()->save($leprotto);
        $santaJob->workers()->save($rudolph);
        $secondJob->workers()->attach($randomWorkers);
    }
}
