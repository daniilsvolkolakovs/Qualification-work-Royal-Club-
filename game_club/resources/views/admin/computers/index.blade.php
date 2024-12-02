<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center justify-center font-oswald text-[64px] font-normal text-4xl text-white leading-tight">
            @lang('messages.computer_management')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#D9D9D9] overflow-hidden sm:rounded-3xl p-6">
                <h1 class="text-2xl mb-4 text-[#625E5E]">@lang('messages.all_computers')</h1>

                @if (session('success'))
                    <div class="bg-green-500 text-white p-2 mb-4 rounded">
                        @lang('messages.computer_session_success')
                    </div>
                @endif

                <!-- Search form -->
                <form action="{{ route('admin.computers.index') }}" method="GET" class="mb-4">
                    <div class="flex items-center">
                        <input type="text" name="search" 
                               value="{{ request()->get('search') }}" 
                               placeholder="@lang('messages.search_by_id_or_name')" 
                               class="w-96 p-2 border border-gray-300 rounded-lg mr-2" />
                        <x-button type="submit">
                            @lang('messages.search')
                        </x-button>
                    </div>
                </form>
                
                <x-button>
                    <a href="{{ route('admin.computers.create') }}">
                        @lang('messages.create_computer')
                    </a>
                </x-button>

                <div class="overflow-x-auto mt-4 shadow-2xl rounded-3xl">
                    <table class="min-w-full bg-[#d9d9d9] border-separate shadow-2xl border-spacing-0">
                        <thead>
                            <tr class="bg-[#d1d1d1]">
                                    <th class="py-3 px-4 text-center text-gray-800 font-semibold border-b" style="width: 10%; white-space: nowrap;">
                                        <a href="{{ route('admin.computers.index', ['sort' => 'id', 'order' => ($sortField === 'id' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center">
                                            ID
                                            @if ($sortField === 'id')
                                                @if ($sortOrder === 'asc') 
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7-7-7 7" />
                                                    </svg>
                                                @else 
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7 7 7-7" />
                                                    </svg>
                                                @endif
                                            @endif
                                        </a>
                                    </th>


                                    <th class="py-3 px-4 text-left text-gray-800 font-semibold border-b" style="width: 35%; white-space: nowrap;">
                                        <a href="{{ route('admin.computers.index', ['sort' => 'name', 'order' => ($sortField === 'name' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center">
                                            @lang('messages.name')
                                            @if ($sortField === 'name')
                                                @if ($sortOrder === 'asc') 
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7-7-7 7" />
                                                    </svg>
                                                @else 
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7 7 7-7" />
                                                    </svg>
                                                @endif
                                            @endif
                                        </a>
                                    </th>

                                    <th class="py-3 px-4 text-left text-gray-800 font-semibold border-b" style="width: 25%; white-space: nowrap;">
                                        <a href="{{ route('admin.computers.index', ['sort' => 'price', 'order' => ($sortField === 'price' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center">
                                            @lang('messages.price')
                                            @if ($sortField === 'price')
                                                @if ($sortOrder === 'asc') 
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7-7-7 7" />
                                                    </svg>
                                                @else 
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7 7 7-7" />
                                                    </svg>
                                                @endif
                                            @endif
                                        </a>
                                    </th>

                                    <th class="py-3 px-4 text-center text-gray-800 font-semibold border-b" style="width: 10%; white-space: nowrap;">
                                        @lang('messages.actions')
                                    </th>
                                </tr>
                        </thead>
                        <tbody>
                            @foreach ($computers as $computer)
                                <tr class="hover:bg-[#d1d1d1]">
                                    <td class="py-3 px-4 text-center">{{ $computer->id }}</td>
                                    <td class="py-3 px-4">{{ $computer->name }}</td>
                                    <td class="py-3 px-4">{{ number_format($computer->price, 2) }}</td>
                                    <td class="py-3 px-4 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <x-button>
                                                <a href="{{ route('admin.computers.edit', $computer->id) }}">
                                                    @lang('messages.edit')
                                                </a>
                                            </x-button>
                                            <form action="{{ route('admin.computers.destroy', $computer->id) }}" 
                                                method="POST" 
                                                style="display:inline;">
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
            </div>
        </div>
    </div>
</x-app-layout>