@props(['href'])

<?php
    $isActive = request()->is(trim($href)); 
?>
<a href="{{ url($href) }}"
    class="px-3 py-2 text-[18px] font-medium rounded-md {{ $isActive ? 'bg-gray-700 text-white' : 'text-black hover:bg-gray-400 hover:text-white' }}">
    {{ $slot }}
</a>
