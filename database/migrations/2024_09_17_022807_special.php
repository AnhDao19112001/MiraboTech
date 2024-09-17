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
        Schema::create('special', function(Blueprint $table) {
            $table->id();
            $table->dateTime('timePublic');
            $table->string('title');
            $table->string('imageMV');
            $table->unsignedBigInteger('statusId');
            $table->foreign('statusId')->references('id')->on('status');
            $table->unsignedBigInteger('purposeId');
            $table->foreign('purposeId')->references('id')->on('purpose');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special');
    }
};
