<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center justify-center font-oswald text-[64px] font-normal text-4xl text-white leading-tight">
            @lang('messages.edit_user')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#D9D9D9] overflow-hidden sm:rounded-3xl p-6">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-lg font-medium text-[#625E5E]">@lang('messages.name')</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="mt-1 block w-full rounded-3xl border-0">
                    </div>
                    
                    <div class="mb-4">
                        <label for="email" class="block text-lg font-medium text-[#625E5E]">@lang('messages.email')</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="mt-1 block w-full rounded-3xl border-0">
                    </div>

                    <div class="mb-4">
                        <label for="usertype" class="block text-lg font-medium text-[#625E5E]">@lang('messages.role')</label>
                        <select name="usertype" class="mt-1 block w-full rounded-3xl border-0">
                            <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>@lang('messages.admin')</option>
                            <option value="manager" {{ $user->usertype == 'manager' ? 'selected' : '' }}>@lang('messages.manager')</option>
                            <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>@lang('messages.user')</option>
                        </select>
                    </div>

                    <x-button type="submit">@lang('messages.update_user')</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
