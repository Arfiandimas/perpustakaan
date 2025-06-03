<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-10 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="space-y-6 p-6">
                    <a href="{{ route('peminjaman.create')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Data Peminjaman</a>
                    @forelse ($peminjaman as $item)
                        <div class="rounded-md border p-5 shadow">
                            <div class="flex items-center gap-2">
                                <h3>{{$item?->anggota?->nama}}</h3>
                            </div>
                            <div class="mt-4 flex items-end justify-between">
                                <div>
                                    <div>Buku: {{$item?->buku?->judul_buku}}</div>
                                    <div>Tanggal Pinjam: {{ date('d-m-Y', strtotime($item->tanggal_pinjam)) }}</div>
                                </div>
                                <div>
                                    @include('peminjaman.edit', [
                                        'id' => $item->id,
                                        'data' => $item,
                                    ])
                                    <a href="#" data-modal-toggle="modal-update-{{ $item->id }}" data-modal-target="modal-update-{{ $item->id }}" class="text-blue-500">
                                        Pengembalian
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse

                    <div>
                        {{ $peminjaman->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
