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
       Schema::create('visas', function (Blueprint $table) {
    $table->id();

    $table->string('nom');
    $table->string('telephone')->nullable();
    $table->string('email')->nullable();
    $table->string('ville')->nullable();

    $table->string('pays')->nullable();
    $table->string('objectif')->nullable();

    $table->string('date_ready')->nullable();
    $table->date('date_voyage')->nullable();

    $table->string('situation')->nullable();
    $table->string('salaire')->nullable();

    $table->string('banque')->nullable();
    $table->string('solde_banque')->nullable();

    $table->string('visa_avant')->nullable();
    $table->string('resultat_visa')->nullable();
    $table->string('pays_visa_precedente')->nullable();

    $table->string('budget')->nullable();    
    $table->dateTime('rdv')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visas');
    }
};
