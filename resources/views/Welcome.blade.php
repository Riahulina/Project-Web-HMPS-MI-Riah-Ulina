<x-layout>
  {{-- <x-slot:title>HMPS Manajemen Informatika</x-slot:title> --}}
  @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    'resources/js/Eksternal.js'  
  ]) {{-- Tambah file JS baru --}}
  
  <!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


  <!-- HERO SECTION -->
  <section class="w-screen h-[90vh] bg-gradient-to-r from-blue-50 to-purple-100 flex flex-col md:flex-row items-center justify-between">
    <!-- KIRI -->
    <div class="w-full md:w-1/2 h-full flex flex-col justify-center items-start px-20 text-left animate-fade-in">
      <p class="text-sm uppercase tracking-widest text-blue-600 mb-2">Himpunan Mahasiswa Program Studi</p>
      <h1 class="text-4xl md:text-4xl font-bold mb-4 text-blue-900">Selamat Datang di HMPS Manajemen Informatika</h1>
      <p class="text-lg md:text-xl mb-4 text-gray-700">Mari bersama membangun semangat mahasiswa dan menciptakan perubahan yang positif.</p>
      <p class="italic text-gray-600 mt-2">"Bersama kita kuat, bersama kita hebat!"</p>
      <div class="flex gap-4 mt-6">
        <a href="https://www.instagram.com/official.polmed?igsh=MXZsY2gzNDhhaHN6ZQ==" target="_blank"
           class="hover-trigger px-6 py-3 rounded-full font-semibold shadow-md transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl bg-gradient-to-r from-blue-500 to-indigo-500 text-white flex items-center gap-2">
          <i class="fab fa-instagram"></i> Official Polmed
        </a>
      
        <a href="https://www.instagram.com/mipolmed?igsh=azZkZDdjZGxsY290" target="_blank"
           class="hover-trigger px-6 py-3 rounded-full font-semibold shadow-md transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl bg-gradient-to-r from-green-500 to-teal-500 text-white flex items-center gap-2">
          <i class="fab fa-instagram"></i> MI Polmed
        </a>
      
        <a href="https://www.tiktok.com/@mipolmed?_t=ZS-8yShNGyRCNc&_r=1" target="_blank"
           class="hover-trigger px-6 py-3 rounded-full font-semibold shadow-md transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl bg-gradient-to-r from-purple-500 to-pink-500 text-white flex items-center gap-2">
          <i class="fab fa-tiktok"></i> MI Polmed
        </a>
      </div>
      
      
    </div>

    <!-- KANAN -->
    <div class="w-full md:w-1/2 h-full relative overflow-hidden flex justify-center items-center px-4">
      <div class="relative w-[90%] h-[90%] rounded-2xl shadow-2xl overflow-hidden group transition-all duration-700 ease-in-out"
           onmouseenter="startImageRotation()"
           onmouseleave="stopImageRotation()">
        <div id="heroImage"
             class="absolute inset-0 bg-cover bg-center transition-all duration-700 ease-in-out scale-100 group-hover:scale-105 rounded-2xl"
             style="background-image: url('{{ asset('images/hmps1.jpeg') }}');">
        </div>
        <div class="absolute inset-0 bg-opacity-20 z-10 rounded-2xl"></div>
      </div>
    </div>
  </section>

  <!-- FADE IN ANIMATION -->
  <style>
    .animate-fade-in {
      animation: fadeIn 1s ease-in-out forwards;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</x-layout>
