<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">


            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($post) ? 'แก้ไขข้อมูลหนังสือ' : 'เพิ่มหนังสือ' }}
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">


            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200">
                    <a href="{{ route('posts.index') }}"
                        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"">กลับ</a>

                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post"
                        action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}"
                        class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($post)
                            @method('put')
                        @endisset

                        <div>
                            <x-input-label for="title" value="ชื่อหนังสือ" />
                            <x-text-input id="title" name="title" type="text" class="block w-full mt-1"
                                :value="$post->title ?? old('title')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="content" value="คำอธิบาย" />
                            {{-- use textarea-input component that we will create after this --}}
                            <x-textarea-input id="content" name="content" class="block w-full mt-1" required
                                autofocus>{{ $post->content ?? old('content') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex-1 m-8">
                                <x-input-label for="genre" value="ประเภท" />
                                <select id="genre" name="genre"
                                    class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" selected>เลือกประเภท</option>
                                    <option value="fiction">นวนิยาย</option>
                                    <option value="non-fiction">หนังสือสารคดี</option>
                                    <option value="mystery">ปริศนา</option>
                                    <!-- เพิ่มตัวเลือกประเภทเพิ่มเติมตามที่ต้องการ -->
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('genre')" />
                            </div>

                            <div class="flex-1 ml-4">
                                <x-input-label for="category" value="หมวดหมู่" />
                                <select id="category" name="category"
                                    class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="" selected>เลือกหมวดหมู่</option>
                                    <option value="fiction">นวนิยาย</option>
                                    <option value="non-fiction">หนังสือสารคดี</option>
                                    <option value="mystery">ปริศนา</option>
                                    <!-- เพิ่มตัวเลือกหมวดหมู่เพิ่มเติมตามที่ต้องการ -->
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('category')" />
                            </div>
                        </div>

                        <div class="flex space-x-4">
                            <div class="flex-1 m-8">
                                <x-input-label for="price_per_week" value="ราคาต่อสัปดาห์" />
                                <x-text-input id="price_per_week" name="price_per_week" type="text" class="block w-full mt-1"
                                    :value="$post->price_per_week ?? old('price_per_week')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('price_per_week')" />
                                <x-input-error class="mt-2" :messages="$errors->get('genre')" />
                            </div>

                            <div class="flex-1 ml-4">
                                <x-input-label for="price_per_month" value="ราคาต่อเดือน" />
                                <x-text-input id="price_per_month" name="price_per_month" type="text" class="block w-full mt-1"
                                    :value="$post->price_per_month ?? old('price_per_month')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('price_per_month')" />
                                <x-input-error class="mt-2" :messages="$errors->get('category')" />
                            </div>
                        </div>


                        <div>
                            <x-input-label for="featured_image" value="รูปปก" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input type="file" id="featured_image" name="featured_image"
                                    accept=".jpg, .jpeg, .png"
                                    class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 " />
                            </label>
                            <div class="my-2 shrink-0">
                                <img id="featured_image_preview" class="object-cover h-64 rounded-md w-128"
                                    src="{{ isset($post) ? Storage::url($post->featured_image) : '' }}"
                                    alt="" />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('featured_image')" />
                                <div>
                                    <x-input-label for="add_image" value="รูปปก" class="mt-2" />
                                    <label class="block mt-2">
                                        <span class="sr-only">Choose image</span>
                                        <input type="file" id="add_image" name="add_image[]" multiple accept=".jpg, .jpeg, .png"
                                            class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 " />
                                    </label>
                                    <div class="my-2 shrink-0">
                                        <div id="add_image_preview" class="flex flex-wrap -mx-2"></div>
                                    </div>
                                    <x-input-error class="m-2" :messages="$errors->get('add_image')" />
                                </div>


                            <div class="flex items-center gap-4 mt-2">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // create onchange event listener for featured_image input
        document.getElementById('featured_image').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in featured_image_preview
                document.getElementById('featured_image_preview').src = URL.createObjectURL(file)
            }
        }
        // create onchange event listener for featured_image input
        document.getElementById('add_image').addEventListener('change', function(e) {
    const preview = document.getElementById('add_image_preview');
    preview.innerHTML = ''; // เคลียร์รูปภาพที่แสดงอยู่ก่อนหน้า

    for (let i = 0; i < this.files.length; i++) {
        const file = this.files[i];
        if (file && file.type.match('image.*')) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.className = 'object-cover h-64 rounded-md w-1/5 px-2'; // ปรับขนาดรูปและระยะห่าง
                img.src = e.target.result;
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    }
});

    </script>
</x-app-layout>
