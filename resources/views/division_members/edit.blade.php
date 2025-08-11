<x-layout>
    <div class="max-w-3xl mx-auto bg-blue-50 rounded-xl shadow-lg p-8 mt-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Edit Anggota - {{ $member->name }}
        </h2>

        <form action="{{ route('division_members.update', [$division, $member]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                <input type="text" name="name" value="{{ old('name', $member->name) }}" required
                       class="w-full border-gray-300 rounded-lg p-3">
            </div>

            <!-- Posisi -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Posisi</label>
                <select name="role" id="role" class="w-full rounded-lg p-3">
                    <option value="Kepala Divisi" {{ $member->role == 'Kepala Divisi' ? 'selected' : '' }}>Kepala Divisi</option>
                    <option value="Ketua Tim" {{ $member->role == 'Ketua Tim' ? 'selected' : '' }}>Ketua Tim</option>
                    <option value="Anggota" {{ $member->role == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                </select>
            </div>

            <!-- Nomor Tim / Nama Tim -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Tim</label>
                <input type="number" name="team_number" min="1" value="{{ old('team_number', $member->team_number) }}" class="w-full rounded-lg p-3">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Tim (opsional)</label>
                <input type="text" name="team_name" value="{{ old('team_name', $member->team_name) }}" class="w-full rounded-lg p-3">
            </div>

            <!-- Foto -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
                @if($member->image)
                    <img src="{{ asset('storage/' . $member->image) }}" class="w-24 h-24 rounded-full mb-3">
                @endif
                <input type="file" name="image" class="w-full">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('divisions.show', $division) }}" class="px-4 py-2 bg-gray-300 rounded">Batal</a>
                <button type="submit" class="px-5 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </div>
        </form>
    </div>
</x-layout>
