@props(['name', 'value' => ''])
<textarea name="description" {{ $attributes->merge(['class' => 'form-control']) }}>
                               {{ $value  }}
                            </textarea>
