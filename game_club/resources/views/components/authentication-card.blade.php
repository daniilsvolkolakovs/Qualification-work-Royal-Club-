<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-image: url('{{ asset('image/background.png') }}'); background-size: 100%; background-position: top;">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-[#ffffffdd] shadow-md overflow-hidden sm:rounded-2xl">
        {{ $slot }}
    </div>
</div>
