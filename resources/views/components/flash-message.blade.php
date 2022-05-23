@if (session()->has('message'))
    <div class="fixed bg-laravel top-0 left-1/2 -translate-x-1/2 transform px-48 py-3 text-white">
        <p class="text-sm">{{ session()->get('message') }}</p>
    </div>
@endif
