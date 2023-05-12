<div class="py-12">

        @if (count($schools))
        @foreach ($schools as $school)

        <x-container>
            <div class="text-gray-900 dark:text-gray-100">
                <div class="flex justify-between mb-5">
                    <h1 class="font-semibold text-xl">{{ $school->name }}</h1>
                </div>

                @if (count($school->profs))
                     <x-table :heads="['Nom & Prenom', 'CNI', 'PPR', 'N. absences', '']">
                    </thead>
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
