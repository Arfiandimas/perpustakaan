<div id="modal-update-{{ $id }}" tabindex="-1"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[100vh] bg-black bg-opacity-40 flex items-center justify-center">
    
    <div class="relative w-full max-w-md bg-white rounded-lg shadow-lg p-6">
        <!-- Close Button -->
        <button type="button" class="absolute top-3 right-3 text-gray-500 hover:text-gray-900"
            data-modal-hide="modal-update-{{ $id }}">
            ×
        </button>

        <h3 class="text-lg font-semibold mb-4">Pengembalian Buku</h3>

        <form action="{{ route('peminjaman.update', ['peminjaman' => $data->id]) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <x-input-label for="tanggal_kembali" :value="__('Tanggal Kembali')" />
                <x-text-input id="tanggal_kembali" name="tanggal_kembali" type="date"
                    class="mt-1 block w-full"
                    :value="old('tanggal_kembali', $data->tanggal_kembali)" />
                <x-input-error :messages="$errors->get('tanggal_kembali')" class="mt-2" />
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>