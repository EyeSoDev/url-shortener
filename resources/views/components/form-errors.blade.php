@if($errors->any())
    <div class="border-red-300 border rounded-md bg-red-50 text-red-500 p-2 mb-2">
        <ul>
            @foreach($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
