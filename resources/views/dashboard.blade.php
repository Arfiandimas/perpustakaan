<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl space-y-10 sm:px-6 lg:px-8">
            
            {{-- Untuk tamu (belum login) --}}
            @if (!Auth::check())
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p>
                            Please <a href="{{ route('login') }}" class="text-blue-500">login</a> or
                            <a href="{{ route('register') }}" class="text-blue-500">register</a>.
                        </p>
                    </div>
                </div>
            @endif

            {{-- Grid 2 kolom grafik mingguan --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-bold mb-4">Anggota Paling Sering Meminjam (Minggu Ini)</h2>
                    <canvas id="anggota_top5" height="200"></canvas>
                </div>

                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-bold mb-4">Buku Paling Sering Dipinjam (Minggu Ini)</h2>
                    <canvas id="bukuChart" height="200"></canvas>
                </div>
            </div>

            {{-- Grafik sepanjang waktu --}}
            <div class="bg-white p-4 rounded shadow mt-10">
                <h2 class="text-lg font-bold mb-4">8 Buku Terpopuler Sepanjang Waktu</h2>
                <canvas id="bukuAllTimeChart" height="200"></canvas>
            </div>
        </div>
    </div>

    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Grafik anggota
            const anggota_labels = {!! json_encode($anggota_top5->pluck('nama')) !!};
            const anggota_data = {!! json_encode($anggota_top5->pluck('transaksi_peminjaman_count')) !!};

            new Chart(document.getElementById('anggota_top5'), {
                type: 'bar',
                data: {
                    labels: anggota_labels,
                    datasets: [{
                        data: anggota_data,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: { legend: { display: false }},
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Peminjaman'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Nama Anggota'
                            }
                        }
                    }
                }
            });

            // Grafik buku minggu ini
            const top5BukuLabels = {!! json_encode($top5buku->pluck('judul_buku')) !!};
            const top5BukuData = {!! json_encode($top5buku->pluck('transaksi_peminjaman_count')) !!};

            new Chart(document.getElementById('bukuChart'), {
                type: 'bar',
                data: {
                    labels: top5BukuLabels,
                    datasets: [{
                        data: top5BukuData,
                        backgroundColor: 'rgba(255, 159, 64, 0.6)',
                        borderColor: 'rgba(255, 159, 64, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: { legend: { display: false }},
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Peminjaman'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Judul Buku'
                            }
                        }
                    }
                }
            });

            // Grafik buku sepanjang waktu
            const bukuLabels = {!! json_encode($topBukuAllTime->pluck('judul_buku')) !!};
            const bukuData = {!! json_encode($topBukuAllTime->pluck('transaksi_peminjaman_count')) !!};

            new Chart(document.getElementById('bukuAllTimeChart'), {
                type: 'bar',
                data: {
                    labels: bukuLabels,
                    datasets: [{
                        data: bukuData,
                        backgroundColor: 'rgba(153, 102, 255, 0.6)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: { legend: { display: false }},
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Jumlah Peminjaman'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Judul Buku'
                            },
                            ticks: {
                                autoSkip: false,
                                maxRotation: 45,
                                minRotation: 30
                            }
                        }
                    }
                }
            });
        </script>
    @endsection
</x-app-layout>