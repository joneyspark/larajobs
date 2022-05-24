@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
        class="bg-laravel fixed top-0 left-1/2 -translate-x-1/2 transform px-48 py-3 text-white">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
