<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     *  ملاحظة : ممكن اعتبار جدول الاسئلة مع جدول التلسيمات بحيث
     * يمكن عمل جدول يحتوي على جميع التسليمات
     * ثم تقسيمها ل الكويزات و التكاليف و الاسئلة وغيرها
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classwork_id');
            $table->foreignId('classwork_id')
                ->constrained('classworks', 'id') // constrained -> عشان احدد من اي جدول ومن اي عمود
                ->cascadeOnDelete();
            $table->text('question_text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
