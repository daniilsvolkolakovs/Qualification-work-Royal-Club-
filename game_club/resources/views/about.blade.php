<x-app-layout>
    <div class="py-12">
        <!-- About Us -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-20">
            <div class="text-center mb-12">
                <h2 class="text-center font-oswald text-[64px] font-normal text-white">{{ __('messages.about_us') }}</h2>
            </div>
            <div class="text-white flex flex-col lg:flex-row items-center lg:items-start p-8 gap-8">
                <div class=" flex justify-start items-center">
                <div class="w-[7px] h-dvh hidden lg:block" 
                    style="background: linear-gradient(to bottom, #4287FF, #1A326D);">
                </div>
                </div>
                <div class="lg:w-1/2 text-left">
                    <p class="text-[20px] font-lato font-normal mb-4">
                        {{ __('messages.about_us_intro') }}
                    </p>
                    <p class="text-[20px] font-lato font-normal mb-4">
                        {{ __('messages.about_us_technology') }}
                    </p>
                    <p class="text-[20px] font-lato font-normal">
                        {{ __('messages.about_us_environment') }}
                    </p>
                </div>
                <div class="lg:w-1/2 flex justify-end items-center">
                    <div class="max-w-[420px] max-h-[380px] bg-[#D9D9D9] rounded-3xl w-full h-[380px] md:w-[420px]">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
