<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Pengembalian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-10 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="space-y-6 p-6">
                    @forelse ($pengembalian as $item)
                        <div class="rounded-md border p-5 shadow">
                            <div class="flex items-center gap-2">
                                <h3><strong>{{$item?->anggota?->nama}}</strong></h3>
                            </div>
                            <div class="mt-4 flex items-end justify-between">
                                <div>
                                    <div>Buku: <strong>{{$item?->buku?->judul_buku}}</strong></div>
                                    <div>Tanggal Pinjam: <strong>{{ date('d-m-Y', strtotime($item->tanggal_pinjam)) }}</strong></div>
                                    <div>Tanggal Kembali: <strong>{{ date('d-m-Y', strtotime($item->tanggal_kembali)) }}</strong></div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                    <div>
                        {{ $pengembalian->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
