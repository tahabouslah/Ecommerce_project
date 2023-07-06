<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('adrs_email');
            $table->string('ville');
            $table->string('pays');
            $table->integer('code_postal');
            $table->string('num_tlf');
            $table->string('adresse');
            $table->double('prix__total');
            $table->foreignId('user_id');
            $table->foreign('user_id')->references("id")->on('users')->onDelete('cascade');
            $table->integer('status')->default('0'); //1 -> accepted  0-> in progress 2-> rejected 
            $table->integer('code_commande')->unique();
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
        Schema::dropIfExists('commandes');
    }
};
