<footer class="bg-[#082567] text-white py-6 mt-10 pb-10 pt-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between">
        <!-- Logo -->
        <div class="flex justify-center sm:justify-start mt-12 mb-6 sm:mb-0 sm:w-auto w-full">
            <img src="{{ asset('image/Logo.png') }}" alt="Logo" class="h-auto max-h-10 sm:max-h-10">
        </div>

        <!-- Subscribe Section -->
        <div class="text-center sm:text-left mb-6 sm:mb-0">
            <p class="mb-4 text-lg font-semibold">{{ __('messages.subscribe_to_our_newsletter') }}</p>
            <form action="#" method="POST" class="flex items-center bg-[#F9FAFB] rounded-full overflow-hidden shadow-md">
                <input 
                    type="text" 
                    name="email" 
                    placeholder="{{ __('messages.enter_your_email_address') }}" 
                    class="px-8 py-4 text-black bg-transparent focus:outline-none focus:ring-0 border-none w-full sm:px-8 md:px-4"
                />
                <button 
                    type="submit" 
                    class="bg-[#356AA0] text-white px-6 py-4 font-semibold rounded-full border-4 border-white hover:bg-[#2B5A8A] transition">
                    {{ __('messages.submit') }}
                </button>
            </form>
        </div>

        <!-- Contact Information -->
        <div class="text-center sm:text-left">
            <h3 class="mb-4 text-lg font-semibold">{{ __('messages.contact_us') }}</h3>
            <ul class="space-y-2">
                <li><i class="fas fa-envelope mr-2"></i>{{ __('messages.email_') }}</li>
                <li><i class="fas fa-phone mr-2"></i>{{ __('messages.phone') }}</li>
                <li><i class="fas fa-map-marker-alt mr-2"></i>{{ __('messages.address') }}</li>
            </ul>
        </div>
    </div>

    <!-- Social Media Links -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
        <div class="text-center">
            <h3 class="mb-4 text-lg font-semibold">{{ __('messages.follow_us') }}</h3>
            <div class="flex justify-center space-x-4">
                <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:opacity-75">
                    <i class="fab fa-facebook-f text-[#2E69A9]"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:opacity-75">
                    <i class="fab fa-twitter text-[#2E69A9]"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:opacity-75">
                    <i class="fab fa-instagram text-[#2E69A9]"></i>
                </a>
                <a href="#" class="w-10 h-10 bg-white rounded-full flex items-center justify-center hover:opacity-75">
                    <i class="fab fa-youtube text-[#2E69A9]"></i>
                </a>
            </div>
        </div>
    </div>

    
</footer>
<!-- Footer Bottom -->
<div class="bg-[#100F11] text-white text-center py-4 mt-10 mb-4">
    <p>&copy; Royal Arena</p>
</div>