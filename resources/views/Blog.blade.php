<x-layout>
  <x-slot:title>Blog HMPS MI</x-slot:title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <section class="bg-white py-8">
    <div class="max-w-7xl mx-auto px-4">

      <!-- Judul -->
      <div class="text-center mb-8">
        <h2 class="text-4xl font-bold text-blue-800">📝 Blog HMPS MI</h2>
        <p class="text-lg text-gray-600 mt-2">Cerita kegiatan, inspirasi, dan info menarik dari kami!</p>
      </div>

      <!-- Tombol Tambah -->
      <div class="mb-4 text-right">
        <a href="{{ route('blogs.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
          ➕ Tambah Blog
        </a>
      </div>

      <!-- Konten Blog -->
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
        @foreach ($blogs as $blog)
          <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-transform duration-300 flex flex-col">
            
            <!-- Gambar -->
            <img src="{{ Storage::url($blog->gambar) }}" alt="{{ $blog->judul }}" class="w-full h-48 object-contain bg-gray-100">

            <!-- Konten -->
            <div class="p-4 text-center flex-grow flex flex-col justify-center">
              <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $blog->judul }}</h3>
              <h4 class="text-sm text-blue-600 mb-2">
                <a href="{{ route('blogs.byKategori', ['kategori' => $blog->kategori]) }}" class="hover:underline">
                  {{ $blog->kategori ?? 'Tanpa Kategori' }}
                </a>
              </h4>
              <p class="text-sm text-gray-500">
                {{ \Illuminate\Support\Str::limit(strip_tags($blog->isi), 100) }}
              </p>

              <!-- Tombol Baca Selengkapnya -->
              <a href="{{ route('blogs.show', $blog->id) }}" class="text-sm text-blue-500 hover:underline mt-2">Baca selengkapnya</a>
            </div>

            <!-- Tombol Aksi -->
            <div class="p-2 flex justify-between bg-gray-50 border-t border-gray-200">
              <a href="{{ route('blogs.edit', $blog->id) }}"
                 class="text-yellow-500 hover:text-yellow-600 font-medium text-sm">✏️ Edit</a>

              <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                    onsubmit="return confirm('Yakin ingin menghapus blog ini?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="text-red-500 hover:text-red-600 font-medium text-sm">🗑️ Hapus</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>

    </div>
  </section>
</x-layout>