<?php
// php artisan route:list -> لمعرفة جميع الراوت المعرفة في المشروع

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

// Route::view('/' , 'welcome');
// or
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route for Classroom
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

// -----------------------------------------------------------

Route::get('/topics' , [TopicsController::class , 'index'])
    ->name('topics.index'); // بعطي اسم ل الراوت عشان اصير استخدمه في اي مكان تاني

Route::get('/topics/create' , [TopicsController::class , 'create'])
    ->name('topics.create');

Route::post('/topics', [TopicsController::class , 'store'])
    ->name('topics.store');

// عشان فيه براميتر اختياري بخليه في الاخر عشان لو كان بتشابه مع حد تاني
// بس عشان عملت شرط انه يكون رقم ف رح يبطل يتاثر لو كان قبل ال create
Route::get('/topics/{id}' , [TopicsController::class , 'show'])
    ->name('topics.show')
    ->where('id' , '\d+');
    //->where('edit','yse|no'); // Regular expression : \d -> one number , \d+ -> one or two  nubmer
    // ->where('topics' , '.+') ; // Regular expression : \.+ -> any char
    // ->where('topics' , '[0-9]+') ; // Regular expression : [0-9]+ -> from 0 to 9

Route::get('/topics/{id}/edit', [TopicsController::class , 'edit'])
    ->name('topics.edit')
    ->where([
        'id' => '\d+',
    ]);

Route::put('/topics/{id}', [TopicsController::class , 'update'])
    ->name('topics.update')
    ->where([
        'id' => '\d+',
    ]);

Route::delete('/topics/{id}', [TopicsController::class , 'destroy'])
    ->name('topics.destroy')
    ->where([
        'id' => '\d+',
    ]);

