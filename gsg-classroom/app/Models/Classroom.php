<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Classroom extends Model
{
    use HasFactory;

    public static string $disk = 'public';

    protected $fillable = [
        'name', 'section' , 'subject', 'room', 'theme', 'cover_image_path', 'code'
    ];

    // عشان تبحث ع الكلاس من خلال الكود مش ال id
    public function getRouteKeyName()
    {
        // return 'code'; // الديفلت تعتها بتكون ال id
        return 'id';
    }

    public static function uploadeCoverImage($file)
    {
        $path = $file->store('/covers', [
            'disk' => static::$disk ,
        ]);
        return $path;
    }

    public static function deleteCoverImage($path)
    {
        return Storage::disk(Classroom::$disk)->delete($path);
    }

    // مين الي ما بدي اعمل الها ارسال
    // لو عمل ادخال ل بيانات مش موجودة بالداتا بحاول يعمل الها اضافة ف عشان هيك ما بتكون امنة
    // protected $guarded = [];
}
