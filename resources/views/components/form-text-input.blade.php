@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border border-mid-gray bg-mid-gray text-white',
]) !!}
    style="text-transform: none; border-bottom-color: #E6E6E6;">
