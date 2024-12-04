<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center justify-center font-oswald text-40 font-normal text-4xl text-white leading-tight">
            {{ __('messages.edit_computer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#D9D9D9] overflow-hidden sm:rounded-3xl p-6">
                <form action="{{ route('admin.computers.update', $computer->id) }}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="bg-red-500 text-white p-2 mb-4 rounded">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-lg font-medium text-[#625E5E]">@lang('messages.name')</label>
                        <input type="text" id="name" name="name" value="{{ $computer->name }}" class="mt-1 block w-full rounded-3xl border-0" required>
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-lg font-medium text-[#625E5E]  ">@lang('messages.price')</label>
                        <input type="number" id="price" name="price" value="{{ $computer->price }}" class="mt-1 block w-full rounded-3xl border-0" step="0.01" required>
                    </div>

                    <x-button type="submit" class="py-3 px-6">@lang('messages.save_changes')</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>