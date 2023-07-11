@include('partials.header')
    <div class="container">
        <h1>Create classroom</h1>
        <form action="{{ route('classrooms.update', $classroom->id) }}" method="post">
            {{-- same value , another way --}}
            {{-- كومنت ال html ما بوقف عمل كود ال php --}}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ csrf_field() }} --}}
            @csrf

            {{-- Form Method Sppofing --}}
            {{-- <input type="hidden" name="_method" value="put"> --}}
            {{-- {{ method_field('put') }} --}}
            @method('put')

            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $classroom->name }}" name="name" id="name" placeholder="Class Name">
                <label for="name">Class name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $classroom->section }}" name="section" id="section" placeholder="Password">
                <label for="section">Section</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $classroom->subject }}" name="subject" id="subject" placeholder="Class Name">
                <label for="subject">Subject</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" value="{{ $classroom->room }}" name="room" id="room" placeholder="Password">
                <label for="room">Room</label>
            </div>
            <div class="form-floating mb-3">
                <input type="file" class="form-control" name="cover_image" id="cover_image" placeholder="Password">
                <label for="cover_image">Cover Image</label>
            </div>
            <button type="submit" class="btn btn-primary">Update Classroom</button>
        </form>
    </div>
@include('partials.footer')
