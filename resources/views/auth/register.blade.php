<x-layout>
    <div class="grid place-content-center w-full grow">
        <main class="justify-center md:max-w-[735px] w-full min-h-[515px] lg:max-w-4xl">
            <h3 class="text-center text-xl font-black mb-2">Create an account</h3>
            <p class="text-center text-gray-400 mb-6">Enter your details below to create your account</p>
            <form method="POST" action="{{ route("register") }}">
                    @csrf
                    <x-form-errors />
                    <label class="font-semibold">
                        Name:
                        <input 
                        class="border-[#9ad268] hover:border-[#e1ef8e] border rounded-md p-2 w-full block mt-1 mb-5 text-sm text-gray-600 font-thin placeholder:font-thin placeholder:text-gray-200 placeholder:text-sm"
                        type="text" 
                        name="name" 
                        value="{{ old('name') }}"
                        placeholder="Full name" />
                    </label>
                    <label class="font-semibold">
                        Email:
                        <input 
                        class="border-[#9ad268] hover:border-[#e1ef8e] border rounded-md p-2 w-full block mt-1 mb-5 text-sm text-gray-600 font-thin placeholder:font-thin placeholder:text-gray-200 placeholder:text-sm"
                        type="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        placeholder="email@example.com" />
                    </label>
                    <label class="font-semibold">
                        Username:
                        <input 
                        class="border-[#9ad268] hover:border-[#e1ef8e] border rounded-md p-2 w-full block mt-1 mb-5 text-sm text-gray-600 font-thin placeholder:font-thin placeholder:text-gray-200 placeholder:text-sm"
                        type="text" 
                        name="username" 
                        value="{{ old('username') }}"
                        placeholder="Username" />
                    </label>
                    <label class="font-semibold">
                        Password:
                        <input 
                        class="border-[#9ad268] hover:border-[#e1ef8e] border rounded-md p-2 w-full block mt-1 mb-8 text-sm text-gray-600 font-thin placeholder:font-thin placeholder:text-gray-200 placeholder:text-sm"
                        type="password" 
                        name="password" 
                        value="{{ old('password') }}"
                        placeholder="Password" />
                    </label>
                    <button 
                    class="bg-[#9ad268] rounded-md p-2 w-full mb-4 text-white font-black"
                    type="submit">Create account</button>
                    <p 
                    class="text-center text-gray-400">Already have an account? <a class="text-black font-black" href="{{ route("login") }}">Login</a>
                </form>
            </div>
        </main>
    </div>
</x-layout>
