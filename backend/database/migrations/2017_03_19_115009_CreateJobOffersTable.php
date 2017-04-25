<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("job_offers", function(Blueprint $table){
            $table->increments("id");
            $table->string("title");
            $table->text("description");
            $table->integer("store_id")->unsigned();
            $table->timestamps();
        });

        Schema::table("job_offers", function($table){
            $table->foreign("store_id")->references("id")->on("stores");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_offers');
    }
}
