<div class="col-4 mb-3">
    <div class="card" style="width: 18rem;">
        @if ($classroom->cover_image_path)
            <img src="{{ asset('storage/app/public/' . $classroom->cover_image_path) }}"
                class="card-img-top" alt="Classroom Cover Image">
        @endif

        <div class="card-body">
            <h5 class="card-title">{{ $classroom->name }}</h5>
            <p class="card-text">{{ $classroom->section }}-{{ $classroom->room }}</p>

            <div class="text-center">
                <a href="{{ route('classrooms.show', $classroom->id) }}" class="btn btn-sm btn-primary">View</a>

                <a href="{{ route('classrooms.edit', $classroom->id) }}" class="btn btn-sm btn-dark">Update</a>

                <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="post" class="d-inline-block">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
