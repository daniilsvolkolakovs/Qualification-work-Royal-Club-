<x-app-layout>
    <div class="py-12">
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
    </div>
</x-app-layout>