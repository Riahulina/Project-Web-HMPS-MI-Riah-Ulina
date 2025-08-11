<x-layout>

    @section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <img src="{{ Storage::url($blog->gambar) }}" alt="{{ $blog->judul }}" class="w-full h-64 object-contain mb-4 bg-gray-100">
    
        <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $blog->judul }}</h1>
    
        <h4 class="text-sm text-blue-600 mb-4">{{ $blog->kategori ?? 'Tanpa Kategori' }}</h4>
    
        <div class="text-gray-700 leading-relaxed">
            {!! nl2br(e($blog->isi)) !!}
        </div>
    
        <a href="{{ route('blogs.index') }}" class="inline-block mt-6 text-blue-500 hover:underline">← Kembali ke daftar</a>
    </div>
    @endsection
    
</x-layout>