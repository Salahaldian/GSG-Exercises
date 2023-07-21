<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomRequset;
use App\Models\Classroom;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ClassroomsController extends Controller
{
    // Actions
    public function index(Request $request)
    {
        $classrooms = Classroom::orderBy('created_at' , 'DESC')->get(); // return Collection of Classroom (like array)
        // dd($classrooms);

        // session(); // return session object
        $success = session('success'); // return value of success in the session
        // or
        // session()->get('success');
        // // or
        // Session::get('success');

        // Session::put('success', 'Whatever!'); // دائمة
        // Session::flash('success', 'Whatever!'); // بحذفها تلقائي بعد ما يخلص منها
        // // or
        // Session::remove('success'); // هان انا بحذفها ما بستنى لارافيل تحذفها

        // echo $request->url();
        // return response : view , redirect , json-data , file , string
        // view() = View::make()

        return view('Classrooms.index', compact('classrooms' , 'success'));

        // return view('Classrooms.index' , [
        //     'name' => 'Mohammed',
        //     'title' => 'Web Developer'
        // ]);
    }

    public function create()
    {
        // view() = View::make()
        return view('Classrooms.create',[
            'classroom' => new Classroom(),
        ]);
        // or
        // return view()->make('Classrooms.create');
    }

    public function store(ClassroomRequset $request): RedirectResponse
    {
        $validated = $request->validated();

        // echo $request->input('name'); // echo "<br>"; // echo $request->query('name'); // echo "<br>"; // echo $request->post('name');
        // echo "<br>"; // echo $request->get('name'); // echo "<br>"; // echo $request->name; // echo "<br>";
        // echo $request['name']; // echo "<br>"; // dd ($request->all( 'name' , 'section' )); // echo "<br>"; // dd ($request->except( 'name' , 'section' ));

        // Method 1
        // $classroom = new Classroom();
        // $classroom->name = $request->post ('name');
        // $classroom->section = $request->post ('section');
        // $classroom->subject = $request->post ('subject');
        // $classroom->room = $request->post ('room');
        // $classroom->code = Str::random(8);
        // $classroom->save(); // insert

        // Method 2 : Mass assignment
        /*
        $data = $request->all();
        $data['code'] = Str::random(8);
        $classroom = Classroom::create( $data );
        */
        // or

        if($request->hasFile('cover_image')){
            // $file = $request->cover_image;
            $file = $request->file('cover_image'); // return UploadedFile Object
            // $path = $file->store('/covers', 'uploads');
            $path = Classroom::uploadeCoverImage($file);
            $request->merge([
                'cover_image_path' => $path,
            ]);
        }

        // $request->merge([
        //     'code' => Str::random(8),
        // ]);


        // $classroom = Classroom::create(  $request->all() );

        // لو بدي استخدم ال validate عشان من خلالها امرر البيانات
        $validated['code'] = Str::random(8);
        $classroom = Classroom::create( $validated );

        // $classroom = new Classroom(  $request->all() );
        // $classroom->save();
        // $classroom = new Classroom();
        // $classroom->fill(  $request->all() )->save();
        // $classroom->forceFill(  $request->all() )->save();

        // PRG : Post Redirect Get
        // helper function
        return redirect()->route('classrooms.index')
            ->with('success', 'The class room has been successfully created.');;
    }

    // عشان الريكوست من اللارافيل ف لازم دايما يكون في الاول
    // public function show(string $id)
    // or
    public function show(Classroom $classroom)
    {
        // $classroom = Classroom::where('id', '=', $id)->first();
        // ببطل الها لازمة لو مررت ل الفنكشن كلاس المودل نفسه
        // $classroom = Classroom::find($id);
        return View::make('Classrooms.show')
            ->with(['classroom'=> $classroom]);

        // return view('Classrooms.show', [
        //     'id' => $id,
        // ]);
    }

    // public function edit(Request $request , $id)
    // {
        // view() = View::make()

        // $classroom = Classroom::find($id);
        // return view('Classrooms.edit' , [
        //     'id' => $id,
        // ]);
        // or
        // return view()->make('Classrooms.create');
    // }
    // public function edit($id)
    public function edit(Classroom $classroom)
    {
        // لو موجود بروح عليه لو لا بطلع اله رسالة انه مش موجود
        // $classroom = Classroom::findOrFail($id);

        // same as findOrFail
        // if(!$classroom){
        //     abort(404); // بترجع صفحة ايرور 404
        // }

        // view() = View::make() or return view()->make('Classrooms.create'); or
        return view('classrooms.edit', compact('classroom'));
    }

    // public function update(Request $request, $id)
    public function update(ClassroomRequset $request, Classroom $classroom)
    {
        $validated = $request->validated();
        // Method 1
        // $classroom = Classroom::find($id);

        // $classroom->name = $request->post('name');
        // $classroom->section = $request->post('section');
        // $classroom->subject = $request->post('subject');
        // $classroom->room = $request->post('room');
        // $classroom->save(); // update


        if($request->hasFile('cover_image')){
            // $file = $request->cover_image;
            $file = $request->file('cover_image'); // return UploadedFile Object
            // $path = $file->store('/covers', 'uploads');

            // Method 1 for update the photo
            // basename() بترجع الي اسم الملف بدون الباث تبعه
            // السطر التالي بحل مشكلة لو من الاصل ما كان عندي صورة ل الكلاس رووم
            $name = $classroom->cover_image_path ?? ( Str::random(40). '.' . $file->getClientOriginalExtension() );
            $path = $file->storeAs('/covers', basename($name), [
                'disk'=>Classroom::$disk ,
            ]);

            // Method 2
            $path = Classroom::uploadeCoverImage($file);

            $request->merge([
                'cover_image_path' => $path,
            ]);
            $validated['cover_image_path'] = $path;
        }

        // for Method 2
        // $old = $classroom->cover_image_path; // الصورة القديمة

        // Mass assignment / Method 2
        // $classroom->update( $request->all() );


        $classroom->update( $validated );
        // $classroom->fill($request->all())->save();

        // for Method 2
        // if($old && $old != $classroom->cover_image_path){
        //     Classroom::deleteCoverImage($old);
        //     Storage::disk('uploads')->delete($old); // ما بدي اياه
        // }

        // Session::flash('success','The class room has been successfully updated.');
        // Session::flash('error','Test for error message.');
        return Redirect::route('classrooms.index')
            ->with('success', 'The class room has been successfully updated.')
            ->with('error', 'Test for error message.');
    }

    public function destroy($id)
    // public function destroy(Classroom $classroom)
    {
        // Classroom::destroy($id); // return int (count the rows will be deleted)
        // Classroom::destroy($classroom->id);
        // or
        // Classroom::where('id', '=' , $id)->delete();
        // or
        $classroom = Classroom::find($id);
        $classroom->delete();

        // حذف الصورة إذا كانت موجودة
        Classroom::deleteCoverImage($classroom->cover_image_path);


        // Flash Messages -> ممكن تستخدم ك طريقة ل عرض رسائل النجاح
        // session()->flash('success_message','The class room has been successfully removed.');
        return redirect( route('classrooms.index') )
            ->with('success', 'The class room has been successfully removed.');
    }
}
