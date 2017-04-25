<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOfferWorkerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("job_offer_worker", function(Blueprint $table){
            $table->integer("job_offer_id")->unsigned();
            $table->integer("worker_id")->unsigned();

            $table->unique(["job_offer_id", "worker_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("job_offer_worker");
    }
}
