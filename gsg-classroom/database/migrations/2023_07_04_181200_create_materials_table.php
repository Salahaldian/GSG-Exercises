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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            $table->foreignId('class_id')
                ->constrained('classwork', 'id') // constrained -> عشان احدد من اي جدول ومن اي عمود
                ->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('file_url'); // رابط محتوى المادة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
