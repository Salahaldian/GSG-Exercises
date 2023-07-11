<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class TopicsController extends Controller
{
    //
    public function index(Request $request)
    {
        $topics = Topic::orderBy('id' , 'DESC')->get(); // return Collection of Classroom (like array)

        // echo $request->url();
        // return response : view , redirect , json-data , file , string
        // view() = View::make()

        return view('Topics.index', compact('topics'));
    }

    public function create()
    {
        // view() = View::make()
        return view('Topics.create');
        // or
        // return view()->make('Topics.create');
    }

    public function store(Request $request)
    {
        $topic = Topic::create([
            'name' => $request->input('name'),
            'classroom_id' => 1,
        ]);

        return redirect()->route('topics.index');
    }

    public function show($id)
    {
        $topic = Topic::findOrFail($id);
        return view('topics.show', compact('topic'));
    }

    public function edit($id)
    {
        $topic = Topic::findOrFail($id);
        return view('topics.edit', compact('topic'));
    }

    public function update(Request $request, $id)
    {

        $topic = Topic::findOrFail($id);

        $topic->update($request->all());

        return Redirect::route('topics.index');
    }

    public function destroy($id)
    {
        Topic::destroy($id);
        return redirect(route('topics.index'));
    }
}
