<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;


class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $topics = Topic::orderBy('name','DESC')->get();
        return view('topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('topics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' =>'required|max:250',]
        );
        $topic = new Topic();
        $topic->name = $request->post('name');
        $topic->classroom_id = 1;
        $topic->save();
        return redirect()->route('topics.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $topic = Topic::findOrFail($id);
        return view('topics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $topic = Topic::findOrFail($id);
        return view('topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $topic = Topic::findOrFail($id);
        $request->validate([
            'name' => [
                'required',
                'max:255',
                Rule::unique('topics')->ignore($topic->id),
            ],
        ]);
        $topic->update($request->all());
        return Redirect::route('topics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $topic = Topic::findOrFail($id);
        $topic->destroy($id);
        return redirect(route('topics.index'));
    }
}

