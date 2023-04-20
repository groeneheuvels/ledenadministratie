<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedenadministratieTables extends Migration
{

    public function up()
    {
        Schema::create('boekjaar', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->year('jaartal');
            $table->integer('basiscontributie');
        });

        Schema::create('familie', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('lastname');
            $table->string('address');
            $table->string('postcode')->nullable();
            $table->string('city')->nullable();
        });


        Schema::create('leeftijdscategorie', function (Blueprint $table) {
            $table->id();
            $table->string('omschrijving');
            $table->integer('ondergrens');
            $table->integer('bovengrens');
            $table->integer('kortingspercentage');
            $table->timestamps();
        });

        Schema::create('lidsoort', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('omschrijving');
            $table->float('contributiefactor');
        });

        Schema::create('familielid', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('familie_id')->constrained('familie')->onDelete('cascade');
            $table->foreignId('lidsoort_id')->nullable()->constrained('lidsoort')->onDelete('set null');
            $table->string('firstname');
            $table->date('geboortedatum');
        });

        Schema::create('factuur', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('boekjaar_id')->nullable()->constrained('boekjaar')->onDelete('cascade');
            $table->foreignId('familie_id')->nullable()->constrained('familie')->onDelete('cascade');
            $table->boolean('betaald')->default(false);
            $table->integer('factuurbedrag')->nullable();
        });

        Schema::create('contributie', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('factuur_id')->nullable();
            $table->foreign('factuur_id')->references('id')->on('factuur')->onDelete('cascade');
            $table->integer('contributiebedrag');
            $table->foreignId('familielid_id')->nullable()->constrained('familielid')->onDelete('set null');
            $table->foreignId('boekjaar_id')->nullable()->constrained('boekjaar')->onDelete('cascade');
            $table->foreignId('lidsoort_id')->nullable()->constrained('lidsoort')->onDelete('set null');
            $table->foreignId('leeftijdscategorie_id')->nullable()->constrained('leeftijdscategorie')->onDelete('set null');
        });



    }


    public function down()
    {
        Schema::dropIfExists('contributie');
        Schema::dropIfExists('factuur');
        Schema::dropIfExists('familielid');
        Schema::dropIfExists('lidsoort');
        Schema::dropIfExists('leeftijdscategorie');
        Schema::dropIfExists('familie');

        Schema::dropIfExists('boekjaar');
    }
}