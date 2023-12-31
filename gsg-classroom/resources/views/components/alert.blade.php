@props([
    'name'
])

{{-- @php
    $class = $name == 'error'? 'danger' : 'success';
@endphp --}}

@if(session()->has($name))
    <div {{
        $attributes->class(['alert'])
        ->merge([
            'id' => 'alert'
        ])
        }} >
        From Component: {{ session($name) }}
    </div>
@endif
