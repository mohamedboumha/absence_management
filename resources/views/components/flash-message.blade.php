@if (session()->has('message'))
    <div x-data="{ show: true }" @mouseover="show=true" @mouseover.away="setTimeout(() => show = false, 3000)"  x-show="show" {{ $attributes->merge(['class' => "fixed bottom-5 transform left-5 text-white px-6 py-3 flex justify-center items-center"]) }} >
        {{ $slot }}
        <p class="ml-2 font-extrabold text-lg">
           {{ session('message') }}
        </p>
    </div>
@endif
