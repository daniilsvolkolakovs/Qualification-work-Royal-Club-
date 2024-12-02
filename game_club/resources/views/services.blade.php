<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center justify-center font-oswald text-[64px] font-normal text-4xl text-white leading-tight">
            @lang('messages.services')
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#D9D9D9] overflow-hidden sm:rounded-3xl p-6">
                <!-- Guest -->
                @if (!auth()->check())
                    <div class="text-center">
                        <h1 class="text-2xl font-semibold">@lang('messages.welcome_to_services')</h1>
                        <p class="mt-4">@lang('messages.please_login_or_register_to_continue')</p>
                        <div class="mt-6 space-x-4">
                            <a href="{{ route('login') }}" class="bg-[#2E69A9] text-white px-6 py-3 rounded-[31px] hover:bg-blue-700 transition font-open-sans font-semibold text-[16px] 
                        leading-[27.24px] text-left border-none hover:shadow-lg">
                                @lang('messages.login')
                            </a>
                            <a href="{{ route('register') }}" class="bg-[#2E69A9] text-white px-6 py-3 rounded-[31px] hover:bg-blue-700 transition font-open-sans font-semibold text-[16px] 
                        leading-[27.24px] text-left border-none hover:shadow-lg">
                                @lang('messages.register')
                            </a>
                        </div>
                    </div>
                @else
                    <!-- User/Admin -->
                    @if (session('success'))
                        <div class="bg-green-500 text-white p-2 mb-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="bg-red-500 text-white p-2 mb-4 rounded">
                            @lang('messages.error')
                        </div>
                    @endif

                    @if(auth()->user()->usertype !== 'manager')
                    <!-- Price -->
                    <div class="max-w-7xl mb-20 mx-auto sm:px-6 lg:px-8" id="prices">
                        <div class="text-white overflow-hidden sm:rounded-lg p-2">

                            <h2 class="text-center font-oswald text-[40px] font-normal text-[#625E5E] mb-10">
                                {{ __('messages.price') }}
                            </h2>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">

                                <div class="bg-[#DCE9FF] rounded-3xl p-6 text-center">
                                    <h3 class="text-lg font-oswald text-[32px] text-black mb-2">Standard</h3>
                                    <p class="text-4xl font-oswald text-[72px] text-[#625E5E] mt-6 mb-12">150$</p>
                                    <p class="text-sm text-black text-[18px] mt-6 mb-2">some description</p>
                                </div>

                                <div class="bg-[#DCE9FF] rounded-3xl p-6 text-center">
                                    <h3 class="text-lg font-oswald text-[32px] text-black mb-2">Standard</h3>
                                    <p class="text-4xl font-oswald text-[72px] text-[#625E5E] mt-6 mb-12">150$</p>
                                    <p class="text-sm text-black text-[18px] mt-6 mb-2">some description</p>
                                </div>
                                
                                <div class="bg-[#DCE9FF] rounded-3xl p-6 text-center">
                                    <h3 class="text-lg font-oswald text-[32px] text-black mb-2">Standard</h3>
                                    <p class="text-4xl font-oswald text-[72px] text-[#625E5E] mt-6 mb-12">150$</p>
                                    <p class="text-sm text-black text-[18px] mt-6 mb-2">some description</p>
                                </div>

                                <div class="bg-[#DCE9FF] rounded-3xl p-6 text-center">
                                    <h3 class="text-lg font-oswald text-[32px] text-black mb-2">Standard</h3>
                                    <p class="text-4xl font-oswald text-[72px] text-[#625E5E] mt-6 mb-12">150$</p>
                                    <p class="text-sm text-black text-[18px] mt-6 mb-2">some description</p>
                                </div>

                                <div class="bg-[#DCE9FF] rounded-3xl p-6 text-center">
                                    <h3 class="text-lg font-oswald text-[32px] text-black mb-2">Standard</h3>
                                    <p class="text-4xl font-oswald text-[72px] text-[#625E5E] mt-6 mb-12">150$</p>
                                    <p class="text-sm text-black text-[18px] mt-6 mb-2">some description</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('bookings.pay') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="computer_id" class="block text-lg font-medium text-[#625E5E]">@lang('messages.select_computer')</label>
                            <select name="computer_id" id="computer_id" class="form-select mt-1 block w-full rounded-3xl border-0" required>
                                @foreach($computers as $computer)
                                    <option value="{{ $computer->id }}">{{ $computer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="start_time" class="block text-lg font-medium text-[#625E5E]">@lang('messages.start_time')</label>
                            <input type="datetime-local" name="start_time" id="start_time" class="form-input mt-1 block w-full rounded-3xl border-0" required>
                        </div>

                        <div class="pb-6">
                            <label for="end_time" class="block text-lg font-medium text-[#625E5E]">@lang('messages.end_time')</label>
                            <input type="datetime-local" name="end_time" id="end_time" class="form-input mt-1 block w-full rounded-3xl border-0" required>
                        </div>

                        <x-button type="submit" class="py-3 px-6">
                            @lang('messages.pay_and_book')
                        </x-button>
                    </form>
                    @endif

                    @if(auth()->user()->usertype !== 'manager' && $bookings->isNotEmpty())
                        <h2 class="text-2xl text-[#625E5E] mb-4 mt-12">@lang('messages.your_bookings')</h2>
                        <table class="min-w-full bg-[#D9D9D9] border-separate border-spacing-0 shadow-2xl">
                            <thead>
                                <tr class="bg-[#c5c5c5]">
                                    <th class="py-3 px-4 text-center">@lang('messages.id')</th>
                                    <th class="py-3 px-4 text-left">@lang('messages.computer')</th>
                                    <th class="py-3 px-4 text-center">@lang('messages.start_time')</th>
                                    <th class="py-3 px-4 text-center">@lang('messages.end_time')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr class="hover:bg-[#d1d1d1]">
                                        <td class="py-3 px-4 text-center">{{ $booking->id }}</td>
                                        <td class="py-3 px-4">{{ $booking->computer->name }}</td>
                                        <td class="py-3 px-4 text-center">{{ $booking->start_time }}</td>
                                        <td class="py-3 px-4 text-center">{{ $booking->end_time }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @elseif(auth()->user()->usertype !== 'manager')
                        <p class="mt-4 text-[#625E5E]">@lang('messages.no_bookings_yet')</p>
                    @endif
                
                    <!-- Manager -->
                    @if(auth()->user()->usertype === 'manager')
                        <h1 class="flex items-center justify-center font-bayon font-semibold text-4xl text-[#625E5E] leading-tight mb-6">@lang('messages.manage_bookings')</h1>

                        <!-- Search form -->
                        <form method="GET" action="{{ route('services') }}" class="mb-4">
                            <div class="flex items-center">
                                <input type="text" name="search" 
                                    value="{{ request('search') }}" 
                                    placeholder="@lang('messages.search_by_name_computer')" 
                                    class="w-96 p-2 border border-gray-300 mr-2 rounded-3xl" />
                                <x-button type="submit">
                                    @lang('messages.search')
                                </x-button>
                            </div>
                        </form>

                        <div class="overflow-x-auto mt-4 shadow-2xl rounded-3xl">
                            <table class="min-w-full bg-[#d9d9d9] border-separate shadow-2xl border-spacing-0">
                                <thead>
                                    <tr class="bg-[#d1d1d1]">
                                        <!-- ID Column with Sorting -->
                                        <th class="py-3 px-4 text-center">
                                            <a href="{{ route('services', [
                                                'sort' => 'bookings.id', 
                                                'order' => ($sortField === 'bookings.id' && $sortOrder === 'asc') ? 'desc' : 'asc',
                                                'search' => request('search', '') // передаем параметр поиска
                                            ]) }}" class="flex items-center justify-center">
                                                @lang('messages.id')
                                                @if ($sortField === 'bookings.id')
                                                    @if ($sortOrder === 'asc')
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7-7-7 7" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7 7 7-7" />
                                                        </svg>
                                                    @endif
                                                @endif
                                            </a>
                                        </th>

                                        <!-- Computer Column with Sorting -->
                                        <th class="py-3 px-4 text-left">
                                            <a href="{{ route('services', [
                                                'sort' => 'computers.name', 
                                                'order' => ($sortField === 'computers.name' && $sortOrder === 'asc') ? 'desc' : 'asc',
                                                'search' => request('search', '') // передаем параметр поиска
                                            ]) }}" class="flex items-center">
                                                @lang('messages.computer')
                                                @if ($sortField === 'computers.name')
                                                    @if ($sortOrder === 'asc')
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7-7-7 7" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7 7 7-7" />
                                                        </svg>
                                                    @endif
                                                @endif
                                            </a>
                                        </th>

                                        <!-- User Column with Sorting -->
                                        <th class="py-3 px-4 text-left">
                                            <a href="{{ route('services', [
                                                'sort' => 'users.name', 
                                                'order' => ($sortField === 'users.name' && $sortOrder === 'asc') ? 'desc' : 'asc',
                                                'search' => request('search', '') // передаем параметр поиска
                                            ]) }}" class="flex items-center">
                                                @lang('messages.user')
                                                @if ($sortField === 'users.name')
                                                    @if ($sortOrder === 'asc')
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7-7-7 7" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7 7 7-7" />
                                                        </svg>
                                                    @endif
                                                @endif
                                            </a>
                                        </th>

                                        <!-- Start Time Column with Sorting -->
                                        <th class="py-3 px-4 text-center">
                                            <a href="{{ route('services', [
                                                'sort' => 'bookings.start_time', 
                                                'order' => ($sortField === 'bookings.start_time' && $sortOrder === 'asc') ? 'desc' : 'asc',
                                                'search' => request('search', '') // передаем параметр поиска
                                            ]) }}" class="flex items-center justify-center">
                                                @lang('messages.start_time')
                                                @if ($sortField === 'bookings.start_time')
                                                    @if ($sortOrder === 'asc')
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7-7-7 7" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7 7 7-7" />
                                                        </svg>
                                                    @endif
                                                @endif
                                            </a>
                                        </th>

                                        <!-- End Time Column with Sorting -->
                                        <th class="py-3 px-4 text-center">
                                            <a href="{{ route('services', [
                                                'sort' => 'bookings.end_time', 
                                                'order' => ($sortField === 'bookings.end_time' && $sortOrder === 'asc') ? 'desc' : 'asc',
                                                'search' => request('search', '') // передаем параметр поиска
                                            ]) }}" class="flex items-center justify-center">
                                                @lang('messages.end_time')
                                                @if ($sortField === 'bookings.end_time')
                                                    @if ($sortOrder === 'asc')
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7-7-7 7" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7 7 7-7" />
                                                        </svg>
                                                    @endif
                                                @endif
                                            </a>
                                        </th>

                                        <!-- Actions Column -->
                                        <th class="py-3 px-4 text-center">@lang('messages.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr class="hover:bg-[#d1d1d1]">
                                            <td class="py-3 px-4 text-center">{{ $booking->id }}</td>
                                            <td class="py-3 px-4">{{ $booking->computer_name }}</td>
                                            <td class="py-3 px-4">{{ $booking->user_name }}</td>
                                            <td class="py-3 px-4 text-center">{{ $booking->start_time }}</td>
                                            <td class="py-3 px-4 text-center">{{ $booking->end_time }}</td>
                                            <td class="py-3 px-4 text-center">
                                                <div class="flex justify-center space-x-1">
                                                    <x-button>
                                                        <a href="{{ route('manager.bookings.edit', $booking->id) }}">
                                                            @lang('messages.edit')
                                                        </a>
                                                    </x-button>
                                                    
                                                    <form action="{{ route('manager.bookings.destroy', $booking->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-danger-button type="submit">
                                                            @lang('messages.delete')
                                                        </x-danger-button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</x-app-layout>