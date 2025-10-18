<x-layout>
    <x-sidebar />

    <div class="h-dvh w-3/4 flex-auto fixed top-0 right-0 box-border p-4">
        <main class="h-full w-full p-4 border-gray-200 border rounded-lg shadow-lg">
            <div class="mb-8 flex justify-between flex-1">
                <p class="font-black">Create Shoten URL </p>
                <a href="{{ route('urls.index') }}" class="bg-[#9ad268] p-2 text-white text-sm border rounded-md">Back</a>
            </div>

            <form method="POST" action="{{ route("urls.store") }}">
                <div class="grid grid-cols-2 gap-2">
                    @csrf
                    <div class="col-span-2">
                        <x-form-errors />
                    </div>
                    <div class="col-span-2">
                        <label class="font-thin">
                            Title
                            <input 
                            class="border-[#9ad268] hover:border-[#e1ef8e] border rounded-md p-2 w-full mt-1 mb-8 text-sm text-gray-600 font-thin placeholder:font-thin placeholder:text-gray-200 placeholder:text-sm"
                            type="text" 
                            name="title" 
                            value="{{ old('title') }}"
                            placeholder="Example" />
                        </label>
                    </div>
                    <div class="col-span-2">
                        <label class="font-thin">
                            Destination URL
                            <input 
                            class="border-[#9ad268] hover:border-[#e1ef8e] border rounded-md p-2 w-full mt-1 mb-5 text-sm text-gray-600 font-thin placeholder:font-thin placeholder:text-gray-200 placeholder:text-sm"
                            type="url" 
                            name="destination_url" 
                            value="{{ old('destination_url') }}"
                            placeholder="https://example.com/my-long-url" />
                        </label>
                    </div>
                    <div>
                        <label class="font-thin">
                            Domain
                            <input 
                            class="border-[#9ad268] hover:border-[#e1ef8e] border rounded-md p-2 w-full mt-1 mb-5 text-sm border-gray-200 bg-gray-50 text-gray-500 shadow-none"
                            type="text" 
                            name="domain" 
                            value="{{ config('app.domain') }}"
                            readonly />
                        </label>
                    </div>
                    <div>
                        <label class="font-thin">
                            Back Half
                            <input 
                            class="border-[#9ad268] hover:border-[#e1ef8e] border rounded-md p-2 w-full mt-1 mb-5 text-sm text-gray-600 placeholder:font-thin placeholder:text-gray-200 placeholder:text-sm"
                            type="text" 
                            name="back_half" 
                            value="{{ old('back_half') }}"
                            placeholder="short" />
                        </label>
                    </div>
                    <div class="col-span-2">
                        <button 
                        class="bg-[#9ad268] rounded-md p-2 w-full mb-4 text-white font-black"
                        type="submit">Create Shorten URL</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</x-layout>