<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <form method="post" action="{{ route('buku.store') }}" class="space-y-6">
                            @csrf

                            <div>
                                <x-input-label for="judul_buku" :value="__('Judul Buku')" />
                                <x-text-input id="judul_buku" name="judul_buku" type="text" class="mt-1 block w-full" :value="old('judul_buku')"/>
                                <x-input-error :messages="$errors->get('judul_buku')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="penerbit" :value="__('Penerbit')" />
                                <x-text-input id="penerbit" name="penerbit" type="text" class="mt-1 block w-full" :value="old('penerbit')"/>
                                <x-input-error :messages="$errors->get('penerbit')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="lebar" :value="__('Lebar')" />
                                <x-text-input id="lebar" name="lebar" type="number" step="0.1" class="mt-1 block w-full" :value="old('lebar')"/>
                                <x-input-error :messages="$errors->get('lebar')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="tinggi" :value="__('Tinggi')" />
                                <x-text-input id="tinggi" name="tinggi" type="number" step="0.1" class="mt-1 block w-full" :value="old('tinggi')"/>
                                <x-input-error :messages="$errors->get('tinggi')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="stock" :value="__('Stock')" />
                                <x-text-input id="stock" name="stock" type="number" class="mt-1 block w-full" :value="old('stock')"/>
                                <x-input-error :messages="$errors->get('stock')" class="mt-2" />
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
