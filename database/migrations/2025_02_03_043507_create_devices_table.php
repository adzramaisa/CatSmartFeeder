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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('food_id')->nullable();
            $table->integer('status')->nullable();
            $table->enum('capacity', ['100gr', '200gr'])->nullable();
            $table->string('connections')->nullable();
            $table->boolean('connection_status')->default(0);
            $table->timestamp('latest_active')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
