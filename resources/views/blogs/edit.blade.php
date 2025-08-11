<x-layout>
<!-- resources/views/blogs/edit.blade.php -->

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-4">Edit Blog</h1>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="judul" class="block font-medium">Judul:</label>
            <input type="text" name="judul" id="judul" value="{{ $blog->judul }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="kategori" class="block font-medium">Kategori:</label>
            <input type="text" name="kategori" id="kategori" value="{{ $blog->kategori }}" class="w-full border border-gray-300 rounded px-3 py-2">
        </div>

        <div>
            <label for="isi" class="block font-medium">Isi:</label>
            <textarea name="isi" id="isi" class="w-full border border-gray-300 rounded px-3 py-2">{{ $blog->isi }}</textarea>
        </div>

        <div>
            <label for="gambar" class="block font-medium">Ganti Gambar (opsional):</label>
            <input type="file" name="gambar" id="gambar">
            <p class="text-sm text-gray-500 mt-1">Gambar saat ini: {{ $blog->gambar }}</p>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection


</x-layout>