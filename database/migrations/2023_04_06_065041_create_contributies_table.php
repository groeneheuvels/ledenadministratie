<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContributiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contributies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lidsoort_id')->constrained()->onDelete('cascade');
            $table->foreignId('leeftijdscategorie_id')->constrained()->onDelete('cascade');
            $table->integer('contributiebedrag');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contributies');
    }
}