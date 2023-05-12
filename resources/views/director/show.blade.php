<x-app-layout>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white mb-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
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
          </div>
          <div class="bg-white py-12 mb-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="text-lg font-medium px-10">
              <table class="w-full">
                <thead>
                  <tr>
                    <td class="whitespace-nowrap px-6 py-4">Début</td>
                      <td class="whitespace-nowrap px-6 py-4">Fin</td>
                      <td class="whitespace-nowrap px-6 py-4">Statut</td>
                      <td class="whitespace-nowrap px-6 py-4">Justification</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
</x-app-layout>
