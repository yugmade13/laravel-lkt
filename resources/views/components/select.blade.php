@props(['active'])

<div class="mb-2">
    <label for="status" class="block text-sm font-medium text-gray-900 dark:text-white">Status</label>
    <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option selected disabled>Choose a Status</option>
        @foreach($select as $item)
            <option value="{{ $item }}" {{ old('status') || $item == $active ? 'selected' : '' }}>
                {{ $item }}
            </option>
        @endforeach
    </select>
    @error('status')
    <div class="text-sm text-red-600">{{ $message }}</div>
    @enderror
</div>
