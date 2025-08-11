<x-layout>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @section('content')

  <div class="pt-32 pb-16 bg-white relative z-0">
    <!-- Judul & Deskripsi -->
    <div class="text-center max-w-4xl mx-auto px-4">
      <h2 class="text-2xl font-semibold text-indigo-600 uppercase">📚 HMPS MI Divisions</h2>
      <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Cerita di Balik Gerakan Kami 📸</h1>
      <p class="mt-6 text-lg text-gray-600 text-justify indent-8">
        Selamat datang di halaman Divisi HMPS Manajemen Informatika! Di sini, kami berbagi kisah dan dokumentasi kegiatan yang telah kami laksanakan, momen kebersamaan yang hangat, dan perjuangan seru di balik layar setiap program kerja.
      </p>
      <h2 class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-3xl">📌 Daftar Divisi HMPS MI ✨</h2>
    </div>

    <div class="mt-12 max-w-6xl mx-auto px-4">
      @if(session('success'))
        <div class="mb-4 p-4 rounded-md bg-green-100 text-green-800 font-medium">
          {{ session('success') }}
        </div>
      @endif

      {{-- MODE INDEX --}}
      @if(!isset($mode))
        <div class="flex justify-between items-center mb-6">
          <a href="{{ route('divisions.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">+ Tambah Divisi</a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
          @forelse ($divisions ?? [] as $division)
            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition overflow-hidden">
              @if($division->image)
                <img src="{{ asset('storage/' . $division->image) }}" class="w-full h-48 object-cover object-center" alt="Image">
              @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">
                  Tidak ada gambar
                </div>
              @endif

              <div class="p-4">
                <h3 class="text-lg font-semibold text-gray-800">{{ $division->name }}</h3>
                <p class="text-gray-600 text-sm mt-2 text-justify">
                    {{ \Illuminate\Support\Str::limit(strip_tags($division->description), 100) }}
                </p>
                
                <!-- Tombol Baca Selengkapnya -->
                <a href="{{ route('divisions.show', $division->id) }}" class="text-sm text-blue-500 hover:underline mt-2">
                    Baca selengkapnya
                </a>
            
                <div class="mt-4 flex justify-between text-sm">
                    <a href="{{ route('divisions.edit', $division->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                    <form action="{{ route('divisions.destroy', $division->id) }}" method="POST" onsubmit="return confirm('Yakin hapus divisi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </div>
              </div>
            </div>
          @empty
            <p class="text-gray-500">Tidak ada divisi.</p>
          @endforelse
        </div>

      {{-- MODE CREATE / EDIT --}}
      @elseif($mode === 'create' || $mode === 'edit')
        <h2 class="text-2xl font-bold mb-6">
          {{ $mode === 'create' ? 'Tambah Divisi Baru' : 'Edit Divisi' }}
        </h2>

        <form method="POST" action="{{ $mode === 'create' ? route('divisions.store') : route('divisions.update', $division->id) }}" class="space-y-6" enctype="multipart/form-data">
          @csrf
          @if($mode === 'edit')
            @method('PUT')
          @endif

          <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Divisi</label>
            <input type="text" name="name" value="{{ old('name', $division->name ?? '') }}" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
          </div>

          <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">{{ old('description', $division->description ?? '') }}</textarea>
          </div>

          <div>
            <label for="image" class="block text-sm font-medium text-gray-700">Gambar (opsional)</label>
            <input type="file" name="image" class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
            @if(isset($division) && $division->image)
              <img src="{{ asset('storage/' . $division->image) }}" class="w-32 h-auto rounded shadow mt-2">
            @endif
          </div>

          <div class="flex gap-3">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
            <a href="{{ route('divisions.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Batal</a>
          </div>
        </form>
      @endif
    </div>
  </div>

  @endsection
</x-layout>
