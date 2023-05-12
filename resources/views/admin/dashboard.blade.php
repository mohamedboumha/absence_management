<x-app-layout>
@if (count($weekDays) > 1)

    @include('components.dashboard.handle-absences')

@else

    @include('components.dashboard.handle-dashboard')
    
@endif
</x-app-layout>

{{-- Modals --}}
<x-flash-message class="{{ session('status') == 1 ? 'bg-green-600' : 'bg-red-600' }}" >
    @if (session('status') == 1)
        <x-icons.check-circle />
    @elseif (session('status') == 0)
        <x-icons.ban />
    @endif
</x-flash-message>
