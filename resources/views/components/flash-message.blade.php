@if (session()->has('msg'))
    <div class="fixed top-0 transform bg-laravel text-white px-48 py-3 left-1/2 -translate-x-1/2">
        <p>
            {{session('msg')}}
        </p>
    </div>
@endif