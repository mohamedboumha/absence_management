<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mb-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-5">
                        <h1 class="font-semibold text-xl">Directeurs</h1>

                        <a class="bg" x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-director')">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 disabled:bg-gray-400">
                                Ajouter
                            </button>
                        </a>
                    </div>

                    @if (count($directors))
                    <table class="w-full">
                        <thead>
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4">PPR</td>
                                <td class="whitespace-nowrap px-6 py-4">Nom</td>
                                <td class="whitespace-nowrap px-6 py-4">Email</td>
                                <td class="whitespace-nowrap px-6 py-4">CNI</td>
                                <td class="whitespace-nowrap px-6 py-4">Travailler dans</td>
                                <td class="whitespace-nowrap px-6 py-4"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($directors as $director)
                            <tr class="border dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4">{{ $director->ppr }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $director->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $director->email }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $director->cni }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    {{ count($director->schools) }} école
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 flex items-center justify-center">
                                    <form method="post" action="{{ route('directors.destroy', $director->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="p-0 text-white font-bold border px-2 bg-red-500">
                                            Supprimer
                                        </button>
                                    </form>
                                    {{-- <a href="{{ route('directors.edit', $director->id) }}" class="p-0 text-white font-bold border px-2 bg-green-600">
                                            Modifier
                                    </a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="flex justify-center">
                        Il n'y a pas des directeurs!
                    </div>
                @endif
            </div>
        </div>
        </div>
    </div>
</x-app-layout>

<x-modal name="create-director" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <x-director-form>
        <div>
            <x-input-label for="director" :value="__('Directeur')" />
            <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-2 w-full" name="school_id">
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('school_id')" class="mt-2" />
        </div>
    </x-director-form>
</x-modal>

<x-flash-message class="{{ session('status') == 1 ? 'bg-green-600' : 'bg-red-600' }}" >
    @if (session('status') == 1)
        <x-icons.check-circle />
    @elseif (session('status') == 0)
        <x-icons.ban />
    @endif
</x-flash-message>
