@include('partials.header')
    <div class="container">
        <h1>Create Topic</h1>
        <form action="{{ route('topics.store') }}" method="post">
            {{-- same value , another way --}}
            {{-- كومنت ال html ما بوقف عمل كود ال php --}}
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ csrf_field() }} --}}
            @csrf

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" id="name" placeholder="Topic Name">
                <label for="name">Topic name</label>
            </div>
            <button type="submit" class="btn btn-primary">Create topic</button>
        </form>
    </div>
@include('partials.footer')
