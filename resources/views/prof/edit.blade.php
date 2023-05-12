<x-app-layout>
    <div class="p-12">
      <x-container>
        <div class="flex justify-between mb-">
          <h1 class="font-semibold text-2xl">Ajouter professeur</h1>
      
          <x-back />
      </div>
  
        <form method="POST" class="mt-10"  action="{{ route('profs.store') }}">
          @csrf
  
          
          <div class="flex justify-around items-center w-full mb-3">
            <!-- First Name -->
            <div class="w-1/2">
                <x-input-label for="f_name" :value="__('Nom')" />
                <x-text-input id="f_name" class="block mt-1 w-11/12" type="text" name="f_name" :value="$prof->f_name" required autofocus autocomplete="f_name" />
                <x-input-error :messages="$errors->get('f_name')" class="mt-2" />
            </div>
  
            <!-- Last Name -->
            <div class="w-1/2">
                <x-input-label for="l_name" :value="__('Prenom')" />
                <x-text-input id="l_name" class="block mt-1 w-11/12" type="text" name="l_name" :value="$prof->l_name" required autofocus autocomplete="l_name" />
                <x-input-error :messages="$errors->get('l_name')" class="mt-2" />
            </div>
          </div>
  
          <div class="flex justify-around items-center w-full mb-3">
            <!-- First Name Ar -->
            <div class="w-1/2">
                <x-input-label for="f_name_ar" :value="__('Nom')" />
                <x-text-input id="f_name_ar" class="block mt-1 w-11/12" type="text" name="f_name_ar" :value="$prof->f_name_ar" required autofocus autocomplete="f_name_ar" />
                <x-input-error :messages="$errors->get('f_name_ar')" class="mt-2" />
            </div>
  
            <!-- Last Name Ar -->
            <div class="w-1/2">
                <x-input-label for="l_name_ar" :value="__('Prenom')" />
                <x-text-input id="l_name_ar" class="block mt-1 w-11/12" type="text" name="l_name_ar" :value="$prof->f_name_ar" required autofocus autocomplete="l_name_ar" />
                <x-input-error :messages="$errors->get('l_name_ar')" class="mt-2" />
            </div>
          </div>
  
          <div class="flex justify-around items-center w-full mb-3">

            <!-- cni -->
            <div class="w-1/2">
                <x-input-label for="cni" :value="__('Cni')" />
                <x-text-input id="cni" class="block mt-1 w-11/12" type="text" name="cni" :value="$prof->cni" required autofocus autocomplete="cni" />
                <x-input-error :messages="$errors->get('cni')" class="mt-2" />
            </div>
  
            <!-- ppr -->
            <div class="w-1/2">
                <x-input-label for="ppr" :value="__('Ppr')" />
                <x-text-input id="ppr" class="block mt-1 w-11/12" type="text" name="ppr" :value="$prof->ppr" required autofocus autocomplete="ppr" />
                <x-input-error :messages="$errors->get('ppr')" class="mt-2" />
            </div>
          </div>
  
  
          <div class="flex justify-start items-center w-full">
            <!-- cni -->
            <div class="w-1/2">
                <x-input-label for="director" :value="__('Ecole')" />
                <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-2 w-11/12" name="school_id">
                    @foreach ($schools as $school)
                        <option {{ $school->name == $selected_school->name ? 'selected' : '' }} value="{{ $school->id }}">{{ $school->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('school_id')" class="mt-2" />
            </div>
  
          </div>
  
          <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-4">
                  {{ __('Ajouter') }}
              </x-primary-button>
          </div>
        </form>
      </x-container>
    </div>
  </x-app-layout>