@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border p-2 px-3 border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-md shadow-sm'
]) !!}>
