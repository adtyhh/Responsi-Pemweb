<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Lowongan Kerja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">{{ $lowongan->judul_pekerjaan }}</h3>


                    <div class="mb-4">
                        <strong class="block text-gray-700">Perusahaan:</strong>
                        <span class="text-gray-900">{{ $lowongan->nama_perusahaan }}</span>
                    </div>
                    <div class="mb-4">
                        <strong class="block text-gray-700">Lokasi:</strong>
                        <span class="text-gray-900">{{ $lowongan->lokasi }}</span>
                    </div>
                    @if ($lowongan->gaji)
                        <div class="mb-4">
                            <strong class="block text-gray-700">Gaji:</strong>
                            <span class="text-gray-900">{{ $lowongan->gaji }}</span>
                        </div>
                    @endif
                    <div class="mb-4">
                        <strong class="block text-gray-700">Deskripsi Pekerjaan:</strong>
                        <p class="mt-2 text-gray-800 leading-relaxed">{{ $lowongan->deskripsi_pekerjaan }}</p>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('home') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali ke Daftar Lowongan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>