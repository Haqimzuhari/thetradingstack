@props([
    'crud' => 'r',
    'value' => [],
])

@if (in_array($crud, ['u', 'd']))
    <input type="hidden" name="profile_id" value="{{ $value->id??'' }}"/>
@endif

@if (in_array($crud, ['c', 'r', 'u']))
    <x-input id="fullname{{ $value->fullname??'' }}" name="fullname" class="input_primary" label="Name" value="{{ $value->fullname ?? '' }}"/>
    <x-input id="phone{{ $value->phone??'' }}" name="phone" class="input_primary" label="Phone" type="number" value="{{ $value->phone ?? '' }}"/>
@endif

