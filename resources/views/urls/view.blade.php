<x-layout>
    <x-sidebar />

    <div class="h-dvh w-3/4 flex-auto fixed top-0 right-0 box-border p-4">
        <main class="h-full w-full p-4 border-gray-200 border rounded-lg shadow-lg">
            <div class="mb-2 flex justify-between flex-1">
                <p class="font-black">View Shoten URL </p>
                <a href="{{ route('urls.index') }}" class="bg-[#9ad268] p-2 text-white text-sm border rounded-md">Back</a>
            </div>

            <div class="grid grid-cols-4 p-4 mb-4 bg-green-50 border-gray-100 border rounded-md">
                <div class="mb-2 col-span-3">
                    <h1 class="text-xl font-bold">{{ $url->title }}</h1>
                </div>
                <div class="col-span-1 row-span-4 justify-self-end">
                    <button 
                        onclick="copyLinkToClipboard({{ $url->id }})"
                        class="p-2 text-white bg-gray-400 border-gray-700 border rounded-tl-lg rounded-br-lg text-xs"
                    >
                        Copy
                    </button>
                    <a 
                        href="{{ route('urls.edit', $url->id) }}"
                        class="p-2 mx-1 text-white bg-orange-400 border-orange-700 border rounded-tl-lg rounded-br-lg text-xs"
                    >
                        Edit
                    </a>
                    <form action="{{ route('urls.destroy', $url->id) }}" method="POST" class="mx-1 inline">
                        @csrf
                        @method("DELETE")
                        <button 
                            type="submit" 
                            onclick="return confirm('Are you sure you want to delete this shorten UTL?');" 
                            class="p-2 text-white bg-red-400 border-red-700 border rounded-tl-lg rounded-br-lg text-xs"
                        >
                            Delete
                        </button>
                    </form>
                </div>
                <div class="mb-2 col-span-3">
                    <a
                        id="shorten-url-{{ $url->id }}"
                        class="block truncate hover:underline text-base font-bold text-[#9ad268]" 
                        target="_blank" 
                        href="{{ url($url->back_half) }}">
                        {{ $url->domain.'/'.$url->back_half }}
                    </a>
                </div>
                <div class="mb-2 col-span-3">
                    <a 
                        class="block truncate hover:underline text-sm font-thin overflow-hidden whitespace-nowrap text-ellipsis" 
                        target="_blank" 
                        href="{{ $url->destination_url }}">
                        {{ $url->destination_url }}
                    </a>
                    </div>
                <div class="col-span-3">
                    <div class="flex flex-row gap-2 font-thin">
                        <p class="text-sm text-gray-400">{{ $url->clicks }} Click</p>
                        <p class="text-sm text-gray-400">{{ $url->created_at->format('d-M-Y') }}</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        function copyLinkToClipboard(id) {
            const linkId = 'shorten-url-' + id;
            const textToCopy = document.getElementById(linkId).href;

            navigator.clipboard.writeText(textToCopy)
            .then(() => {
                alert('Text copied to clipboard!');
            })
            .catch(err => {
                console.error('Failed to copy text: ', err);
                alert('Failed to copy text. Please try again or copy manually.');
            });
        }
    </script>
</x-layout>