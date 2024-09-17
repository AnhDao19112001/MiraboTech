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
        Schema::create('topic', function(Blueprint $table) {
            $table->id();
            $table->dateTime('timePublic');
            $table->string('title');
            $table->string('big_headlines');
            $table->string('subheadings');
            $table->text('main_text');
            $table->unsignedBigInteger('statusId');
            $table->foreign('statusId')->references('id')->on('status');
            $table->unsignedBigInteger('typeId');
            $table->foreign('typeId')->references('id')->on('categoryTopic');
            $table->unsignedBigInteger('schoolId');
            $table->foreign('schoolId')->references('id')->on('school');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic');
    }
};
