<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if (count($schools))
        @foreach ($schools as $school)

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-between mb-5">
                    <h1 class="font-semibold text-xl">{{ $school->name }}</h1>
                </div>

                <table class="w-full">
                        <thead>
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4">Nom</td>
                                <td class="whitespace-nowrap px-6 py-4">CIN</td>
                                <td class="whitespace-nowrap px-6 py-4">PPR</td>
                                <td class="whitespace-nowrap px-6 py-4">N. absences</td>
                                <td class="whitespace-nowrap px-6 py-4"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($school->profs as $prof)
                                <tr class="border dark:border-neutral-500">

                                    <td class="whitespace-nowrap px-6 py-4">{{ $prof->f_name }} {{ $prof->l_name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $prof->cni }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $prof->ppr }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ count($prof->absences) }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <form action="{{ route('absences.index', $prof->id) }}" >
                                                <button class="p-0 text-white font-bold border px-2 bg-black">
                                                    Gérer les absences
                                                </button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
            @else
                <div class="flex justify-center">
                    Il n'y a pas des directeurs!
                </div>
            @endif
    </div>
</div>

{{-- <x-modal name="create-absence" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <x-absence-form></x-absence-form>
</x-modal> --}}

{{-- <x-flash-message class="{{ session('status') == 1 ? 'bg-green-600' : 'bg-red-600' }}" >
    @if (session('status') == 1)
        <x-icons.check-circle />
    @elseif (session('status') == 0)
        <x-icons.ban />
    @endif
</x-flash-message> --}}
