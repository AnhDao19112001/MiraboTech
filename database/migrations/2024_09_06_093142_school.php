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
        Schema::create('school', function(Blueprint $table) {
            $table->id();
            $table->string('nameSchool');
            $table->text('imageLogo');
            $table->text('imageSchool');
            $table->text('messageSchool');
            $table->string('postalCode');
            $table->string('provinceCity');
            $table->string('localLevels');
            $table->string('access');
            $table->string('businessHours');
            $table->string('phone');
            $table->text('PDF');
            $table->timestamps();
        });

        Schema::create('urgent', function(Blueprint $table) {
            $table->id();
            $table->string('urgentStatus');
            $table->string('urgentText');
            $table->foreignId('schoolId')->constrained('school')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school');
        Schema::dropIfExists('urgent');
    }
};
