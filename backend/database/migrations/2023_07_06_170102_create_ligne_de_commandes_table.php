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
        Schema::create('ligne_de_commandes', function (Blueprint $table) {
            $table->id();
            $table->integer("qt");
            $table->double('prix_ligne_commande');
            $table->foreignId('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreignId('commande_id');
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
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
        Schema::dropIfExists('ligne_de_commandes');
    }
};
