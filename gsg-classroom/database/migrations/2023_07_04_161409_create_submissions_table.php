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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classwork_id');
            $table->foreignId('classwork_id')
                ->constrained('classwork', 'id') // constrained -> عشان احدد من اي جدول ومن اي عمود
                ->cascadeOnDelete();
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')
                ->constrained('user', 'id') // constrained -> عشان احدد من اي جدول ومن اي عمود
                ->cascadeOnDelete();;
            $table->string('file_url'); // رابط التسليم
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
