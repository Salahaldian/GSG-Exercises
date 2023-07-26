<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassroomsController;
use App\Http\Controllers\TopicsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
// Route for Classroom

/*
Route::get('/classrooms' , [ClassroomsController::class , 'index'])
    ->name('classrooms.index'); // بعطي اسم ل الراوت عشان اصير استخدمه في اي مكان تاني

Route::get('/classrooms/create' , [ClassroomsController::class , 'create'])
    ->name('classrooms.create');

Route::post('/classrooms', [ClassroomsController::class , 'store'])
    ->name('classrooms.store');

// عشان فيه براميتر اختياري بخليه في الاخر عشان لو كان بتشابه مع حد تاني
// بس عشان عملت شرط انه يكون رقم ف رح يبطل يتاثر لو كان قبل ال create
Route::get('/classrooms/{id}' , [ClassroomsController::class , 'show'])
    ->name('classrooms.show')
    ->where('id' , '\d+');
    //->where('edit','yse|no'); // Regular expression : \d -> one number , \d+ -> one or two  nubmer
    // ->where('classroom' , '.+') ; // Regular expression : \.+ -> any char
    // ->where('classroom' , '[0-9]+') ; // Regular expression : [0-9]+ -> from 0 to 9

Route::get('/classrooms/{id}/edit', [ClassroomsController::class , 'edit'])
    ->name('classrooms.edit')
    ->where([
        'id' => '\d+',
    ]);

Route::put('/classrooms/{id}', [ClassroomsController::class , 'update'])
    ->name('classrooms.update')
    ->where([
        'id' => '\d+',
    ]);

Route::delete('/classrooms/{id}', [ClassroomsController::class , 'destroy'])
    ->name('classrooms.destroy')
    ->where([
        'id' => '\d+',
    ]);
*/

// Method 2 for Route

// route -> استرجاع الكلاس المحذوف او حذفه نهائيا

// use group, mathode 1
// Route::group([
//     'middleware'=>['auth']
// ], function(){
//     // shared routes
// });

// use group, mathode 2
Route::middleware(['auth'])->group(function(){

    Route::prefix('/classrooms/trashed')
    ->as('classrooms.')
    ->controller(ClassroomsController::class)
    ->group(function(){

        Route::get('/','trashed')
            ->name('trashed');

        Route::put('/{id}','restore')
            ->name('restore');

        Route::delete('/{id}','forcedelete')
            ->name('force-delete');

    });

    Route::prefix('/topics/trashed')
    ->as('topics.')
    ->controller(TopicsController::class)
    ->group(function(){

        Route::get('/','trashed')
            ->name('trashed');

        Route::put('/{id}','restore')
            ->name('restore');

        Route::delete('/{id}','forcedelete')
            ->name('force-delete');

    });

});


// Route::middleware(['auth'])->group(function(){
    // Route::prefix('/topics/trashed')
    //     ->as('topics.')
    //     ->controller(TopicsController::class)
    //     ->group(function () {
    //         Route::get('/',  'trashed')->name('trashed');
    //         Route::put('/{topics}',  'restore')->name('restore');
    //         Route::delete('/{topics}',  'forceDelete')->name('force-delete');
    //     });
// });


// بعمل كل الراوت على حسب الكنترولر الي عندي لو استخدمت الديفلت اكشن
// الي هو رح يكون نفس الي فوق بالزبط
// Route Model Binding
Route::resource('/classrooms', ClassroomsController::class)
    ->names([
        // لو بدي اغير اسامي الراوت
        // 'index'=>'classrooms/index', // بدلت من . الى /
        // 'create'=> 'classrooms/create',
    ])->middleware('auth');
    // ->where([
    //     'id' => '\d+',
    // ]);

// or -> هان ما بقدر استخدم ال where ولا ال name
// Topic Route
Route::get('/topics' , [TopicsController::class , 'index'])
    ->name('topics.index') // بعطي اسم ل الراوت عشان اصير استخدمه في اي مكان تاني
    ->middleware('auth');

Route::get('/topics/create' , [TopicsController::class , 'create'])
    ->name('topics.create')
    ->middleware('auth');

Route::post('/topics', [TopicsController::class , 'store'])
    ->name('topics.store')
    ->middleware('auth');

// عشان فيه براميتر اختياري بخليه في الاخر عشان لو كان بتشابه مع حد تاني
// بس عشان عملت شرط انه يكون رقم ف رح يبطل يتاثر لو كان قبل ال create
Route::get('/topics/{id}' , [TopicsController::class , 'show'])
    ->name('topics.show')
    ->where('id' , '\d+')
    ->middleware('auth');
    //->where('edit','yse|no'); // Regular expression : \d -> one number , \d+ -> one or two  nubmer
    // ->where('topics' , '.+') ; // Regular expression : \.+ -> any char
    // ->where('topics' , '[0-9]+') ; // Regular expression : [0-9]+ -> from 0 to 9

Route::get('/topics/{id}/edit', [TopicsController::class , 'edit'])
    ->name('topics.edit')
    ->where([
        'id' => '\d+',
    ])->middleware('auth');

Route::put('/topics/{id}', [TopicsController::class , 'update'])
    ->name('topics.update')
    ->where([
        'id' => '\d+',
    ])->middleware('auth');

Route::delete('/topics/{id}', [TopicsController::class , 'destroy'])
    ->name('topics.destroy')
    ->where([
        'id' => '\d+',
    ])->middleware('auth');


