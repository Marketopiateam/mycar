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
        Schema::create('motorcars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');

            $table->foreignId('modelcar_id')->nullable();
            $table->foreign('modelcar_id')->references('id')->on('modelcars')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motorcars');
    }
};
