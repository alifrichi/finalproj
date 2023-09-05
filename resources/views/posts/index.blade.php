<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('หนังสือ') }}
            </h2>
            <a href="{{ route('posts.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded-md">เพิ่มหนังสือ</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <table class="w-full text-sm border-collapse table-auto">
                        <thead>
                            <tr>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-900">ปก</th>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-900">ชื่อหนังสือ
                                </th>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-900">ประเภท</th>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-900">หมวดหมู่
                                </th>
                                {{-- <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-900">Title</th>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-900">ราคา</th> --}}
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-900">ราคา/สัปดาห์
                                </th>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-900">ราคา/เดือน
                                </th>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-900">วันที่เพิ่ม
                                </th>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-900">ตัวเลือก
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($posts as $post)
                                <tr>
                                    <td
                                        class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-900 ">
                                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="รูปภาพ"
                                            style="max-width: 100px; max-height: 100px;">
                                    </td>

                                    <td
                                        class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-900 ">
                                        {{ $post->title }}</td>

                                    <td
                                        class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-900 ">
                                        {{ $post->genre }}</td>
                                        <td
                                        class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-900 ">
                                        {{ $post->category }}</td>
                                    {{-- <td
                                        class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-900 ">
                                        {{ $post->created_at }}</td> --}}
                                        <td
                                        class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-900 ">
                                        {{ $post->title }}</td>
                                    <td
                                        class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-900 ">
                                        {{ $post->title }}</td>
                                    <td
                                        class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-900 ">
                                        {{ $post->updated_at }}</td>
                                    <td
                                        class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-900 ">
                                        <a href="{{ route('posts.show', $post->id) }}"
                                            class="px-4 py-2 border border-blue-500 rounded-md hover:bg-blue-500 hover:text-white">รายละเอียด</a>
                                        <a href="{{ route('posts.edit', $post->id) }}"
                                            class="px-4 py-2 border border-yellow-500 rounded-md hover:bg-yellow-500 hover:text-white">แก้ไข</a>
                                        <form method="post" action="{{ route('posts.destroy', $post->id) }}"
                                            class="inline">
                                            @csrf
                                            @method('delete')
                                            <button
                                                class="px-4 py-2 border border-red-500 rounded-md hover:bg-red-500 hover:text-white">ลบ</button>
                                        </form>
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
