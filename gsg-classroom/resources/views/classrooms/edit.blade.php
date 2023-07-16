@extends('layouts.master')

    @section('title', 'Edit Classroom ' . $classroom->name)
    @section('content')
    <div class="container">
        <h1>Create classroom</h1>
        <form action="{{ route('classrooms.update', $classroom->id) }}" method="post" enctype="multipart/form-data">
            {{-- same value , another way --}}
            {{-- كومنت ال html ما بوقف عمل كود ال php --}}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ csrf_field() }} --}}
            @csrf

            {{-- Form Method Sppofing --}}
            {{-- <input type="hidden" name="_method" value="put"> --}}
            {{-- {{ method_field('put') }} --}}
            @method('put')

            @include('classrooms._form',[
                "button_label"=>'Edit classroom'
            ])
        </form>
    </div>
    @endsection
