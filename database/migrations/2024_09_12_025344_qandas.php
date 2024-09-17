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
        Schema::create('qanda', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->text('answer')->nullable();
            $table->unsignedBigInteger('typeId');
            $table->foreign('typeId')->references('id')->on('categoryTopic');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qanda');
    }
};
