<x-app-layout>
    <div class="py-12">
        <x-container>
                <div class="text-gray-900 dark:text-gray-100">
                  <div class="text-3xl font-extrabold">
                    {{ $school->name }}
                    |
                    @if (auth()->user()->role == 'admin')
                    <a class="text-blue-600 font-medium capitalize hover:text-blue-900" href="{{ route('directors.show', $director) }}">
                        {{ $director->f_name }} {{ $director->l_name }}
                    </a>
                    @else
                    <a class="text-blue-600 font-medium capitalize hover:text-blue-900" href="{{ route('profile.edit') }}">
                        {{ $director->f_name }} {{ $director->l_name }}
                    </a>
                    @endif

          
                    </div>
                  <div class="mt-10">
                    @if (count($profs))
                    @if (auth()->user()->role == 'admin')
                    <x-search :route="route('schools.show', $school)"/>
                    @else
                    <x-search :route="route('director.schools.show', $school)"/>
                    @endif

                    <x-table    :heads="['Nom & Prenom', 'CNI', 'PPR', 'Travailler dans', '']">
                        @foreach ($profs as $prof)
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
                            <td class="whitespace-nowrap py-4 px-4">{{ $prof->cni }}</td>
                            <td class="whitespace-nowrap py-4 px-4">{{ $prof->ppr }}</td>
                            <td class="whitespace-nowrap py-4 px-4">
                                        {{ $school->name }}
                            </td>
                            @if (auth()->user()->role == 'admin')
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
                            @else
                            <td class="whitespace-nowrap px-6 py-4">
                                <form action="{{ route('absences.index', $prof->id) }}" >
                                        <button class="p-0 text-white font-bold border px-2 bg-black">
                                            Gérer les absences
                                        </button>
                                    </form>
                            </td>
                            @endif
                        </tr>
                            @endforeach
                    </x-table>
                   <div class="mt-10"> {{ $profs->links() }}</div>
                @else
                    <div class="flex justify-center">
                        Il n'y a pas des professeurs!
                    </div>
                @endif
                  </div>

                </div>
        </x-container>
    </div>
  </x-app-layout>
  
