<x-layout>

@section('content')
    <h1>Edit Divisi</h1>

    <form method="POST" action="{{ route('divisi.update', $divisi->id) }}">
        @csrf @method('PUT')
        <input type="text" name="nama" value="{{ $divisi->nama }}">
        <button type="submit">Update</button>
    </form>
@endsection

</x-layout>