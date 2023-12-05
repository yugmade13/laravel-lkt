<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Interviews') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full flex justify-end items-center mb-4">
                <a href="{{ route('interview.create') }}"
                   class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Create
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Phone Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                IP Address
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($interviews as $key => $interview)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $key + 1 }}
                                </th>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $interview->full_name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $interview->phone_number }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $interview->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $interview->ip_address }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $interview->status }}
                                </td>
                                <td class="px-6 py-4 gap-4 flex gap-4">
                                    <a href="{{ route('interview.edit', $interview) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <form action="{{ route('interview.destroy', $interview) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="Delete" class="font-medium text-red-600 dark:text-blue-500 hover:underline"/>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div>No data found</div>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-4 px-4">
                {{ $interviews->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
