@include('partials.header')
    <div class="container">
        <h1>Create Topic</h1>
        <form action="{{ route('topics.store') }}" method="POST">
            @csrf
            <div class="form-floating">
                <input type="text" class="form-control" name="name" id="name" placeholder="Topic Name">
                <label for="name">Topic Name</label>
            </div>
            <button type="submit" class="btn btn-success">Create Topic</button>
        </form>
    </div>
@include('partials.footer')
