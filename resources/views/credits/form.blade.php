<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{-- Use 'Edit' for edit mode and create for non-edit/create mode --}}
            {{ isset($post) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200">
                    {{-- don't forget to add multipart/form-data so we can accept file in our form --}}
                    <form method="post" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($post)
                            @method('put')
                        @endisset
                
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="block w-full mt-1" :value="$post->title ?? old('title')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="content" value="Content" />
                            {{-- use textarea-input component that we will create after this --}}
                            <x-textarea-input id="content" name="content" class="block w-full mt-1" required autofocus>{{ $post->content ?? old('content') }}</x-textarea-input>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div>
                            <x-input-label for="featured_image" value="Featured Image" />
                            <label class="block mt-2">
                                <span class="sr-only">Choose image</span>
                                <input type="file" id="featured_image" name="featured_image" accept=".jpg, .jpeg, .png" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100 "/>
                            </label>
                            <div class="my-2 shrink-0">
                                <img id="featured_image_preview" class="object-cover h-64 rounded-md w-128" src="{{ isset($post) ? Storage::url($post->featured_image) : '' }}" alt="Featured image preview" />
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('featured_image')" />
                        </div>
                
                        <div class="flex items-center gap-4">
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
    </script>
</x-app-layout>