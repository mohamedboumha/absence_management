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
                </div>
      
              </div>
          </div>
          <div class="bg-white py-12 mb-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-lg font-medium px-10">

              {{-- <input type="text" id="searchInput" placeholder="Search..."> --}}
              <table class="w-full">
                <thead>
                  <tr>
                    <td class="whitespace-nowrap px-6 py-4">Début</td>
                      <td class="whitespace-nowrap px-6 py-4">Fin</td>
                      <td class="whitespace-nowrap px-6 py-4">Statut</td>
                      <td class="whitespace-nowrap px-6 py-4">Justification</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($absences as $absence)
                  <tr class="border dark:border-neutral-500">
            
                      <td class="whitespace-nowrap px-6 py-4">{{ $absence->start }}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{ $absence->end }}</td>
                      <td class="whitespace-nowrap px-6 py-4">{{ $absence->status == 0 ? "Injustifié" : "Justifié" }}</td>
                      <td class="whitespace-nowrap px-6 py-4">
                          @if ($absence->justification)
                              {{ $absence->justification }}
                          @else
                              -
                          @endif
                      </td>
                        @if (auth()->user()->role == 'director')
                            <td class="whitespace-nowrap px-6 py-4">
                              <form action="{{ route('absences.index', $absence->id) }}" >
                                <button  class="p-0 text-white font-bold border px-2 bg-black">
                                  Gérer les absences
                                </button>
                              </form>
                            </td>
                            @endif
                            
                            @if (auth()->user()->role == 'admin' && $absence->status == 0)
                            <td class="whitespace-nowrap px-6 py-4" >
                                  <form method="GET" action="{{ route('pdf', $absence) }}">
                                    @csrf
                                    <button class="p-0 text-white font-bold border px-2 bg-black">
                                      PDF
                                    </button>
                                  </form>
                            </td>
                        @endif

                        </tr>
                        @endforeach
                      </tbody>
                    </table>
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