<x-layout>


@section('content')
    <h1>Tambah Divisi</h1>

    <form method="POST" action="{{ route('divisi.store') }}">
        @csrf
        <input type="text" name="nama" placeholder="Nama Divisi">
        <button type="submit">Simpan</button>
    </form>
@endsection

</x-layout>
