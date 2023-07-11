<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'section' , 'subject', 'room', 'theme', 'cover_image_path', 'code'
    ];

    // مين الي ما بدي اعمل الها ارسال
    // لو عمل ادخال ل بيانات مش موجودة بالداتا بحاول يعمل الها اضافة ف عشان هيك ما بتكون امنة
    // protected $guarded = [];
}
