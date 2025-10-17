<div class="h-full w-1/4 flex-auto fixed z-1 top-0 left-0 p-4 bg-gray-50">
    <p class="text-xl mb-4">URL Shortener</p>
    <a href="{{ route('dashboard') }}" class="block text-sm text-white p-[10px] bg-[#b7de88] rounded-md mb-2 hover:bg-[#9ad268] active:bg-[#9ad268]">Dashboard</a>
    <a href="#" class="block text-sm text-white p-[10px] bg-[#b7de88] rounded-md mb-2 hover:bg-[#9ad268] active:bg-[#9ad268]">Shorten URL</a>

    {{-- {{ Auth::user()->name }} --}}
    {{-- <div class="relative"> --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="absolute bottom-0 left-0 block text-sm bg-gray-200 p-[10px] w-full hover:bg-gray-300 active:bg-gray-300">Logout</button>
        </form>
    {{-- </div> --}}
</div>
