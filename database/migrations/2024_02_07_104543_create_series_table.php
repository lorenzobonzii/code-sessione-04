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
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string("titolo", 255);
            $table->string("regia", 255);
            $table->integer("anno")->unsigned();
            $table->string("lingua", 255);
            $table->string("copertina", 255);
            $table->string("anteprima", 255);
            $table->string("trama", 10000);
            $table->unsignedBigInteger("nation_id");
            $table->foreign("nation_id")->references('id')->on('nations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('series');
    }
};
