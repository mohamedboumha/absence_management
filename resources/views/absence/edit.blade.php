<x-app-layout>
  <div class="py-12">
     <x-container>

      <form method="post" id='form' action="{{ route('absences.update', ['absence'=>$absence, 'id'=>$absence->prof_id]) }}" class="p-6">
          @csrf
          @method('PUT')

          <!-- Start -->
          <div class="mt-3">
              <x-input-label for="start" :value="__('Début')" />
              <x-text-input id="start" class="block mt-1 w-full" type="date" name="start" :value="$absence->start" required autofocus autocomplete="start" />
              <x-input-error :messages="$errors->get('start')" class="mt-2" />
          </div>

          <!-- end -->
          <div class="mt-3">
              <x-input-label for="end" :value="__('Fin')" />
              <x-text-input id="end" class="block mt-1 w-full" type="date" name="end" :value="$absence->end" required autofocus autocomplete="end" />
              <x-input-error :messages="$errors->get('end')" class="mt-2" />
          </div>

          <!-- status -->
          <div class="mt-3">
              <div class="flex items-center">
                  <x-input-label for="status" :value="__('Justifié ?')" />
                  <span class="mx-2" id="span">Non</span>
                  <input  id="status" class="block" type="checkbox" name="status" checked="{{ $isChecked }}" autofocus autocomplete="status" />
              </div>
              <x-input-error :messages="$errors->get('status')" class="mt-2" />
          </div>

          <!-- justification -->
          <div class="mt-4 hidden" id="justification-div">
              <x-input-label for="email" :value="__('Justification')" />
              <select id="justification-select" name="justification" class="dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                  <option selected disabled hidden value="">Choisir...</option>
                  <option {{ $absence->justification == 'Medical certificate' ? 'selected' : '' }} value="Medical certificate">Medical certificate</option>
                  <option {{ $absence->justification == 'Exception license' ? 'selected' : '' }} value="Exception license">Exception license</option>
              </select>
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>


          <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-4">
                  {{ __('Create director account') }}
              </x-primary-button>
          </div>
      </form>

      <script>
          const status = document.getElementById('status');
          const justificationDiv = document.getElementById('justification-div');
          const justificationSelect = document.getElementById('justification-select');
          const span = document.getElementById('span')

          if (status.checked) {
                justificationDiv.style.display = 'block';
                  span.innerHTML = "Oui"
                  justificationSelect.required = true;
          }

          status.addEventListener('change', function(e) {
              if (e.target.checked) {
                  justificationDiv.style.display = 'block';
                  span.innerHTML = "Oui"
                  justificationSelect.required = true;
              } else {
                  justificationDiv.style.display = 'none';
                  span.innerHTML = "Non"
                  justificationSelect.required = false;
              }
          });
      </script>

     </x-container>
  </div>
</x-app-layout> 