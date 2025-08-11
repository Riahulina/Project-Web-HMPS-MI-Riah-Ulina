<x-layout>
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg p-8 mt-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Tambah Anggota untuk {{ $division->name }}
        </h2>

        <form action="{{ route('division_members.store', $division) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nama -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                <input type="text" name="name" 
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 p-3" 
                    placeholder="Masukkan nama anggota" required>
            </div>

            <!-- Posisi -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Posisi</label>
                <select name="role" id="role" 
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 p-3" 
                    required>
                    <option value="">-- Pilih Posisi --</option>
                    <option value="Kepala Divisi">Kepala Divisi</option>
                    <option value="Ketua Tim">Ketua Tim</option>
                    <option value="Anggota Tim">Anggota Tim</option>
                </select>
            </div>

            <!-- Nomor Tim -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nomor Tim <span class="text-gray-500 text-sm">(Kosongkan jika Kepala Divisi)</span>
                </label>
                <input type="number" name="team_number" min="1" 
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 p-3" 
                    placeholder="1, 2, dst">
            </div>

            <!-- Nama Tim -->
            <div id="teamNameField">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nama Tim <span class="text-gray-500 text-sm">(Opsional untuk Ketua Tim / Anggota Tim)</span>
                </label>
                <input type="text" name="team_name" 
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 p-3" 
                    placeholder="Contoh: Tim Sales">
            </div>

            <!-- Foto -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
                <input type="file" name="image" 
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 p-2 bg-white">
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end">
                <button type="submit" 
                    class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
                    Simpan
                </button>
            </div>
        </form>
    </div>

    {{-- Load file JS eksternal --}}
    <script src="{{ asset('js/external.js') }}"></script>
</x-layout>
