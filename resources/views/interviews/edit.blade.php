<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Interviews') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex justify-start items-center mb-4">
                <a href="{{ route('interview') }}" class="text-blue-600">
                    <- Back to table
                </a>
            </div>

            <form action="{{ route('interview.update', $interview) }}" method="POST" class="max-w-2xl mx-auto">
                @csrf
                @method('PUT')

                <div class="mb-2">
                    <label for="full_name" class="block text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                    <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $interview->full_name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('full_name')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="phone_number" class="block text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                    <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $interview->phone_number) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('phone_number')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="email" class="block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $interview->email) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('email')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="ip_address" class="block text-sm font-medium text-gray-900 dark:text-white">IP Address</label>
                    <input type="text" id="ip_address" name="ip_address" value="{{ old('ip_address', $interview->ip_address) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    @error('ip_address')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                    @enderror
                </div>
                <x-select active="{{ $interview->status }}" />
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
