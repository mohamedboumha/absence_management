<div class="py-12">

        @if (count($schools))
        @foreach ($schools as $school)
        <x-container>
            <div class="text-gray-900 dark:text-gray-100">
                <div class="flex justify-between mb-5">
                    <h1 class="font-semibold text-xl">{{ $school->name }}</h1>

                    <a class="flex items-center text-blue-600 text-xl font-bold" href="{{ route('director.schools.show', $school) }}">
                        <span class="mr-1">Voir tout</span>
                        <x-icons.arrow-circle-right />
                    </a>
                </div>

                @if (count($school->profs))
                     <x-table :heads="['Nom & Prenom', 'CNI', 'PPR', 'N. absences', '']">
                    </thead>
                        @foreach ($school->profs as $prof)
                        <tr class="border dark:border-neutral-500">
                            <td class="whitespace-nowrap py-4 px-4">
                                @if (auth()->user()->role == 'admin')
                                <a class="text-blue-600 font-medium uppercase border-b-4 hover:text-blue-900 hover:border-b-blue-900 border-b-blue-600" href="{{ route('profs.show', $prof) }}" >
                                    {{ $prof->f_name }} {{ $prof->l_name }}
                                </a>
                                @else
                                <a class="text-blue-600 font-medium uppercase border-b-4 hover:text-blue-900 hover:border-b-blue-900 border-b-blue-600" href="{{ route('director.profs.show', $prof) }}" >
                                    {{ $prof->f_name }} {{ $prof->l_name }}
                                </a>
                                @endif
                            </td>
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
                </x-table>
                @else
                    <div class="flex justify-center">
                        Il n'y a pas des professeurs!
                    </div>
                @endif
                </div>
        </x-container>
            @endforeach
            @else
                <div class="flex justify-center">
                    Il n'y a pas des directeurs!
                </div>
            @endif

</div>
