<header class="w-full lg:max-w-4xl md:max-w-[735px] text-sm mb-6">
    @if (Route::has('login'))
        <nav class="flex items-center justify-end gap-4">
            @auth
                <a
                    href="{{ url('/urls') }}"
                    class="inline-block px-5 py-1.5 border-[#9ad268] hover:border-[#e1ef8e] border rounded-sm text-sm"
                >
                    Shorten URL
                </a>
            @else
                <a
                    href="{{ route('login') }}"
                    class="inline-block px-5 py-1.5 hover:border-[#9ad268] border border-transparent rounded-sm text-sm"
                >
                    Log in
                </a>

                @if (Route::has('register'))
                    <a
                        href="{{ route('register') }}"
                        class="inline-block px-5 py-1.5 border-[#9ad268] hover:border-[#e1ef8e] border rounded-sm text-sm">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif
</header>