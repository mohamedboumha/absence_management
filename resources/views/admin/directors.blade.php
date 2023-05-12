<x-app-layout>
    <div class="py-12">
    <x-container>
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-5">
                        <h1 class="font-semibold text-xl">Directeurs</h1>

                        <a href="{{ route('directors.create') }}">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 disabled:bg-gray-400">
                                Ajouter
                            </button>
                        </a>
                    </div>

                    <x-search :route="route('directors.index')"/>

                    @if (count($directors))
                     <x-table :heads="['Nom & Prenom', 'Email', 'CNI', 'PPR', 'Travailler dans', '']">
                    </thead>
                        @foreach ($directors as $director)
                        <tr class="border dark:border-neutral-500">
                            <td class="whitespace-nowrap py-4 px-4">
                                <a class="text-blue-600 font-medium uppercase border-b-4 hover:text-blue-900 hover:border-b-blue-900 border-b-blue-600 " href="{{ route('directors.show', $director) }}">
                                    {{ $director->f_name }} {{ $director->l_name }}
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $director->email }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $director->cni }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $director->ppr }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                    {{ count($director->schools) }} école (s)
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 flex items-center justify-center">
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
                </x-table>
                
                <div class="mt-10">
                    {{ $directors->links() }}
                </div>

                @else
                    <div class="flex justify-center">
                        Il n'y a pas des directeurs!
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
