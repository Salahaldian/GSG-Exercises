<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ClassroomsController extends Controller
{
    // Actions
    public function index(Request $request)
    {
        $classrooms = Classroom::orderBy('created_at' , 'DESC')->get(); // return Collection of Classroom (like array)
        // dd($classrooms);

        // echo $request->url();
        // return response : view , redirect , json-data , file , string
        // view() = View::make()

        return view('Classrooms.index', compact('classrooms'));

        // return view('Classrooms.index' , [
        //     'name' => 'Mohammed',
        //     'title' => 'Web Developer'
        // ]);
    }

    public function create()
    {
        // view() = View::make()
        return view('Classrooms.create');
        // or
        // return view()->make('Classrooms.create');
    }

    public function store(Request $request): RedirectResponse
    {
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
        $request->merge([
            'code' => Str::random(8),
        ]);
        $classroom = Classroom::create(  $request->all() );

        // $classroom = new Classroom(  $request->all() );
        // $classroom->save();
        // $classroom = new Classroom();
        // $classroom->fill(  $request->all() )->save();
        // $classroom->forceFill(  $request->all() )->save();

        // PRG : Post Redirect Get
        // helper function
        return redirect()->route('classrooms.index');
    }

    // عشان الريكوست من اللارافيل ف لازم دايما يكون في الاول
    public function show(string $id )
    {
        // $classroom = Classroom::where('id', '=', $id)->first();
        $classroom = Classroom::find($id);
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
    public function edit($id)
    {
        // لو موجود بروح عليه لو لا بطلع اله رسالة انه مش موجود
        $classroom = Classroom::findOrFail($id);
        // same as findOrFail
        // if(!$classroom){
        //     abort(404); // بترجع صفحة ايرور 404
        // }

        // view() = View::make() or return view()->make('Classrooms.create'); or
        return view('classrooms.edit', compact('classroom'));
    }

    public function update(Request $request, $id)
    {
        // Method 1
        $classroom = Classroom::find($id);
        // $classroom->name = $request->post('name');
        // $classroom->section = $request->post('section');
        // $classroom->subject = $request->post('subject');
        // $classroom->room = $request->post('room');
        // $classroom->save(); // update

        // Mass assignment
        $classroom->update( $request->all() );
        // $classroom->fill($request->all())->save();

        return Redirect::route('classrooms.index');
    }

    public function destroy($id)
    {
        Classroom::destroy($id); // return int (count the rows will be deleted)
        // or
        // Classroom::where('id', '=' , $id)->delete();
        // or
        // $classroom = Classroom::find($id);
        // $classroom->delete();

        return redirect( route('classrooms.index') );
    }
}
