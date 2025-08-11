<x-layout>
    <div class="max-w-6xl mx-auto px-4 py-8">
        <!-- Judul Divisi -->
        <h1 class="text-4xl font-bold text-gray-800 text-center mb-2">{{ $division->name }}</h1>
        <p class="text-gray-600 text-center mb-6">{{ $division->description }}</p>

        <!-- Gambar Divisi -->
        @if($division->image)
            <div class="flex justify-center mb-8">
                <img src="{{ asset('storage/' . $division->image) }}" 
                     alt="Gambar {{ $division->name }}" 
                     class="w-full max-w-3xl max-h-[400px] object-cover rounded-xl shadow-lg">
            </div>
        @endif

        <!-- Tombol Tambah Anggota -->
        <div class="text-center mb-8">
            <a href="{{ route('division_members.create', $division->id) }}" 
               class="inline-block px-5 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
               + Tambah Anggota
            </a>
        </div>

        <!-- Kepala Divisi -->
        @if($kepala)
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Kepala Divisi</h2>
            <div class="flex flex-wrap justify-center gap-6">
                <div class="bg-blue-50 rounded-xl shadow-lg p-6 max-w-xs text-center">
                    @if($kepala->image)
                        <img src="{{ asset('storage/' . $kepala->image) }}" 
                             alt="{{ $kepala->name }}" 
                             class="w-32 h-32 object-cover rounded-full mx-auto mb-4 border-4 border-blue-500">
                    @endif
                    <h3 class="text-lg font-semibold">{{ $kepala->name }}</h3>
                    <p class="text-gray-500">
                        {{ $kepala->role }}
                        @if($kepala->team_name) ({{ $kepala->team_name }}) @endif
                    </p>

                    <!-- Tombol Edit & Hapus -->
                    <div class="flex justify-center gap-2 mt-4">
                        <a href="{{ route('division_members.edit', [$division->id, $kepala->id]) }}" 
                           class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('division_members.destroy', [$division->id, $kepala->id]) }}" method="POST" onsubmit="return confirm('Yakin hapus anggota ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        @endif

        <!-- Ketua Tim (otomatis semua ketua) -->
        @php
            $allKetua = $division->members->where('role', 'Ketua Tim')->sortBy('team_number');
        @endphp
        @if($allKetua->count() > 0)
        <section class="mb-10">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Ketua Tim</h2>
            <div class="grid md:grid-cols-2 gap-6">
                @foreach($allKetua as $ketua)
                    <div class="bg-blue-50 rounded-xl shadow-lg p-6 text-center">
                        @if($ketua->image)
                            <img src="{{ asset('storage/' . $ketua->image) }}" 
                                 alt="{{ $ketua->name }}" 
                                 class="w-28 h-28 object-cover rounded-full mx-auto mb-4 border-4 border-green-500">
                        @endif
                        <h3 class="text-lg font-semibold">{{ $ketua->name }}</h3>
                        <p class="text-gray-500">
                            {{ $ketua->role }}
                            @if($ketua->team_number) - Tim {{ $ketua->team_number }} @endif
                            <br>
                            @if($ketua->team_name) ({{ $ketua->team_name }}) @endif
                        </p>

                        <!-- Tombol Edit & Hapus -->
                        <div class="flex justify-center gap-2 mt-4">
                            <a href="{{ route('division_members.edit', [$division->id, $ketua->id]) }}" 
                               class="px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('division_members.destroy', [$division->id, $ketua->id]) }}" method="POST" onsubmit="return confirm('Yakin hapus anggota ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        @endif

        <!-- Anggota Tim (otomatis semua tim) -->
        <section>
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Anggota Tim</h2>
            <div class="grid md:grid-cols-2 gap-8">
                @foreach($division->members->where('role', 'Anggota Tim')->groupBy('team_number') as $teamNumber => $members)
                    <div>
                        <h3 class="text-xl font-semibold mb-3 text-blue-600 text-center">Tim {{ $teamNumber }}</h3>
                        <div class="flex flex-wrap justify-center gap-4">
                            @foreach($members as $anggota)
                                <div class="bg-blue-50 rounded-lg shadow p-4 w-40 text-center">
                                    @if($anggota->image)
                                        <img src="{{ asset('storage/' . $anggota->image) }}" 
                                             alt="{{ $anggota->name }}" 
                                             class="w-20 h-20 object-cover rounded-full mx-auto mb-2 border-2 border-blue-400">
                                    @endif
                                    <p class="font-medium">{{ $anggota->name }}</p>
                                    @if($anggota->team_name)
                                        <p class="text-gray-500 text-sm">{{ $anggota->team_name }}</p>
                                    @endif

                                    <!-- Tombol Edit & Hapus -->
                                    <div class="flex justify-center gap-1 mt-3">
                                        <a href="{{ route('division_members.edit', [$division->id, $anggota->id]) }}" 
                                           class="px-2 py-1 text-xs bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
                                        <form action="{{ route('division_members.destroy', [$division->id, $anggota->id]) }}" method="POST" onsubmit="return confirm('Yakin hapus anggota ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-2 py-1 text-xs bg-red-500 text-white rounded hover:bg-red-600">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
</x-layout>
