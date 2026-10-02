<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_resources', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description');
            $table->string('academic_program');
            $table->string('subject');
            $table->string('topic');
            $table->string('year_level');
            $table->string('uploaded_by');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_resources');
    }
};
