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
        });

        Schema::create('familie', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('lastname');
            $table->string('address');
        });

        Schema::create('leeftijdscategorie', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('lidsoort', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        Schema::create('familielid', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('familie_id')->constrained('familie')->onDelete('cascade');
            $table->foreignId('lidsoort_id')->nullable()->constrained('familie')->onDelete('set null');
            $table->string('firstname');
            $table->date('geboortedatum');
        });

        Schema::create('contributie', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('contributiebedrag');
            $table->foreignId('familielid_id')->nullable()->constrained('familie')->onDelete('set null');
            $table->foreignId('boekjaar_id')->constrained('boekjaar')->onDelete('cascade');
            $table->foreignId('lidsoort_id')->nullable()->constrained('lidsoort')->onDelete('set null');
            $table->foreignId('leeftijdscategorie_id')->nullable()->constrained('leeftijdscategorie')->onDelete('set null');
        });

    }


    public function down()
    {
        Schema::dropIfExists('boekjaar');
        Schema::dropIfExists('familie');
        Schema::dropIfExists('leeftijdscategorie');
        Schema::dropIfExists('lidsoort');
        Schema::dropIfExists('familielid');
        Schema::dropIfExists('contributie');
    }
}