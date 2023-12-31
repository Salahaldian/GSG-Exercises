<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    // const CREATED_AT = 'created_at';

    // const UPDATED_AT = 'updated_at';

    // protected $connection = 'mysql';

    // protected $table = 'topics';

    // protected $priamryKey = 'id';

    // protected $keyType = 'int';

    // public $incrementing = true;

    public $timestamps = false;
}
