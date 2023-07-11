@include('partials.header')
    <div class="container">
        <h1>Create classroom</h1>
        <h1> {{ $classroom->name }} (#{{ $classroom->id }}) </h1>
        <h3> {{ $classroom->section }} </h3>

        <div class="row">
            <div class="col-md-3">
                <div class="border rounded p-3">
                    <
                    <span class="text-success fs-2"> {{ $classroom->code }} </span>
                </div>
            </div>
            <div class="col-md-9">
                <a href="{{ route('topics.create', ['classroom_id' => $classroom->id]) }}"
                    class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Topic
                </a>
            </div>
        </div>
    </div>
@include('partials.footer')
