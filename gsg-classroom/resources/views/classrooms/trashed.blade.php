@extends('layouts.master')

    @section('title', 'Classrooms')
    @section('content')
    <div class="container">
        <h1>Classrooms</h1>

        <x-alert name ="success" id="success" class="alert-success" />
        <x-alert name ="error" id="error" class="alert-error" />
        {{-- or لو بدي اضيف محتوى زيادة--}}
        {{-- <x-alert></x-alert> --}}

        <div class="row">
            @foreach ($classrooms as $classroom)
                <div class="col-md-3">
                    {{ $classroom->name }}
                    {{-- <x-card :classroom="$classroom" /> --}}
                    <div class="card">
                        {{-- <img src="{{ asset('storage/' . $classroom->cover_image_path) }}" class="card-img-top" alt="..."> --}}
                        <img src="{{ Storage::disk('public')->url( $classroom->cover_image_path ) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $classroom->name }} </h5>
                            <p class="card-text"> {{ $classroom->section }} - {{ $classroom->subject }} </p>
                            <div class="d-flec justify-content-between">
                                <form action="{{ route('classrooms.restore', $classroom->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="btn btn-sm btn-success">Restore</button>
                                </form>
                                <form action="{{ route('classrooms.force-delete', $classroom->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete Forever</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endsection

{{--  to add in the stack --}}
@push('script')
    <script>console.log('1')</script>
@endpush
