
@props(['type' => 'text', 'name'])
<input type="{{ $type }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'form-control']) }}>
