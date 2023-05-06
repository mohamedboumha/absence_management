<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Profs --}}
            {{-- <div class="bg-white mb-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-5">
                        <h1 class="font-semibold text-xl">Schools</h1>

                        <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-prof')">
                            Ajouter prof
                        </x-primary-button>
                    </div>

                    @if (count($profs))
                    <table class="w-full">
                        <thead>
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4">Nom & Prenom</td>
                                <td class="whitespace-nowrap px-6 py-4">PPR</td>
                                <td class="whitespace-nowrap px-6 py-4">CIN</td>
                                <td class="whitespace-nowrap px-6 py-4">Ecole</td>
                                <td class="whitespace-nowrap px-6 py-4"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profs as $prof)
                            <tr class="border dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4">{{ $prof->f_name }} {{ $prof->l_name }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $prof->ppr }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $prof->cni }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @foreach ($schools as $school)
                                        @if ($school->id == $prof->school_id)
                                            {{ $school->name }}
                                        @endif
                                    @endforeach
                                </td>
                                <form class="" method="post" action="{{ route('profs.destroy', $prof->id) }}">
                                        @csrf
                                        @method('delete')
                                        <td class="whitespace-nowrap px-6 py-4">
                                        <button class="text-white font-bold border px-2 bg-red-500">
                                            Supprimer
                                        </button>
                                    </td>
                                </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="flex justify-center">
                        Il n'y a pas des professeurs!
                    </div>
                @endif
            </div>
            </div> --}}

            {{-- Directors --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-5">
                        <h1 class="font-semibold text-xl">Directors</h1>

                        <a class="bg" x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-director')">
                            <x-primary-button>Ajouter directeur</x-primary-button>
                        </a>
                    </div>


                    @if (count($directors))
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <td class="whitespace-nowrap px-6 py-4">Nom</td>
                                    <td class="whitespace-nowrap px-6 py-4">Email</td>
                                    <td class="whitespace-nowrap px-6 py-4">CIN</td>
                                    <td class="whitespace-nowrap px-6 py-4">PPR</td>
                                    <td class="whitespace-nowrap px-6 py-4"></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($directors as $director)
                                <tr class="border dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-4">{{ $director->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $director->email }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $director->cni }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $director->ppr }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <form method="post" action="{{ route('directors.destroy', $director->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="p-0 text-white font-bold border px-2 bg-red-500">
                                                Supprimer
                                            </button>
                                        </form>
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

{{-- Director Modal --}}
<x-modal name="create-director" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <x-director-form></x-director-form>
</x-modal>

{{-- Prof Modal --}}
{{-- <x-modal name="create-prof" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <x-prof-form>
        <div>
            <x-input-label for="school" :value="__('Ecole')" />
            <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-2 w-full" name="school_id">
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('school')" class="mt-2" />
        </div>
    </x-prof-form>
</x-modal> --}}
