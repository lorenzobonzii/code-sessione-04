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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("role_id");
            $table->foreign("role_id")->references('id')->on('roles');
            $table->string('nome', 255);
            $table->string('cognome', 255);
            $table->unsignedTinyInteger('sesso');
            $table->string('cf', 16);
            $table->string('indirizzo', 255);
            $table->unsignedBigInteger("nation_id");
            $table->foreign("nation_id")->references('id')->on('nations');
            $table->unsignedBigInteger("municipality_id");
            $table->foreign("municipality_id")->references('id')->on('municipalities');
            $table->string('email', 255);
            $table->string('telefono', 255);
            $table->string('user', 255);
            $table->string('password', 255);
            $table->string('sale', 255)->nullable();
            $table->string('secret_jwt', 255)->nullable();
            $table->unsignedTinyInteger('stato')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
