<a {{ $attributes->merge([
    'class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-white bg-[#082567] hover:bg-blue-700 hover:text-white focus:outline-none focus:bg-blue-700 focus:text-white transition duration-150 ease-in-out']) }}>
    {{ $slot }}
</a>
