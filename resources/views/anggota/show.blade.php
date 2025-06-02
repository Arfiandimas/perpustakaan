<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Anggota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 mb-6 sm:p-8 bg-white shadow sm:rounded-lg">
                <section class="space-y-6">
                    <h1 class="font-bold text-xl">{{$member->nama}}</h1>

                    <div class="flex justify-between">
                        <div class="flex gap-2 items-center">
                            {{$member->stock}}
                            <span class="text-gray-500">Buku</span>
                        </div>
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 fill-gray-500"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 8C119 8 8 119 8 256S119 504 256 504 504 393 504 256 393 8 256 8zm92.5 313h0l-20 25a16 16 0 0 1 -22.5 2.5h0l-67-49.7a40 40 0 0 1 -15-31.2V112a16 16 0 0 1 16-16h32a16 16 0 0 1 16 16V256l58 42.5A16 16 0 0 1 348.5 321z"/></svg>
                            <span class="text-gray-500">{{$member->created_at->format('d-m-Y')}}</span>
                        </div>
                    </div>

                    <div>
                        <p>Nomor Anggota : {{ $member->no_anggota }}</span>
                        <p>Tanggal Lahir : {{ date('d-m-Y', strtotime($member->tanggal_lahir)) }}</span>
                    </div>
                </section>
            </div>
            <a href="{{ route('anggota.index') }}" class="inline-flex gap-2 items-center text-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="size-4 fill-blue-500"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M34.5 239L228.9 44.7c9.4-9.4 24.6-9.4 33.9 0l22.7 22.7c9.4 9.4 9.4 24.5 0 33.9L131.5 256l154 154.8c9.3 9.4 9.3 24.5 0 33.9l-22.7 22.7c-9.4 9.4-24.6 9.4-33.9 0L34.5 273c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>{{ __('Semua Anggota') }}
            </a>
        </div>
    </div>
</x-app-layout>
