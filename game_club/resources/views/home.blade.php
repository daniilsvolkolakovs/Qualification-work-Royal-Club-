<x-app-layout>
    <div class="py-12">
        <!-- Join Royal Arena Today! -->
        <div class="relative w-full mb-4">
            <div class="absolute inset-0 bg-cover bg-center">
                <img 
                    src="{{ asset('image/banner.png') }}" 
                    alt="Background Image" 
                    class="w-full h-full object-cover object-center"
                />
            </div>
            <div class="relative z-10 max-w-7xl mx-auto sm:px-6 lg:px-8 text-white flex flex-col justify-center items-center gap-4 px-8 py-20">

                <h2 class="text-[32px] md:text-[64px] sm:text-[48px] font-oswald font-normal text-white text-center leading-tight mb-6">
                    {{ __('messages.join_royal_arena') }}
                </h2>

                <h3 class="text-[20px] md:text-[40px] sm:text-[20px] font-oswald font-normal text-white text-center sm:mb-2 md:mb-10">
                    {{ __('messages.productive_workspace_title') }}
                </h3>

                <div class="flex flex-col sm:flex-row w-full justify-around gap-4 mb-8">
                    <a href="{{ route('services') }}" class="flex justify-center items-center py-2 px-6 bg-[#2E69A9] rounded-full text-white sm:text-xs md:text-lg hover:bg-blue-600 w-full sm:w-[215px] text-center">
                        {{ __('messages.reserve_a_computer') }}
                    </a>
                    
                    <a href="#download" class="flex justify-center items-center py-2 px-6 border-2 border-[#A4C5FF] rounded-full text-white sm:text-xs md:text-lg hover:border-[#4287FF] hover:text-white w-full sm:w-[215px] text-center">
                        {{ __('messages.download_app') }}
                    </a>

                    <a href="#prices" class="flex justify-center items-center py-2 px-6 bg-[#2E69A9] rounded-full text-white sm:text-xs md:text-lg hover:bg-blue-600 w-full sm:w-[215px] text-center">
                        {{ __('messages.price') }}
                    </a>
                </div>

            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-20 flex justify-center">
            <div class="text-center mb-16 sm:mb-12">
                <p class="md:text-[20px] sm:text-[12px] p-4 font-lato text-white text-center">
                    {{ __('messages.productive_workspace_description') }}
                </p>
            </div>
        </div>
        <!-- How It Works? -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-40">
            <div class="text-center mb-16 sm:mb-12">
                <h3 class="text-2xl md:text-[44px] font-oswald font-normal text-white leading-tight">
                    {{ __('messages.how_it_works') }}
                </h3>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="border-[2px] border-[#4287FF] rounded-3xl p-2 md:p-6 ">
                    <div class="flex items-center mb-4 sm:mb-2">
                        <div class="w-12 h-12 md:w-32 md:h-32 bg-[#D9D9D9] rounded-full flex-shrink-0"></div>
                        <h4 class="ml-4 text-[18px] sm:text-[24px] md:text-[32px] font-oswald font-semibold text-white lg:p-4">
                            {{ __('messages.choose_your_setup') }}
                        </h4>
                    </div>
                    <p class="text-[12px] md:text-[20px] font-lato text-white p-4 lg:p-8">
                        {{ __('messages.choose_your_setup_text') }}
                    </p>
                </div>

                <div class="border-[2px] border-[#4287FF] rounded-3xl p-2 md:p-6 ">
                    <div class="flex items-center mb-4 sm:mb-2">
                        <div class="w-12 h-12 md:w-32 md:h-32 bg-[#D9D9D9] rounded-full flex-shrink-0"></div>
                        <h4 class="ml-4 text-[18px] sm:text-[24px] md:text-[32px] font-oswald font-semibold text-white lg:p-4">
                            {{ __('messages.reserve_your_spot') }}
                        </h4>
                    </div>
                    <p class="text-[12px] md:text-[20px] font-lato text-white p-4 lg:p-8">
                        {{ __('messages.reserve_your_spot_text') }}
                    </p>
                </div>

                <div class="border-[2px] border-[#4287FF] rounded-3xl p-2 md:p-6 ">
                    <div class="flex items-center mb-4 sm:mb-2">
                        <div class="w-12 h-12 md:w-32 md:h-32 bg-[#D9D9D9] rounded-full flex-shrink-0"></div>
                        <h4 class="ml-4 text-[18px] sm:text-[24px] md:text-[32px] font-oswald font-semibold text-white lg:p-4">
                            {{ __('messages.enjoy_your_time') }}
                        </h4>
                    </div>
                    <p class="text-[12px] md:text-[20px] font-lato text-white p-4 lg:p-8">
                        {{ __('messages.enjoy_your_time_text') }}
                    </p>
                </div>
            </div>
        </div>
        <!-- Happy Hours -->
        <div class="relative w-full h-[370px] md:h-[350px] lg:h-[350px] overflow-hidden mb-20">
            <div class="absolute inset-0 w-full h-full">
                <img 
                    src="{{ asset('image/pexels-heyho-6636287 1.png') }}" 
                    alt="Background Image" 
                    class="w-full h-full object-cover object-center"
                />
            </div>

            <div class="relative z-10 flex flex-col lg:flex-row justify-between items-center lg:items-start max-w-7xl mx-auto px-6 lg:px-8 h-full p-0">
                <div class="flex flex-col justify-start lg:w-2/3 text-white h-full">
                    <div class="flex items-start gap-4 mt-2 lg:mt-4">
                        <div class="bg-white w-[7px] h-[120px] mt-2"></div>
                        <div>
                            <h3 class="text-[26px] md:text-[48px] lg:text-[52px] font-oswald font-normal text-[#4287ff] leading-tight mb-1">
                                {{ __('messages.happy_hours_title') }}
                            </h3>
                            <h3 class="text-[26px] md:text-[48px] lg:text-[52px] font-oswald font-normal text-white leading-tight">
                                {{ __('messages.happy_hours_subtitle') }}
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="flex items-end lg:justify-end lg:w-1/3 h-full mb-2 sm:pt-10">
                    <p class="text-white text-[12px] md:text-[18px] font-normal max-w-[180px] md:max-w-[370px] ml-8 mb-4">
                        {{ __('messages.start_your_day') }}
                    </p>
                </div>
            </div>
        </div>
        <!-- About Us -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-20">
            <div class="text-center mb-2 md:mb-12">
                <h2 class="text-center font-oswald text-[40px] md:text-[64px] font-normal text-white">{{ __('messages.about_us') }}</h2>
            </div>
            <div class="text-white flex flex-col lg:flex-row items-center lg:items-start p-8 gap-8">
                <div class=" flex justify-start items-center">
                <div class="w-[7px] h-dvh hidden lg:block" 
                    style="background: linear-gradient(to bottom, #4287FF, #1A326D);">
                </div>
                </div>
                <div class="lg:w-1/2 text-left">
                    <p class="text-[12px] md:text-[20px] font-lato font-normal mb-4">
                        {{ __('messages.about_us_intro') }}
                    </p>
                    <p class="text-[12px] md:text-[20px] font-lato font-normal mb-4">
                        {{ __('messages.about_us_technology') }}
                    </p>
                    <p class="text-[12px] md:text-[20px] font-lato font-normal">
                        {{ __('messages.about_us_environment') }}
                    </p>
                </div>
                <div class="lg:w-1/2 flex justify-end items-center">
                    <div class="max-w-[420px] max-h-[380px] bg-[#D9D9D9] rounded-3xl w-full h-[380px] md:w-[420px]">
                    </div>
                </div>
            </div>
        </div>
        <!-- Why Choose Us? -->
        <div class="max-w-7xl mb-20 mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-center font-oswald text-[40px] md:text-[64px] font-normal text-white">{{ __('messages.why_choose_us') }}</h2>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-[#08256780] text-white rounded-xl shadow-lg p-6 relative"
                    style="box-shadow: 10px 10px 0px #301122;">
                    <div class="w-16 h-16 md:w-28 md:h-28 mb-4 bg-white rounded-full flex items-center justify-center">
                        <span class="block w-8 h-8"></span>
                    </div>
                    <h3 class="font-oswald text-[12px] md:text-[26px] font-normal mb-4 text-left">
                        {{ __('messages.simple_and_quick_reservation') }}
                    </h3>
                    <p class="text-[9px] md:text-[18px] font-lato font-normal text-left">
                        {{ __('messages.simple_and_quick_reservation_text') }}
                    </p>
                </div>

                <div class="bg-[#D9D9D936] text-white rounded-xl shadow-lg p-6 relative"
                    style="box-shadow: 10px 10px 4px #301122;">
                    <div class="w-16 h-16 md:w-28 md:h-28 mb-4 bg-white rounded-full flex items-center justify-center">
                        <span class="block w-8 h-8"></span>
                    </div>
                    <h3 class="font-oswald text-[12px] md:text-[26px] font-normal mb-4 text-left">
                        {{ __('messages.high_performance_equipment') }}
                    </h3>
                    <p class="text-[9px] md:text-[18px] font-lato font-normal text-left">
                        {{ __('messages.high_performance_equipment_text') }}
                    </p>
                </div>

                <div class="bg-[#08256780] text-white rounded-xl shadow-lg p-6 relative"
                    style="box-shadow: 10px 10px 4px #301122;">
                    <div class="w-16 h-16 md:w-28 md:h-28 mb-4 bg-white rounded-full flex items-center justify-center">
                        <span class="block w-8 h-8"></span>
                    </div>
                    <h3 class="font-oswald text-[12px] md:text-[26px] font-normal mb-4 text-left">
                        {{ __('messages.flexible_reservation_options') }}
                    </h3>
                    <p class="text-[9px] md:text-[18px] font-lato font-normal text-left">
                        {{ __('messages.flexible_reservation_options_text') }}
                    </p>
                </div>

                <div class="bg-[#D9D9D936] text-white rounded-xl shadow-lg p-6 relative"
                    style="box-shadow: 10px 10px 4px #301122;">
                    <div class="w-16 h-16 md:w-28 md:h-28 mb-4 bg-white rounded-full flex items-center justify-center">
                        <span class="block w-8 h-8"></span>
                    </div>
                    <h3 class="font-oswald text-[12px] md:text-[26px font-normal mb-4 text-left">
                        {{ __('messages.professional_environment') }}
                    </h3>
                    <p class="text-[9px] md:text-[18px] font-lato font-normal text-left">
                        {{ __('messages.professional_environment_text') }}
                    </p>
                </div>
            </div>

            <div class="text-center mt-12">
                <x-button class="py-3 px-6">
                    <a href="{{ route('services') }}">{{ __('messages.reserve_a_computer') }}</a>
                </x-button>
            </div>
        </div>
        <!-- Our Equipment -->
        <div class="max-w-8xl mb-20 mx-auto sm:px-6 lg:px-8">
            <div class="text-white overflow-hidden sm:rounded-lg">

                <h2 class="text-center font-oswald text-[40px] md:text-[64px] font-normal text-white">
                    {{ __('messages.our_equipment') }}
                </h2>
                <h3 class="text-center font-oswald text-[22px] md:text-[40px] font-normal text-white ">
                        {{ __('messages.high_performance') }}
                </h3>
                <p class="text-center text-[12px] md:text-[20px] overflow-hidden mb-10 mt-2 mx-auto p-2 md:w-[650px]">
                    {{ __('messages.explore_our') }}
                </p>
                <div class="swiper-wrapper-container">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="bg-gray-300 aspect-square mb-6 rounded-3xl"></div>
                                <div class="slide-content">
                                    <h3 class="mb-2 md:mb-8 text-[#A4C5FF] text-[16px] md:text-[24px] font-bold">Professional Workstations for Design and Modeling</h3>
                                    <p class="text-[10px] md:text-[18px]">Processor: Intel Xeon / AMD Ryzen Threadripper<br>
                                    Graphics Card: NVIDIA Quadro RTX 5000 / GeForce RTX 3080<br>
                                    RAM: 64GB DDR4<br>
                                    Storage: 2TB NVMe SSD<br>
                                    Display: 32-inch, 4K monitor<br>
                                    Ideal for: Graphic design, 3D modeling, animation</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="bg-gray-300 aspect-square mb-6 rounded-3xl"></div>
                                <div class="slide-content">
                                    <h3 class="mb-2 md:mb-8 text-[#A4C5FF] text-[16px] md:text-[24px] font-bold">Professional Workstations for Design and Modeling</h3>
                                    <p class="text-[10px] md:text-[18px]">Processor: Intel Xeon / AMD Ryzen Threadripper<br>
                                    Graphics Card: NVIDIA Quadro RTX 5000 / GeForce RTX 3080<br>
                                    RAM: 64GB DDR4<br>
                                    Storage: 2TB NVMe SSD<br>
                                    Display: 32-inch, 4K monitor<br>
                                    Ideal for: Graphic design, 3D modeling, animation</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="bg-gray-300 aspect-square mb-6 rounded-3xl"></div>
                                <div class="slide-content">
                                    <h3 class="mb-2 md:mb-8 text-[#A4C5FF] text-[16px] md:text-[24px] font-bold">Gaming and High-Performance Setups</h3>
                                    <p class="text-[10px] md:text-[18px]">Processor: Intel Core i9 / AMD Ryzen 9<br>
                                    Graphics Card: NVIDIA GeForce RTX 3090 / AMD Radeon RX 6900 XT<br>
                                    RAM: 32GB DDR4<br>
                                    Storage: 1TB NVMe SSD + 2TB HDD<br>
                                    Display: 27-inch, 144Hz, 4K monitor<br>
                                    Ideal for: Gaming, graphic-intensive work, video editing</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="bg-gray-300 aspect-square mb-6 rounded-3xl"></div>
                                <div class="slide-content">
                                    <h3 class="mb-2 md:mb-8 text-[#A4C5FF] text-[16px] md:text-[24px] font-bold">Gaming and High-Performance Setups</h3>
                                    <p class="text-[10px] md:text-[18px]">Processor: Intel Core i9 / AMD Ryzen 9<br>
                                    Graphics Card: NVIDIA GeForce RTX 3090 / AMD Radeon RX 6900 XT<br>
                                    RAM: 32GB DDR4<br>
                                    Storage: 1TB NVMe SSD + 2TB HDD<br>
                                    Display: 27-inch, 144Hz, 4K monitor<br>
                                    Ideal for: Gaming, graphic-intensive work, video editing</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="bg-gray-300 aspect-square mb-6 rounded-3xl"></div>
                                <div class="slide-content">
                                    <h3 class="mb-2 md:mb-8 text-[#A4C5FF] text-[16px] md:text-[24px] font-bold">Standard Workstations for Office</h3>
                                    <p class="text-[10px] md:text-[18px]">Processor: Intel Core i7 / AMD Ryzen 7<br>
                                    RAM: 16GB DDR4<br>
                                    Storage: 512GB SSD<br>
                                    Display: 24-inch, Full HD monitor<br>
                                    Ideal for: Office work, programming, data analysis</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="bg-gray-300 aspect-square mb-6 rounded-3xl"></div>
                                <div class="slide-content">
                                    <h3 class="mb-2 md:mb-8 text-[#A4C5FF] text-[16px] md:text-[24px] font-bold">Standard Workstations for Office</h3>
                                    <p class="text-[10px] md:text-[18px]">Processor: Intel Core i7 / AMD Ryzen 7<br>
                                    RAM: 16GB DDR4<br>
                                    Storage: 512GB SSD<br>
                                    Display: 24-inch, Full HD monitor<br>
                                    Ideal for: Office work, programming, data analysis</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="bg-gray-300 aspect-square mb-6 rounded-3xl"></div>
                                <div class="slide-content">
                                    <h3 class="mb-2 md:mb-8 text-[#A4C5FF] text-[16px] md:text-[24px] font-bold">Gaming and High-Performance Setups</h3>
                                    <p class="text-[10px] md:text-[18px]">Processor: Intel Core i9 / AMD Ryzen 9<br>
                                    Graphics Card: NVIDIA GeForce RTX 3090 / AMD Radeon RX 6900 XT<br>
                                    RAM: 32GB DDR4<br>
                                    Storage: 1TB NVMe SSD + 2TB HDD<br>
                                    Display: 27-inch, 144Hz, 4K monitor<br>
                                    Ideal for: Gaming, graphic-intensive work, video editing</p>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="bg-gray-300 aspect-square mb-6 rounded-3xl"></div>
                                <div class="slide-content">
                                    <h3 class="mb-2 md:mb-8 text-[#A4C5FF] text-[16px] md:text-[24px] font-bold">Gaming and High-Performance Setups</h3>
                                    <p class="text-[10px] md:text-[18px]">Processor: Intel Core i9 / AMD Ryzen 9<br>
                                    Graphics Card: NVIDIA GeForce RTX 3090 / AMD Radeon RX 6900 XT<br>
                                    RAM: 32GB DDR4<br>
                                    Storage: 1TB NVMe SSD + 2TB HDD<br>
                                    Display: 27-inch, 144Hz, 4K monitor<br>
                                    Ideal for: Gaming, graphic-intensive work, video editing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
        <!-- Gallery -->
        <div class="max-w-7xl mb-20 mx-auto sm:px-6 lg:px-8">

            <h2 class="text-center font-oswald text-[40px] md:text-[64px] font-normal text-white mb-12 md:mb-20">
                {{ __('messages.gallery') }}
            </h2>

                <div class="grid sm:grid-cols-[1fr,1fr,auto,1fr,1fr] grid-cols-2 gap-4 relative p-4">
                <div class="space-y-4">
                    <div class="bg-gray-300 aspect-square"></div>
                    <div class="bg-gray-300 aspect-square"></div>
                    <div class="bg-gray-300 aspect-square"></div>
                    <div class="bg-gray-300 aspect-square"></div>
                </div>
                <div class="space-y-4 space-y-4 hidden sm:block">
                    <div class="bg-gray-300 aspect-square"></div>
                    <div class="bg-gray-300 aspect-square"></div>
                    <div class="bg-gray-300 aspect-square"></div>
                    <div class="bg-gray-300 aspect-square"></div>
                </div>
                <div class="flex justify-center items-center hidden sm:flex">
                    <p class="text-white font-oswald sm:text-[8px] md:text-[30px] lg:text-[40px] font-normal [writing-mode:vertical-lr]">
                        {{ __('messages.gallery_text') }}
                    </p>
                </div>
                <div class="space-y-4 hidden sm:block">
                    <div class="bg-gray-300 aspect-square"></div>
                    <div class="bg-gray-300 aspect-square"></div>
                    <div class="bg-gray-300 aspect-square"></div>
                    <div class="bg-gray-300 aspect-square"></div>
                </div>
                <div class="space-y-4">
                    <div class="bg-gray-300 aspect-square"></div>
                    <div class="bg-gray-300 aspect-square"></div>
                    <div class="bg-gray-300 aspect-square"></div>
                    <div class="bg-gray-300 aspect-square"></div>
                </div>
            </div>
        </div>
        <!-- Our Services -->        
        <div class="max-w-7xl mb-20 mx-auto sm:px-6 lg:px-8 mt-20">
            <div class="text-white overflow-hidden p-8">
                <h2 class="text-center font-oswald text-[40px] md:text-[64px] font-normal text-white mb-2 decoration-0">
                    {{ __('messages.our_services') }}
                </h2>
                <h3 class="text-center font-oswald text-[22px] md:text-[40px] text-white mb-12 md:mb-24">
                    {{ __('messages.computer_rental') }}
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 place-items-center">

                    <div class="bg-[#DCE9FF] text-blue-900 rounded-3xl p-6 flex flex-col items-center shadow-lg max-w-[320px] md:max-w-full">
                        <h3 class="font-oswald text-[36px] md:text-[48px] font-normal mb-4 self-start">{{ __('messages.room_rental') }}</h3>
                        <ul class="text-xs md:text-lg list-disc list-inside text-left mb-4">
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                        </ul>
                        <p class="font-oswald text-[36px] md:text-[48px] font-normal mb-4 text-right">35€/hour</p>
                        <button class="bg-[#082567] text-[#DCE9FF] px-20 md:px-10 lg:px-20 py-2 font-oswald text-[16px] md:text-[24px] font-extrabold hover:bg-blue-800 rounded-full">
                            <a href="{{ route('services') }}">{{ __('messages.buy_plan') }}</a>
                        </button>
                    </div>

                    <div class="bg-[linear-gradient(204.47deg,_rgba(246,_32,_135,_0.6)_2.56%,_#082567_44.37%)] text-white rounded-3xl p-6 flex flex-col items-center shadow-lg max-w-[320px] md:max-w-full">
                        <h3 class="font-oswald text-[36px] md:text-[48px] font-normal mb-4 self-start">{{ __('messages.computer_rental') }}</h3>
                        <ul class="text-xs md:text-lg list-disc list-inside text-left mb-4">
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                        </ul>
                        <p class="font-oswald text-[36px] md:text-[48px] font-normal mb-4 text-right">35€/hour</p>
                        <button class="bg-[#DCE9FF] text-blue-900 px-20 md:px-10 lg:px-20 py-2 font-oswald text-[16px] md:text-[24px] font-extrabold hover:bg-white rounded-full">
                            <a href="{{ route('services') }}">{{ __('messages.buy_plan') }}</a>
                        </button>
                    </div>

                    <div class="bg-[#DCE9FF] text-blue-900 rounded-3xl p-6 flex flex-col items-center shadow-lg max-w-[320px] md:max-w-full">
                        <h3 class="font-oswald text-[36px] md:text-[48px] font-normal mb-4 self-start">{{ __('messages.boot_camp') }}</h3>
                        <ul class="text-xs md:text-lg list-disc list-inside text-left mb-4">
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                        </ul>
                        <p class="font-oswald text-[36px] md:text-[48px] font-normal mb-4 text-right">35€/hour</p>
                        <button class="bg-[#082567] text-[#DCE9FF] px-20 md:px-10 lg:px-20 py-2 font-oswald text-[16px] md:text-[24px] font-extrabold hover:bg-blue-800 rounded-full">
                            <a href="{{ route('services') }}">{{ __('messages.buy_plan') }}</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Special Offers -->
        <div class="max-w-7xl mb-20 mx-auto sm:px-6 lg:px-8">
            <div class="text-white overflow-hidden p-8">
                <h3 class="text-center font-oswald text-[22px] md:text-[40px] text-white mb-12 md:mb-24">
                    {{ __('messages.special_offers') }}
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 place-items-center">
 
                    <div class="bg-[linear-gradient(204.47deg,_rgba(246,_32,_135,_0.6)_2.56%,_#082567_44.37%)] text-white rounded-3xl p-6 flex flex-col items-center shadow-lg max-w-[320px] md:max-w-full">
                        <h3 class="font-oswald text-[36px] md:text-[48px] font-normal mb-4 self-start">{{ __('messages.day_passes') }}</h3>
                        <ul class="text-xs md:text-lg list-disc list-inside text-left mb-4">
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                        </ul>
                        <p class="font-oswald text-[36px] md:text-[48px] font-normal mb-4 text-right">35€/hour</p>
                        <button class="bg-[#DCE9FF] text-blue-900 px-20 md:px-10 lg:px-20 py-2 font-oswald text-[16px] md:text-[24px] font-extrabold hover:bg-white rounded-full">
                            <a href="{{ route('services') }}">{{ __('messages.buy_plan') }}</a>
                        </button>
                    </div>

                    <div class="bg-[#DCE9FF] text-blue-900 rounded-3xl p-6 flex flex-col items-center shadow-lg max-w-[320px] md:max-w-full ">
                        <h3 class="font-oswald text-[36px] md:text-[48px] font-normal mb-4 self-start">{{ __('messages.night_passes') }}</h3>
                        <ul class="text-xs md:text-lg list-disc list-inside text-left mb-4">
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                        </ul>
                        <p class="font-oswald text-[36px] md:text-[48px] font-normal mb-4 text-right">35€/hour</p>
                        <button class="bg-[#082567] text-[#DCE9FF] px-20 md:px-10 lg:px-20 py-2 font-oswald text-[16px] md:text-[24px] font-extrabold hover:bg-blue-800 rounded-full">
                            <a href="{{ route('services') }}">{{ __('messages.buy_plan') }}</a>
                        </button>
                    </div>

                    <div class="bg-[linear-gradient(204.47deg,_rgba(246,_32,_135,_0.6)_2.56%,_#082567_44.37%)] text-white rounded-3xl p-6 flex flex-col items-center shadow-lg max-w-[320px] md:max-w-full">
                        <h3 class="font-oswald text-[36px] md:text-[48px] font-normal mb-4 self-start">{{ __('messages.monthly_passes') }}</h3>
                        <ul class="text-xs md:text-lg list-disc list-inside text-left mb-4">
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                            <li>Lorem Ipsum is simply dummy text</li>
                        </ul>
                        <p class="font-oswald text-[36px] md:text-[48px] font-normal mb-4 text-right">35€/hour</p>
                        <button class="bg-[#DCE9FF] text-blue-900 px-20 md:px-10 lg:px-20 py-2 font-oswald text-[16px] md:text-[24px] font-extrabold hover:bg-white rounded-full">
                                <a href="{{ route('services') }}">{{ __('messages.buy_plan') }}</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Price -->
        <div class="max-w-7xl mb-20 mx-auto sm:px-6 lg:px-8" id="prices">
            <div class="text-white overflow-hidden sm:rounded-lg p-10">

                <h2 class="text-center font-oswald text-[40px] md:text-[44px] font-normal text-white mb-10">
                    {{ __('messages.price') }}
                </h2>

                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-5 gap-6">

                    <div class="bg-[#D9D9D9] rounded-3xl p-6 text-center">
                        <h3 class="text-lg font-oswald text-[32px] text-black mb-2">Standard</h3>
                        <p class="text-4xl font-oswald text-[44px] md:text-[64px] text-[#625E5E] mt-6 mb-8">150$</p>
                        <p class="text-sm text-black text-[18px] mt-6 mb-2">some description</p>
                    </div>

                    <div class="bg-[#D9D9D9] rounded-3xl p-6 text-center">
                        <h3 class="text-lg font-oswald text-[32px] text-black mb-2">Standard</h3>
                        <p class="text-4xl font-oswald text-[44px] md:text-[64px] text-[#625E5E] mt-6 mb-8">150$</p>
                        <p class="text-sm text-black text-[18px] mt-6 mb-2">some description</p>
                    </div>
                    
                    <div class="bg-[#D9D9D9] rounded-3xl p-6 text-center">
                        <h3 class="text-lg font-oswald text-[32px] text-black mb-2">Standard</h3>
                        <p class="text-4xl font-oswald text-[44px] md:text-[64px] text-[#625E5E] mt-6 mb-8">150$</p>
                        <p class="text-sm text-black text-[18px] mt-6 mb-2">some description</p>
                    </div>

                    <div class="bg-[#D9D9D9] rounded-3xl p-6 text-center">
                        <h3 class="text-lg font-oswald text-[32px] text-black mb-2">Standard</h3>
                        <p class="text-4xl font-oswald text-[44px] md:text-[64px] text-[#625E5E] mt-6 mb-8">150$</p>
                        <p class="text-sm text-black text-[18px] mt-6 mb-2">some description</p>
                    </div>

                    <div class="bg-[#D9D9D9] rounded-3xl p-6 text-center">
                        <h3 class="text-lg font-oswald text-[32px] text-black mb-2">Standard</h3>
                        <p class="text-4xl font-oswald text-[44px] md:text-[64px] text-[#625E5E] mt-6 mb-8">150$</p>
                        <p class="text-sm text-black text-[18px] mt-6 mb-2">some description</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Download -->
        <div class="relative w-full h-[370pxpx] md:h-[350px] lg:h-[350px] overflow-hidden mb-20" id="download">
            <div class="absolute inset-0 w-full h-full">
                <img 
                    src="{{ asset('image/pexels-0ldpikes-29515357 1.png') }}" 
                    alt="Background Image" 
                    class="w-full h-full object-cover object-center"
                />
            </div>

            <div class="relative z-10 flex flex-col lg:flex-row justify-between items-center lg:items-start max-w-7xl mx-auto px-6 lg:px-8 h-full p-0">
                <div class="flex flex-col justify-start lg:w-2/3 text-white h-full">
                    <div class="flex items-start gap-4 mt-2 lg:mt-4">
                        <div class="bg-white w-[7px] h-[80px] md:h-[140px] mt-4"></div>
                        <div>
                            <h3 class="text-[26px] md:text-[48px] lg:text-[52px] font-oswald font-normal text-[#4287ff] leading-tight mb-1">
                                {{ __('messages.download_app') }}
                            </h3>
                            <h3 class="text-[26px] md:text-[48px] lg:text-[52px] font-oswald font-normal text-white max-w-[560px] leading-tight">
                                {{ __('messages.app_description') }}
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center lg:justify-end lg:w-1/3 h-full mb-2">
                    <img 
                        src="{{ asset('image/app dwld.png') }}" 
                        alt="Download App Links" 
                        class="w-[100px] md:w-[200px] lg:w-[250px] self-end"
                    />
                </div>
            </div>
        </div>
        <!-- Contact us -->
        <div class="max-w-7xl mb-20 mx-auto sm:px-6 lg:px-8">
            <div class="text-white overflow-hidden p-4 sm:p-10">
                <h2 class="text-center font-oswald text-[40px] md:text-[44px] font-normal text-white mb-10">
                    {{ __('messages.contacts_us') }}
                </h2>
                <p class="text-center text-[12px] md:text-[24px] text-gray-400 mb-12 sm:mb-24">
                    {{ __('messages.contacts_description') }}
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 lg:gap-16 items-start">
                    <div class="w-full order-2 md:order-1">
                        <div class="h-[300px] sm:h-[450px] lg:h-[500px] w-full md:w-[100%] mx-auto">
                            <div id="map" style="height: 100%; width: 100%;" class="mb-8 md:mb-0"></div>
                            @push('styles')
                            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
                            @endpush

                            @push('scripts')
                            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    const map = L.map('map').setView([52.5200, 13.4050], 4);
                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        maxZoom: 19,
                                        attribution: '© OpenStreetMap contributors'
                                    }).addTo(map);
                                    const markers = [
                                        { lat: 56.9496, lng: 24.1052, title: "Rīga" },
                                        { lat: 51.5074, lng: -0.1278, title: "London" },
                                        { lat: 52.5200, lng: 13.4050, title: "Berlin" },
                                    ];
                                    markers.forEach(({ lat, lng, title }) => {
                                        L.marker([lat, lng]).addTo(map).bindPopup(title);
                                    });
                                });
                            </script>
                            @endpush
                        </div>
                    </div>

                    <div class="w-full order-1 md:order-2 text-[#A4C5FF] py-8 p-12 md:p-0">
                        <div>
                            <h3 class="text-[32px] sm:text-[44px] font-bold text-[#A4C5FF] mb-6">
                                {{ __('messages.contact_details') }}
                            </h3>
                            <div class="space-y-8 sm:space-y-16">
                                <div>
                                    <h4 class="uppercase text-[16px] sm:text-[18px] mb-2 font-bold text-[#A4C5FF]">{{ __('messages.our_location') }}</h4>
                                    <p class="text-lg text-[24px] sm:text-[30px] font-bold text-[#5181FF]">
                                        58 Middle Point Rd San Francisco,<br>
                                        94124
                                    </p>
                                </div>
                                <div>
                                    <h4 class="uppercase text-[16px] sm:text-[18px] mb-2 font-bold text-[#A4C5FF]">{{ __('messages.call_us') }}</h4>
                                    <p class="text-lg text-[24px] sm:text-[32px] font-bold text-[#5181FF]">
                                        (123) 456 - 789
                                    </p>
                                </div>
                                <div>
                                    <h4 class="uppercase text-[16px] sm:text-[18px] mb-2 font-bold text-[#A4C5FF]">{{ __('messages.email_us') }}</h4>
                                    <p class="text-lg text-[24px] sm:text-[30px] font-bold text-[#5181FF]">
                                        contact@company.com
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- GET IN TOUCH -->
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="text-white overflow-hidden p-8">
                <h2 class="text-center font-oswald text-[40px] font-normal text-white mb-20 decoration-0">{{ __('messages.get_in_touch') }}</h2>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="flex flex-col">
                            <label for="name" class="text-white mb-2">{{ __('messages.name') }}</label>
                            <input 
                                type="text" 
                                id="name" 
                                placeholder="{{ __('messages.name') }}" 
                                class="rounded-full px-4 py-3 text-black focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="flex flex-col">
                            <label for="email" class="text-white mb-2">{{ __('messages.email') }}</label>
                            <input 
                                type="email" 
                                id="email" 
                                placeholder="{{ __('messages.email') }}" 
                                class="rounded-full px-4 py-3 text-black focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label for="message" class="text-white mb-2">{{ __('messages.message') }}</label>
                        <textarea 
                            id="message" 
                            rows="5" 
                            placeholder="{{ __('messages.message_placeholder') }}" 
                            class="rounded-xl px-4 py-3 text-black focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <div class="text-center">
                        <x-button type="submit" class="px-6 py-5 mt-6">
                            {{ __('messages.send_message') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>