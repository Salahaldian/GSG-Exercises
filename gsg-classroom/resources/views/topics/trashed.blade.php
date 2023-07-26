@include('partials.header')

<div class="container">
    <h1> Trashed Topics</h1>
    @foreach ($topics as $topic)
        <div class="card mb-2">
            <div class="card-body d-flex justify-content-between">
                <div class="col-md-9">
                    {{ $topic->name }}
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <form action="{{ route('topics.restore', $topic->id) }}" method="post">
                            @csrf
                            @method('put')
                            <button class="btn btn-sm btn-success ">Restore</button>
                        </form>
                        <form action="{{ route('topics.force-delete', $topic->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger">Delete Forever</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@include('partials.footer')
