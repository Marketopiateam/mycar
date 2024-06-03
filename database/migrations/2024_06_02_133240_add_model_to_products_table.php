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
        Schema::table('products', function (Blueprint $table) {
            $table->integer('model_id')->nullable();
            $table->foreign('model_id')->references('id')->on('modelcars')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('motor_id')->nullable();
            $table->foreign('motor_id')->references('id')->on('motorcars')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
