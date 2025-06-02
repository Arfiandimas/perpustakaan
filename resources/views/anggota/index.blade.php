<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Anggota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-10 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="space-y-6 p-6">
                    @forelse ($members as $member)
                    <div class="rounded-md border p-5 shadow">
                        <div class="flex items-center gap-2">
                            <h3><a href="{{ route('anggota.show', ['anggota' => $member->id]) }}" class="text-blue-500">{{$member->nama}}</a></h3>
                        </div>
                        <div class="mt-4 flex items-end justify-between">
                            <div>Jumlah Pinjaman: {{$member->stock}}</div>
                            <div>
                                <a href="{{ route('anggota.edit', ['anggota' => $member->id]) }}" class="text-blue-500">Edit</a> /
                                <form action="#" method="POST" class="inline">
                                    <button class="text-red-500">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse

                    <div>
                        {{ $members->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
