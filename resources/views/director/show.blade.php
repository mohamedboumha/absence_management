<x-app-layout>
  <div class="py-12">
      <x-container>
              <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-3xl font-extrabold">Les données du {{ $director->f_name }} {{ $director->l_name }} :</h1>
                <div class="text-lg font-medium mt-4 px-10">
                  <li>CNI : {{ $director->cni }}</li>
                  <li>PPR : {{ $director->ppr }}</li>
                  <li>
                    Travailler dans :
                    @foreach ($director->schools as $school)
                      <span class="mr-2">{{ $school->name }}</span>
                    @endforeach
                  </li>
                </div>
              </div>
      </x-container>

  
  @if (count($schools))
        @foreach ($schools as $school)

        <x-container>
            <div class="text-gray-900 dark:text-gray-100">
                <div class="flex justify-between mb-5">
                    <h1 class="font-semibold text-xl bg-gray-200 px-2">{{ $school->name }}</h1>
                    
                    <a class="flex items-center text-blue-600 text-xl font-bold" href="{{ route('schools.show', $school->id) }}">
                      <span class="mr-1">Voir tout</span>
                      <x-icons.arrow-circle-right />
                  </a>
                </div>

                @if (count($school->profs))
                     <x-table :heads="['Nom & Prenom', 'CNI', 'PPR', 'N. absences']">
                    </thead>
                        @foreach ($school->profs as $prof)
                        <tr class="border dark:border-neutral-500">
                            <td class="whitespace-nowrap px-6 py-4">
                              <a class="text-blue-600 font-medium uppercase border-b-4 hover:text-blue-900 hover:border-b-blue-900 border-b-blue-600 " href="{{ route('profs.show', $prof) }}">
                                {{ $prof->f_name }} {{ $prof->l_name }}
                            </a>
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $prof->cni }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $prof->ppr }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ count($prof->absences) }}</td>
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
                    Il n'y a pas des ecoles!
                </div>
            @endif
  </div>
</x-app-layout>
