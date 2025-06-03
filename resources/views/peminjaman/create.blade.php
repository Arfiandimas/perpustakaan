<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <form method="post" action="{{ route('peminjaman.store') }}" class="space-y-6">
                            @csrf

                            <div>
                                <x-input-label for="anggota" :value="__('Anggota')" />
                                <select id="anggota" name="anggota_id"
                                    class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">-- Pilih Anggota --</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}" {{ old('anggota_id') == $member->id ? 'selected' : '' }}>
                                            {{ $member->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('anggota_id')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="buku" :value="__('Buku')" />
                                <select id="buku" name="buku_id"
                                    class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">-- Pilih Buku --</option>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}" {{ old('buku_id') == $book->id ? 'selected' : '' }}>
                                            {{ $book->judul_buku }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('buku_id')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="tanggal_pinjam" :value="__('Tanggal Pinjam')" />
                                <x-text-input id="tanggal_pinjam" name="tanggal_pinjam" type="date"
                                    class="mt-1 block w-full" :value="old('tanggal_pinjam')" />
                                <x-input-error :messages="$errors->get('tanggal_pinjam')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Create') }}</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
