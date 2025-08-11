<x-layout>
  {{-- <x-slot:title>Tentang HMPS Manajemen Informatika</x-slot:title> --}}
  @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/Eksternal.js']) {{-- Tailwind, Js Ekternal --}}
  
  <!-- ABOUT SECTION -->
  <div class="relative isolate bg-white px-8 py-12 sm:py-3 lg:px-2">
    <div class="absolute inset-x-0 -top-6 -z-10 transform-gpu overflow-hidden px-36 blur-3xl" aria-hidden="true">
      <div class="mx-auto aspect-1155/678 w-288.75 bg-linear-to-tr from-blue-50 to-[#9089fc] opacity-30"
        style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
      </div>
    </div>

    <!-- Judul -->
    <div class="text-center mb-16 animate-fade-in">
      <h2 class="text-5xl font-extrabold text-blue-900 mb-4 drop-shadow">About HMPS MI</h2>
      <p class="text-xl text-gray-700 max-w-2xl mx-auto">
        Himpunan Mahasiswa Program Studi Manajemen Informatika adalah rumah aspirasi, kolaborasi, dan inovasi mahasiswa dalam membangun lingkungan kampus yang aktif dan berdaya.
      </p>
    </div>

    <!-- Visi Misi -->
    <div class="max-w-5xl mx-auto grid md:grid-cols-2 gap-10 mb-10 animate-fade-in">
      <div class="bg-white rounded-2xl p-6 shadow-xl border border-purple-100 hover:shadow-2xl transition">
        <h3 class="text-2xl font-bold text-purple-700 mb-4">Visi</h3>
        <p class="text-gray-700 italic">"Mewujudkan mahasiswa MI yang aktif, inovatif, dan berdaya saing di era digital."</p>
      </div>
      <div class="bg-white rounded-2xl p-6 shadow-xl border border-purple-100 hover:shadow-2xl transition">
        <h3 class="text-2xl font-bold text-purple-700 mb-4">Misi</h3>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
          <li>Mengembangkan potensi mahasiswa.</li>
          <li>Meningkatkan solidaritas antar anggota.</li>
          <li>Menjadi jembatan komunikasi ke prodi.</li>
          <li>Menumbuhkan budaya kreatif dan kolaboratif.</li>
        </ul>
      </div>
    </div>

    <!-- Struktur Organisasi -->
    <div class="mb-20 text-center animate-fade-in">
      <h3 class="text-3xl font-semibold text-blue-800 mb-6">Struktur Organisasi</h3>
      <div class="overflow-x-auto">
        <div class="flex justify-center items-start">
          <div class="w-[800px] bg-white rounded-xl shadow-lg p-6 border border-purple-100">
            <div class="flex flex-col items-center gap-6 relative">
              <button onclick="showModal('ketua')" class="bg-blue-500 text-white px-6 py-3 rounded-full font-semibold shadow hover:bg-blue-600 transition">Ketua HMPS</button>
              <div class="w-1 h-6 bg-gray-300"></div>
              <div class="flex flex-col items-center gap-6 relative">
                <button onclick="showModal('wakil_ketua')" class="bg-blue-500 text-white px-6 py-3 rounded-full font-semibold shadow hover:bg-blue-600 transition">Wakil Ketua HMPS</button>
                <div class="w-1 h-6 bg-gray-300"></div>
                <div class="flex justify-center gap-8">
                  <button onclick="showModal('ctrl')" class="bg-purple-500 text-white px-4 py-2 rounded-full shadow text-sm hover:bg-purple-600">Control Internal</button>
                  <button onclick="showModal('sekretaris')" class="bg-purple-500 text-white px-4 py-2 rounded-full shadow text-sm hover:bg-purple-600">Sekretaris</button>
                  <button onclick="showModal('bendahara')" class="bg-purple-500 text-white px-4 py-2 rounded-full shadow text-sm hover:bg-purple-600">Bendahara</button>
                </div>
                <div class="w-1 h-6 bg-gray-300"></div>
                <div class="grid grid-cols-2 gap-6">
                  <button onclick="showModal('inter')" class="bg-green-500 text-white px-4 py-2 rounded-full shadow text-sm hover:bg-green-600">Kadiv Internal</button>
                  <button onclick="showModal('ekster')" class="bg-green-500 text-white px-4 py-2 rounded-full shadow text-sm hover:bg-green-600"> Kadiv Eksternal</button>
                  <button onclick="showModal('psdm')" class="bg-green-500 text-white px-4 py-2 rounded-full shadow text-sm hover:bg-green-600">Kadiv PSDM</button>
                  <button onclick="showModal('bd')" class="bg-green-500 text-white px-4 py-2 rounded-full shadow text-sm hover:bg-green-600">Kadiv Business Development</button>
                  <button onclick="showModal('iptk')" class="bg-green-500 text-white px-4 py-2 rounded-full shadow text-sm hover:bg-green-600">Kadiv IPTEK</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div id="modal" class="fixed inset-0 z-50 bg-black bg-opacity-50 hidden items-center justify-center">
      <div class="bg-white p-6 rounded-2xl shadow-lg max-w-sm relative">
        <button onclick="closeModal()" class="absolute top-2 right-2 text-gray-600 hover:text-red-600">&times;</button>
        <img id="modalImage" src="" alt="Foto Struktur" class="w-full h-64 object-cover rounded-xl mb-4">
        <h4 id="modalTitle" class="text-xl font-bold text-blue-800"></h4>
      </div>
    </div>

    <!-- Quote -->
    <div class="text-center text-blue-800 font-bold text-xl italic animate-fade-in">"Bersama kita kuat, bersama kita hebat!"</div>

  </div>

  <!-- ANIMASI -->
  <style>
    .animate-fade-in {
      animation: fadeIn 1.2s ease-in-out both;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</x-layout>
