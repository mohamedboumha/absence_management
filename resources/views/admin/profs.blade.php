<x-app-layout>
    <div class="py-12">
        <x-container>
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-5">
                        <h1 class="font-semibold text-xl">Professeurs</h1>

                        <a href="{{ route('profs.create') }}">
                            <button {{ !count($schools) ? "disabled" : "" }} class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 disabled:bg-gray-400">
                                Ajouter
                            </button>
                        </a>
                    </div>

                    <x-search :route="route('profs.index')"/>

                    @if (count($profs))
                    <x-table    :heads="['Nom & Prenom', 'CNI', 'PPR', 'Travailler dans', 'N. d\'absences', '']">
                        @foreach ($profs as $prof)
                        <tr class="border dark:border-neutral-500">
                            <td class="whitespace-nowrap py-4 px-4">
                            <a class="text-blue-600 font-medium uppercase border-b-4 hover:text-blue-900 hover:border-b-blue-900 border-b-blue-600 " href="{{ route('profs.show', $prof) }}">
                                {{ $prof->f_name }} {{ $prof->l_name }}
                            </a>
                            </td>
                            <td class="whitespace-nowrap py-4 px-4">{{ $prof->cni }}</td>
                            <td class="whitespace-nowrap py-4 px-4">{{ $prof->ppr }}</td>
                            <td class="whitespace-nowrap py-4 px-4">
                                @foreach ($schools as $school)
                                    @if ($school->id == $prof->school_id)
                                        {{ $school->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="whitespace-nowrap py-4 px-4">{{ count($prof->absences) }}</td>
                            <td class="whitespace-nowrap py-4 px-4 flex items-center justify-center">
                                <form method="post" action="{{ route('profs.destroy', $prof->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="p-0 text-white font-bold border px-2 bg-red-500">
                                        Supprimer
                                    </button>
                                </form>
                                <a href="{{ route('profs.edit', $prof->id) }}" class="p-0 text-white font-bold border px-2 bg-green-600">
                                        Modifier
                                </a>
                            </td>
                        </tr>
                            @endforeach
                    </x-table>
                    <div class="mt-10">
                        {{ $profs->links() }}
                    </div>
                @else
                    <div class="flex justify-center">
                        Il n'y a pas des professeurs!
                    </div>
                @endif
            </div>
        </x-container>
    </div>
</x-app-layout>

<x-flash-message class="{{ session('status') == 1 ? 'bg-green-600' : 'bg-red-600' }}" >
    @if (session('status') == 1)
        <x-icons.check-circle />
    @elseif (session('status') == 0)
        <x-icons.ban />
    @endif
</x-flash-message>
