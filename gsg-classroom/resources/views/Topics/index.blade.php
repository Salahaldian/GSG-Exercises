@include('partials.header')
    <div class="container">
        <h1>Topics</h1>

        <a href="{{ route('topics.create') }}" class="btn btn-primary px-3 my-2">Create <i class="fa-solid fa-plus"></i></a>
        <div class="row">
            @foreach ($topics as $topic)
                <div class="col-md-3">
                    {{ $topic->name }}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> {{ $topic->name }} </h5>
                            <a href=" {{ route('topics.show', $classroom->id) }} " class="btn btn-sm btn-primary">View</a>
                            <a href=" {{ route('topics.edit', $topic->id) }} " class="btn btn-sm btn-dark">Edit</a>
                            {{-- <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@include('partials.footer')
