<div class="h-full w-1/4 flex-auto fixed z-1 top-0 left-0 p-4 bg-gray-50">
    <p class="text-[12px] md:text-base lg:text-xl mb-4">URL Shortener</p>
    <a href="{{ route('urls.index') }}" class="{{ Route::is('urls.*') ? 'bg-[#9ad268]' : 'bg-[#b7de88]' }} block text-[10px] md:text-sm lg:text-sm text-white p-[10px] rounded-md mb-2 hover:bg-[#9ad268]">Shorten URL</a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="absolute bottom-0 left-0 block text-sm bg-gray-200 p-[10px] w-full hover:bg-gray-300 active:bg-gray-300">Logout</button>
    </form>
</div>
