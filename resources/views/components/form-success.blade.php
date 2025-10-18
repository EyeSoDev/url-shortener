@if (session('success'))
    <div class="border-green-300 border rounded-md bg-green-50 text-green-500 p-2 mb-2">
        {{ session('success') }}
    </div>
@endif
