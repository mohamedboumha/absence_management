<x-app-layout>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white mb-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-3xl font-extrabold">Les données du {{ $prof->f_name }} {{ $prof->l_name }} :</h1>
                <div class="text-lg font-medium mt-4 px-10">
                  <li>CNI : {{ $prof->cni }}</li>
                  <li>PPR : {{ $prof->ppr }}</li>
                  <li>Travailler dans : {{ $school->name }}</li>
                  <li>N. total d'absences : {{ count($prof->absences) }}</li>
                </div>
      
              </div>
          </div>
          <div class="bg-white py-12 mb-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-lg font-medium px-10">
            
              <x-search :route="route('profs.show', $prof->id)"></x-search>

            @if (count($absences))
            <x-table    :heads="['Début', 'Fin', 'Statut', 'Justification', '']">
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
                        
                    @if (auth()->user()->role == 'admin' && $absence->status == 'Injustifié')
                    <td class="whitespace-nowrap px-6 py-4" >
                          <form method="GET" action="{{ route('pdf', $absence) }}">
                            @csrf
                            <button class="p-0 text-white font-bold border px-2 bg-black">
                              PDF
                            </button>
                          </form>
                    </td>
                    @else
                    <td class="whitespace-nowrap px-6 py-4">
                      <form method="post" action="{{ route('absences.destroy', ['absence'=>$absence, 'id'=>$prof->id]) }}">
                          @csrf
                          @method('delete')
                          <button class="p-0 text-white font-bold border px-2 bg-red-500">
                              Supprimer
                          </button>
                    </form>
                    </td>
                    @endif

                    </tr>
                    @endforeach
            </x-table>
              @else
                  <div class="flex justify-center">
                      Pas d'absences!
                  </div>
              @endif
              
              <div class="mt-10">{{ $absences->links() }}</div>
                    
            </div>
          </div>
        </div>
      </div>
  </div>
</x-app-layout>

{{-- <x-modal name="show-pdf" :show="$errors->userDeletion->isNotEmpty()" focusable>
  @include('pdf.pdf')
</x-modal> --}}

{{-- x-data="" x-on:click.prevent="$dispatch('open-modal', 'show-pdf')" --}}