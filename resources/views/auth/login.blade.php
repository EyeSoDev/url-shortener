<x-layout>
    <div class="grid place-content-center w-full grow">
    <main class="justify-center md:max-w-[735px] w-full min-h-[515px] lg:max-w-4xl">
        <h3 class="text-center text-xl font-black mb-2">Login to your account</h3>
        <p class="text-center text-gray-400 mb-6">Enter your username and password below to log in</p>
        <form method="POST" action="{{ route('login.attempt') }}">
            @csrf
            <x-form-errors />
            <label class="font-semibold">
                Username:
                <input 
                class="border-[#9ad268] hover:border-[#e1ef8e] border rounded-md p-2 w-full block mt-1 mb-5 placeholder:font-thin placeholder:text-gray-300 placeholder:text-sm"
                type="text" 
                name="username" 
                value="{{ old('username') }}"
                placeholder="Username" />
            </label>
            <label class="font-semibold">
                Password:
                <input 
                class="border-[#9ad268] hover:border-[#e1ef8e] border rounded-md p-2 w-full block mt-1 mb-8 placeholder:font-thin placeholder:text-gray-300 placeholder:text-sm"
                type="password" 
                name="password" 
                value="{{ old('password') }}"
                placeholder="Password" />
            </label>
            <button 
            class="bg-[#9ad268] rounded-md p-2 w-full mb-4 text-white font-black"
            type="submit">Login</button>
            <p 
            class="text-center text-gray-400">Don't have an account? <a class="text-black font-black" href="{{ route("register") }}">Sign up</a>
        </form>
    </div>
</main>
</div>
</x-layout>
