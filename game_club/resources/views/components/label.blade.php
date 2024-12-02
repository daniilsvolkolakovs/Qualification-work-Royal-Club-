@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-lg text-[#625E5E]']) }}>
    {{ $value ?? $slot }}
</label>
