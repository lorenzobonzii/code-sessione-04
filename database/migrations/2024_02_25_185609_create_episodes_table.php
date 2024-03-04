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
        Schema::create('episodes', function (Blueprint $table) {
            $table->id();
            $table->string("titolo", 255);
            $table->integer("ordine")->unsigned();
            $table->integer("durata")->unsigned();
            $table->string("copertina", 255);
            $table->string("descrizione", 10000);
            $table->unsignedBigInteger("season_id");
            $table->foreign("season_id")->references('id')->on('seasons');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('episodes');
    }
};
