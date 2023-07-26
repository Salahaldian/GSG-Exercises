<?php

namespace App\Models;

use App\Models\Scopes\UserClassroomScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Classroom extends Model
{
    use HasFactory;
    use SoftDeletes;

    public static string $disk = 'public';

    protected $fillable = [
        'name', 'section' , 'subject', 'room', 'theme', 'cover_image_path', 'code' , 'user_id'
    ];

    // global scopes -> مش لازم استدعيها في الكنترولر عشان تطبق لانها جلوبل
    public static function booted()
    {
        // static::addGlobalScope('user', function(Builder $query){
        //     $query -> where('user_id','=', auth()->id());
        // });
        static::addGlobalScope(new UserClassroomScope);
    }

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
        if($path || Storage::disk(Classroom::$disk)->exists($path)){
            return Storage::disk(Classroom::$disk)->delete($path);
        }
    }

    // مين الي ما بدي اعمل الها ارسال
    // لو عمل ادخال ل بيانات مش موجودة بالداتا بحاول يعمل الها اضافة ف عشان هيك ما بتكون امنة
    // protected $guarded = [];

    // local scopes
    public function scopeActive(Builder $query)
    {
        $query->where('status','=', 'active');// is active means the class room
    }

    public function scopeRecent(Builder $query)
    {
        $query->orderBy('updated_at','DESC');
    }

    public function scopeStatus(Builder $query, $status = 'active')
    {
        $query->orderBy('status','=', $status);
    }
}
