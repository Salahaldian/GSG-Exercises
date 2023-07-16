<div class="form-floating mb-3">
    <input type="text" value="{{ old('name', $classroom->name) }}" @class(['form-control', 'is-invalid'=> $errors->has('name')]) name="name" id="name" placeholder="Class Name">
    <label for="name">Class name</label>
    {{-- لاظهار المشاكل الخاصة بالانبت هاد لحاله --}}
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-floating mb-3">
    <input type="text" value="{{ old('section', $classroom->section) }}" @class(['form-control', 'is-invalid'=> $errors->has('section')]) " name="section" id="section" placeholder="Password">
    <label for="section">Section</label>
    @error('section')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-floating mb-3">
    <input type="text" value="{{ old('subject', $classroom->subject) }}" @class(['form-control', 'is-invalid'=> $errors->has('subject')]) name="subject" id="subject" placeholder="Class Name">
    <label for="subject">Subject</label>
    @error('subject')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-floating mb-3">
    <input type="text" value="{{ old('room', $classroom->room) }}" @class(['form-control', 'is-invalid'=> $errors->has('room')]) name="room" id="room" placeholder="Password">
    <label for="room">Room</label>
    @error('room')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="form-floating mb-3">
    @if($classroom->cover_image_path)
    <img src="{{ Storage::disk('public')->url($classroom->cover_image_path) }}" class="card-img-top" alt="">
    @endif
    <input type="file" @class(['form-control', 'is-invalid'=> $errors->has('cover_image')]) name="cover_image" id="cover_image" placeholder="Password">
    <label for="cover_image">Cover Image</label>
    @error('cover_image')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<button type="submit" class="btn btn-primary"> {{ $button_label }} </button>
