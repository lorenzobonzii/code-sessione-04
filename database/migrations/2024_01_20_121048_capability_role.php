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
        Schema::create('capability_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("capability_id");
            $table->unsignedBigInteger("role_id");
            $table->foreign("capability_id")->references('id')->on('capabilities')->onDelete("cascade");
            $table->foreign("role_id")->references('id')->on('roles')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capability_role');
    }
};
