@props(['class' => 'alert alert-success', 'message'])

@if(session()->has($message))
    <div {{ $attributes->class(['alert' => !isset($class)])->merge(['class' => $class]) }}>
        {{ session($message) }}
    </div>
@endif
