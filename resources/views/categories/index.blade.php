<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('ประเภทหนังสือ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-lg font-semibold tracking-wider text-left text-gray-900 uppercase">
                                    ประเภทหนังสือ
                                </th>
                                <th scope="col" class="px-6 py-3 text-lg font-semibold tracking-wider text-left text-gray-900 uppercase">
                                    จำนวนหนังสือ
                                </th>
                                <th scope="col" class="px-6 py-3 text-lg font-semibold tracking-wider text-left text-gray-900 uppercase">
                                    จำนวนผู้อ่าน
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            {{-- @foreach ($categories->sortByDesc('books_count') as $category) --}}
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{-- <div class="text-sm text-gray-900">{{ $category->name }}</div> --}}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{-- <div class="text-sm text-gray-900">{{ $category->books_count }}</div> --}}
                                </td>
                            </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
