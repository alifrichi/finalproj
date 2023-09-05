<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(Auth::user()->role == 0)
                        {{ __("You're logged in as author!") }}
                    @elseif(Auth::user()->role == 1)
                        {{ __("You're logged in as reader!") }}
                    @else
                        {{ __("You're logged in!") }}
                    @endif
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <h3 class="mb-2 text-lg font-semibold">จำนวนผู้เข้าชมหนังสือ</h3>
                            {{-- <p class="text-4xl font-bold">{{ $visitorsCount }}</p> --}}
                        </div>
                        <div>
                            <h3 class="mb-2 text-lg font-semibold">จำนวนหนังสือ</h3>
                            {{-- <p class="text-4xl font-bold">{{ $booksCount }}</p> --}}
                        </div>
                        <div>
                            <h3 class="mb-2 text-lg font-semibold">จำนวนผู้ใช้งาน (ผู้อ่าน)</h3>
                            {{-- <p class="text-4xl font-bold">{{ $readersCount }}</p> --}}
                        </div>
                        <div>
                            <h3 class="mb-2 text-lg font-semibold">จำนวนผู้ใช้งาน (เจ้าของหนังสือ)</h3>
                            {{-- <p class="text-4xl font-bold">{{ $ownersCount }}</p> --}}
                        </div>
                        <div>
                            <h3 class="mb-2 text-lg font-semibold">จำนวนผู้ใช้งาน (เจ้าของหนังสือ)</h3>
                            {{-- <p class="text-4xl font-bold">{{ $ownersCount }}</p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
