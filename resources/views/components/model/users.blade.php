@props([
    'crud' => 'r',
    'value' => [],
    'label' => true
])

@if (in_array($crud, ['u', 'u-password', 'u-r-password', 'd']))
    <input type="hidden" name="user_id" value="{{ $value->id??'' }}"/>

    @if (in_array($crud, ['u', 'u-password', 'u-r-password']))
        @if (in_array($crud, ['u']))
            <x-input type="email" id="email{{ $value->id??'' }}" name="email" class="input_primary" label="{{ ($label)?'Email':'' }}" value="{{ $value->email??'' }}"/>
        @endif

        @if (in_array($crud, ['u-password']))
            <x-input type="password" id="password_current{{ $value->id??'' }}" name="password_current" class="input_primary" label="{{ ($label)?'Current Password':'' }}"/>
        @endif

        @if (in_array($crud, ['u-password', 'u-r-password']))
            <x-input type="password" id="password_new{{ $value->id??'' }}" name="password_new" class="input_primary" label="{{ ($label)?'New Password':'' }}"/>
            <x-input type="password" id="password_confirmation{{ $value->id??'' }}" name="password_confirmation" class="input_primary" label="{{ ($label)?'Confirmation Password':'' }}"/>
        @endif
    @endif
@endif

@if (in_array($crud, ['c', 'r', 'r-login']))
    <x-input type="email" id="email" name="email" class="input_primary" label="{{ ($label)?'Email':'' }}" value="{{ $value->email??'' }}"/>

    @if (in_array($crud, ['c', 'r-login']))
        <x-input type="password" id="password" name="password" class="input_primary" label="{{ ($label)?'Password':'' }}"/>

        @if (in_array($crud, ['c']))
            <x-input type="password" id="password_confirmation" name="password_confirmation" class="input_primary" label="{{ ($label)?'Confirmation Password':'' }}"/>
        @endif
    @endif
@endif

