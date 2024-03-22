<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('interventions', function (Blueprint $table) {
            $table->increments('Num');
            $table->unsignedInteger('client_id');
            $table->foreign('client_id')->references('Code')->on('clients')
            ->onDelete('cascade')
            ->onUpdate('cascade');            
            $table->enum('Materiels_garanties',['non','oui'])->default('non');
            $table->date('Date_intervention');
            $table->time('Heure_intervention');
            $table->integer('Duree_intervention');
            $table->integer('Deplacement');
            $table->text('Diagnostic');
            $table->text('Traveaux');
            $table->text('Remarque');
            $table->text('Signature')->nullable();
            $table->timestamps();
       });
       

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventions');


    }
};
