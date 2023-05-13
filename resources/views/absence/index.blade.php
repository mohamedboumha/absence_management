<x-app-layout>
    <div class="py-12">
       <x-container>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-5">
                        <h1 class="font-semibold text-xl">Professeurs {{ $prof[0]->l_name }}</h1>

                        <a class="bg" x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-absence')">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 disabled:bg-gray-400">
                                Ajouter
                            </button>
                        </a>
                    </div>

                    @if (count($absences))
                     <x-table :heads="['Début', 'Fin', 'Statut', 'Justification', '']">
                    </thead>
                        @foreach ($absences as $absence)
                        <tr class="border dark:border-neutral-500">

                            <td class="whitespace-nowrap px-6 py-4">{{ $absence->start }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $absence->end }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $absence->status }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                @if ($absence->justification)
                                    {{ $absence->justification }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 flex items-center justify-center">
                                <form method="post" action="{{ route('absences.destroy', ['absence'=>$absence, 'id'=>$prof[0]->id]) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="p-0 text-white font-bold border px-2 bg-red-500">
                                        Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </x-table>
                    @else
                        <div class="flex justify-center">
                            Il n'y a pas des directeurs!
                        </div>
                    @endif

                    </table>
                </div>
       </x-container>

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
