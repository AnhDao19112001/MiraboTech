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
        Schema::create('news', function(Blueprint $table) {
            $table->id();
            $table->timestamp('time_public');
            $table->string('title');
            $table->string('big_headlines');
            $table->string('subheadings');
            $table->text('main_text');
            $table->text('block_image');
            $table->text('block_youtube');
            $table->text('list_block');
            $table->unsignedBigInteger('statusId');
            $table->foreign('statusId')->references('id')->on('status');
            $table->unsignedBigInteger('typeId');
            $table->foreign('typeId')->references('id')->on('categoryTopic');
            $table->unsignedBigInteger('users_id')->index()->nullable();
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
