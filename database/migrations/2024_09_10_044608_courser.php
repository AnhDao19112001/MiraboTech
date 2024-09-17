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
        Schema::create('descriptionCategory', function(Blueprint $table) {
            $table->id();
            $table->string('descriptionText');
            $table->timestamps();
        });

        Schema::create('category', function(Blueprint $table) {
            $table->id();
            $table->string('nameCategory');
            $table->text('descriptionName');
            $table->unsignedBigInteger('descriptionCategoryId');
            $table->foreign('descriptionCategoryId')->references('id')->on('descriptionCategory');
            $table->timestamps();
        });

        Schema::create('courser', function(Blueprint $table) {
            $table->id();
            $table->string('middlecategoryName');
            $table->string('courserClassification');
            $table->bigInteger('courserCode');
            $table->string('sourserNameKana');
            $table->string('sourserNameKana2');
            $table->string('subtitleOn');
            $table->string('subtitleBelow');
            $table->string('courseName');
            $table->string('newTaxonomy');
            $table->string('weeklyClassification1');
            $table->string('weeklyClassification2');
            $table->string('weeklyClassification3');
            $table->string('weeklyClassification4');
            $table->string('weeklyClassification5');
            $table->string('dateClassification');
            $table->string('room');
            $table->string('status');
            $table->string('learningInTheMiddle');
            $table->string('investigate');
            $table->string('items');
            $table->string('note');
            $table->string('abbreviate');
            $table->string('detail');
            $table->text('web');
            $table->dateTime('duration');
            $table->unsignedBigInteger('lecturerId');
            $table->foreign('lecturerId')->references('id')->on('leturer');
            $table->unsignedBigInteger('schoolId');
            $table->foreign('schoolId')->references('id')->on('school');
            $table->unsignedBigInteger('categoryId');
            $table->foreign('categoryId')->references('id')->on('category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descriptionCategory');
        Schema::dropIfExists('category');
        Schema::dropIfExists('courser');
    }
};
