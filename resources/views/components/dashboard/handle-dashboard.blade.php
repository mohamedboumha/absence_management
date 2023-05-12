<div class="py-12">
    <x-container>
        <div class="flex justify-between mb-5">
          <h1 class="font-semibold text-2xl">Directeurs</h1>
      
          <a class="flex items-center text-blue-600 text-xl font-bold" href="{{ route('directors.index') }}">
              <span class="mr-1">Voir tout</span>
              <x-icons.arrow-circle-right />
          </a>
      </div>
      @if (count($directors))
                         <x-table :heads="['Nom & Prenom', 'Email', 'CNI', 'PPR', 'Travailler dans', '']">
                        </thead>
                            @foreach ($directors as $director)
                            <tr class="border dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4">
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
                    @else
                        <div class="flex justify-center items-center">
                            Il n'y a pas des directeurs!
                            <a href="{{ route('directors.create') }}" class="text ml-2 bg-black px-2 text-white rounded-md font-extrabold">+ Ajouter directeur</a>
                        </div>
                        
                    @endif
      
      </x-container>
      <x-container>
        <div class="flex justify-between mb-5">
          <h1 class="font-semibold text-2xl">Professeurs</h1>
      
          <a class="flex items-center text-blue-600 text-xl font-bold" href="{{ route('profs.index') }}">
              <span class="mr-1">Voir tout</span>
              <x-icons.arrow-circle-right />
          </a>
      </div>
      @if (count($profs))
      <x-table    :heads="['Nom & Prenom', 'CNI', 'PPR', 'Travailler dans', '']">
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
      
      @else
      
      <div class=" flex justify-center items-center">
          Il n'y a pas des professeurs!
            <a href="{{ route('profs.create') }}">
                <button {{ !count($schools) ? 'disabled' : '' }} class="text ml-2 bg-black px-2 text-white rounded-md font-extrabold disabled:bg-gray-400" >
                + Ajouter professeur
                </button>
            </a>
      </div>
      
      @endif
      
      </x-container>


</div>