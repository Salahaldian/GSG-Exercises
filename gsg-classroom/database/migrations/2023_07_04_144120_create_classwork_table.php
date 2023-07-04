<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *  المهام الدراسية رح يكون فيها
     * id
     * class id
     * العنوان
     * الوصف
     * متى بنتهي
     */
    public function up(): void
    {
        Schema::create('classwork', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classroom_id');
            $table->foreignId('classroom_id')
                ->constrained('classroom', 'id') // constrained -> عشان احدد من اي جدول ومن اي عمود
                ->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->date('due_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classwork');
    }
};
