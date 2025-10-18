<x-layout>
    <x-sidebar />

    <div class="h-dvh w-3/4 flex-auto fixed top-0 right-0 box-border p-4">
        <main class="h-full w-full p-4 border-gray-200 border rounded-lg shadow-lg">
            <div class="mb-2 flex justify-between flex-1">
                <p class="font-black">Edit Shoten URL </p>
                <a href="{{ route('urls.index') }}" class="bg-[#9ad268] p-2 text-white text-sm border rounded-md">Back</a>
            </div>

            <form method="POST" action="{{ route("urls.update") }}">
                <div class="grid grid-cols-2 gap-2">
                    <input name="id" type="hidden" value="{{ $url->id }}" />
                    @csrf
                    <div class="col-span-2">
                        <x-form-errors />
                    </div>
                    <div class="col-span-2 border-b-2 border-gray-300 mb-2">
                        <label class="font-thin">
                            Title
                            <input 
                            class="border-[#9ad268] hover:border-[#e1ef8e] border rounded-md p-2 w-full mt-1 mb-8 text-sm text-gray-600 font-thin placeholder:font-thin placeholder:text-gray-200 placeholder:text-sm"
                            type="text" 
                            name="title" 
                            value="{{ $url->title }}" />
                        </label>
                    </div>
                    <div class="col-span-2">
                        <p class="font-thin">Shorten URL</p>
                        <p class="w-full mt-1 mb-5 text-sm text-gray-600 font-thin">{{ config('app.domain') }}/{{ $url->back_half }}</p>
                    </div>
                    <div class="col-span-2">
                        <label class="font-thin">
                            Destination URL
                            <input 
                            class="w-full mt-1 mb-5 text-sm text-gray-600 font-thin"
                            type="url" 
                            name="destination_url" 
                            value="{{ $url->destination_url }}"
                            readonly />
                        </label>
                    </div>
                    <div class="col-span-2">
                        <button 
                        class="bg-[#9ad268] rounded-md p-2 w-full mb-4 text-white font-black"
                        type="submit">Update Shorten URL</button>
                    </div>
                </div>
            </form>
        </main>
    </div>
</x-layout>