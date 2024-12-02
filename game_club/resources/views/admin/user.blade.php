<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center justify-center font-oswald text-[64px] font-normal text-4xl text-white leading-tight">
            @lang('messages.user_management')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#D9D9D9] overflow-hidden sm:rounded-3xl p-6">
                <h1 class="text-2xl mb-4 text-[#625E5E]">@lang('messages.all_users')</h1>

                @if (session('success'))
                    <div class="bg-green-500 text-white p-2 mb-4 rounded">
                        @lang('messages.session_success')
                    </div>
                @endif

                <form method="GET" action="{{ route('admin.users') }}" class="mb-4">
                    <div class="flex items-center">
                        <input type="text" name="search" 
                               value="{{ request()->get('search') }}" 
                               placeholder="@lang('messages.search_by_name_email')" 
                               class="w-96 p-2 border border-white rounded-3xl mr-2" />
                        <x-button type="submit">
                            @lang('messages.search')
                        </x-button>
                    </div>
                </form>

                <div class="shadow-2xl rounded-3xl">
                    <table class="min-w-full bg-[#d9d9d9]  border-spacing-0">
                        <thead>
                            <tr class="bg-[#d1d1d1]">
                                <th class="py-3 px-4 text-center text-gray-800 font-semibold border-b">
                                    <a href="{{ route('admin.users', ['sort' => 'id', 'order' => ($sortField === 'id' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center justify-center">
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

                                <th class="py-3 px-4 text-left text-gray-800 font-semibold border-b">
                                    <a href="{{ route('admin.users', ['sort' => 'name', 'order' => ($sortField === 'name' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center">
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

                                <th class="py-3 px-4 text-left text-gray-800 font-semibold border-b">
                                    <a href="{{ route('admin.users', ['sort' => 'email', 'order' => ($sortField === 'email' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center">
                                        @lang('messages.email')
                                        @if ($sortField === 'email')
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

                                <th class="py-3 px-4 text-left text-gray-800 font-semibold border-b">
                                    <a href="{{ route('admin.users', ['sort' => 'usertype', 'order' => ($sortField === 'usertype' && $sortOrder === 'asc') ? 'desc' : 'asc']) }}" class="flex items-center">
                                        @lang('messages.role')
                                        @if ($sortField === 'usertype')
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

                                <th class="py-3 px-4 text-center text-gray-800 font-semibold border-b">
                                    @lang('messages.actions')
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-[#d1d1d1] transition duration-200">
                                    <td class="py-3 px-4 text-center">{{ $user->id }}</td>
                                    <td class="py-3 px-4">{{ $user->name }}</td>
                                    <td class="py-3 px-4">{{ $user->email }}</td>
                                    <td class="py-3 px-4">{{ $user->usertype }}</td>
                                    <td class="py-3 px-4 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <x-button>
                                                <a href="{{ route('admin.users.edit', $user->id) }}" >
                                                @lang('messages.edit')
                                                </a>
                                            </x-button>
                                            
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" 
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