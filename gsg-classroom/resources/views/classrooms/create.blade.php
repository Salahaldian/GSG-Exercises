@extends('layouts.master')

    @section('title', 'Create Classroom')
    @section('content')
    <div class="container">
        <h1>Create classroom</h1>

        {{-- لاظهار جميع المشاكل --}}
        <x-form.public-error class="alert-danger" />
        {{-- @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li> {{ $error }} </li>
            @endforeach
        </div>
        @endif --}}

        <form action="{{ route('classrooms.store') }}" method="post" enctype="multipart/form-data">
            {{-- same value , another way --}}
            {{-- كومنت ال html ما بوقف عمل كود ال php --}}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ csrf_field() }} --}}
            @csrf
            @include('classrooms._form',[
                "button_label"=>'Add new classroom'
            ])
        </form>
    </div>
    @endsection
