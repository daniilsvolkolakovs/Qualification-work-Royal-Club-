<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center justify-center font-oswald text-[64px] font-normal text-4xl text-white leading-tight">
            @lang('messages.edit_booking')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#D9D9D9] overflow-hidden sm:rounded-3xl p-6">

                @if (session('success'))
                    <div class="bg-green-500 text-white p-2 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-500 text-white p-2 mb-4 rounded">
                        {{ session('error') }}
                    </div>
                @endif
                
                <form action="{{ route('manager.bookings.update', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="computer_id" class="block text-lg font-medium text-[#625E5E]">@lang('messages.computer')</label>
                        <select name="computer_id" id="computer_id" class="form-select mt-1 block w-full rounded-3xl border-0" disabled>
                            <option value="{{ $booking->computer_id }}">{{ $booking->computer->name }}</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="start_time" class="block text-lg font-medium text-[#625E5E]">@lang('messages.start_time')</label>
                        <input type="datetime-local" name="start_time" id="start_time" class="form-input mt-1 block w-full rounded-3xl border-0" value="{{ \Carbon\Carbon::parse($booking->start_time)->format('Y-m-d\TH:i') }}" required>
                        @error('start_time')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="end_time" class="block text-lg font-medium text-[#625E5E]">@lang('messages.end_time')</label>
                        <input type="datetime-local" name="end_time" id="end_time" class="form-input mt-1 block w-full rounded-3xl border-0" value="{{ \Carbon\Carbon::parse($booking->end_time)->format('Y-m-d\TH:i') }}" required>
                        @error('end_time')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <x-button type="submit" class="py-3 px-6">
                        @lang('messages.edit')
                    </x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>