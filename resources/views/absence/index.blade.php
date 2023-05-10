<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-5">
                        <h1 class="font-semibold text-xl">Professeurs {{ $prof[0]->l_name }}</h1>

                        <a class="bg" x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-absence')">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 disabled:bg-gray-400">
                                Ajouter
                            </button>
                        </a>
                    </div>

                    <table class="w-full">
                        <thead>
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4">Début</td>
                                <td class="whitespace-nowrap px-6 py-4">Fin</td>
                                <td class="whitespace-nowrap px-6 py-4">Statut</td>
                                <td class="whitespace-nowrap px-6 py-4">Justification</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absences as $absence)
                            <tr class="border dark:border-neutral-500">

                                <td class="whitespace-nowrap px-6 py-4">{{ $absence->start }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $absence->end }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $absence->status == 0 ? "Justifié" : "Injustifié" }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if ($absence->justification)
                                        {{ $absence->justification }}
                                    @else
                                        -
                                    @endif
                                </td>
                                {{-- <td class="whitespace-nowrap px-6 py-4">{{ count($absence->absences) }}</td> --}}
                                {{-- <td class="whitespace-nowrap px-6 py-4">
                                    <form action="{{ route('absence.index', $absence->id) }}" >
                                            <button class="p-0 text-white font-bold border px-2 bg-black">
                                                Gérer les absences
                                            </button>
                                        </form>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-modal name="create-absence" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <x-absence-form id="{{ $prof[0]->id }}"></x-absence-form>
</x-modal>

<x-flash-message class="{{ session('status') == 1 ? 'bg-green-600' : 'bg-red-600' }}" >
    @if (session('status') == 1)
        <x-icons.check-circle />
    @elseif (session('status') == 0)
        <x-icons.ban />
    @endif
</x-flash-message>
