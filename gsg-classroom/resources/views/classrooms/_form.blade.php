<x-form.flotaing-control name="name">
    <x-slot:label>
        <label for="name"> Classroom Name </label>
    </x-slot:label>
    <x-form.input name="name" class="form-control-lg" value="{{ $classroom->name }}" placeholder="Class Name" />
    {{-- in flotaing-control file
        <label for="name">Classroom name</label>
    <x-form.error name="name" /> --}}

    {{-- <input type="text" value="{{ old('name', $classroom->name) }}" @class(['form-control', 'is-invalid'=> $errors->has('name')]) name="name" id="name" placeholder="Class Name">
    <label for="name">Classroom name</label> --}}
    {{-- لاظهار المشاكل الخاصة بالانبت هاد لحاله --}}
    {{-- @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
</x-form.flotaing-control>

<x-form.flotaing-control name="section">
    <x-slot:label>
        <label for="section"> Section </label>
    </x-slot:label>
    <x-form.input name="section" value="{{ $classroom->section }}" placeholder="Section" />

    {{-- <label for="section">Section</label>
    <x-form.error name="section" /> --}}

    {{-- <input type="text" value="{{ old('section', $classroom->section) }}" @class(['form-control', 'is-invalid'=> $errors->has('section')]) " name="section" id="section" placeholder="Password">
    <label for="section">Section</label> --}}
    {{-- @error('section')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
</x-form.flotaing-control>

<x-form.flotaing-control name="subject">
    <x-slot:label>
        <label for="subject"> Subject </label>
    </x-slot:label>
    <x-form.input name="subject" value="{{ $classroom->subject }}" placeholder="Subject" />
    <label for="subject">Subject</label>
    <x-form.error name="subject" />

    {{-- <input type="text" value="{{ old('subject', $classroom->subject) }}" @class(['form-control', 'is-invalid'=> $errors->has('subject')]) name="subject" id="subject" placeholder="Class Name">
    <label for="subject">Subject</label> --}}
    {{-- @error('subject')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
</x-form.flotaing-control>

<x-form.flotaing-control name="room">
    <x-slot:label>
        <label for="room"> Room </label>
    </x-slot:label>
    <x-form.input name="room" value="{{ $classroom->room }}" placeholder="Room" />
    <label for="room">Room</label>
    <x-form.error name="room" />

    {{-- <input type="text" value="{{ old('room', $classroom->room) }}" @class(['form-control', 'is-invalid'=> $errors->has('room')]) name="room" id="room" placeholder="Password">
    <label for="room">Room</label> --}}
    {{-- @error('room')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
</x-form.flotaing-control>

<x-form.flotaing-control name="cover_image">
    @if($classroom->cover_image_path)
    <img src="{{ Storage::disk('public')->url($classroom->cover_image_path) }}" class="card-img-top" alt="">
    @endif
    <x-slot:label>
        <label for="cover_image"> Cover Image </label>
    </x-slot:label>
    <x-form.input type="file" name="cover_image" value="{{ $classroom->cover_image }}" placeholder="Cover Image" />
    <label for="cover_image">Cover Image</label>
    <x-form.error name="cover_image" />

    {{-- <input type="file" @class(['form-control', 'is-invalid'=> $errors->has('cover_image')]) name="cover_image" id="cover_image" placeholder="Password">
    <label for="cover_image">Cover Image</label> --}}
    {{-- @error('cover_image')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror --}}
</x-form.flotaing-control>
<button type="submit" class="btn btn-primary"> {{ $button_label }} </button>
