<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeeftijdscategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leeftijdscategories', function (Blueprint $table) {
            $table->id();
            $table->string('omschrijving');
            $table->integer('ondergrens');
            $table->integer('bovengrens');
            $table->integer('kortingspercentage');
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
        Schema::dropIfExists('leeftijdscategories');
    }
}