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
                    <div class="mb-4">
                        <h3 class="text-lg font-semibold">{{ $lowongan->judul_pekerjaan }}</h3>
                    </div>
                    <div class="mb-4">
                        <strong>Perusahaan:</strong> {{ $lowongan->nama_perusahaan }}
                    </div>
                    <div class="mb-4">
                        <strong>Lokasi:</strong> {{ $lowongan->lokasi }}
                    </div>
                    @if ($lowongan->gaji)
                        <div class="mb-4">
                            <strong>Gaji:</strong> {{ $lowongan->gaji }}
                        </div>
                    @endif
                    <div class="mb-4">
                        <strong>Deskripsi:</strong>
                        <p class="mt-2">{{ $lowongan->deskripsi_pekerjaan }}</p>
                    </div>
                    @if ($lowongan->logo_perusahaan)
                        <div class="mb-4">
                            <strong>Logo Perusahaan:</strong><br>
                            <img src="{{ asset($lowongan->logo_perusahaan) }}" alt="Logo Perusahaan" class="mt-2 max-w-xs h-auto rounded-md">
                        </div>
                    @endif

                    <div class="mt-6 flex space-x-2">
                        <a href="{{ route('lowongan.edit', $lowongan->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <form action="{{ route('lowongan.destroy', $lowongan->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Hapus
                            </button>
                        </form>
                        <a href="{{ route('lowongan.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>