<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Temukan Lowongan Kerja Impianmu!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Lowongan Terbaru</h3>
                    @forelse ($lowongans as $lowongan)
                        <div class="border-b border-gray-200 pb-4 mb-4">
                            <h4 class="text-xl font-bold text-indigo-600">
                                <a href="{{ route('lowongans.show', $lowongan->id) }}">{{ $lowongan->judul_pekerjaan }}</a>
                            </h4>
                            <p class="text-gray-700 mt-1"><strong>{{ $lowongan->nama_perusahaan }}</strong> - {{ $lowongan->lokasi }}</p>
                            @if ($lowongan->gaji)
                                <p class="text-gray-600">Gaji: {{ $lowongan->gaji }}</p>
                            @endif
                            <p class="text-gray-500 text-sm mt-2">{{ Str::limit($lowongan->deskripsi_pekerjaan, 150) }}</p>
                            <div class="mt-3">
                                <a href="{{ route('lowongans.show', $lowongan->id) }}" class="text-blue-500 hover:underline">Lihat Detail</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-600">Belum ada lowongan kerja yang tersedia saat ini.</p>
                    @endforelse

                    <div class="mt-4">
                        {{ $lowongans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>