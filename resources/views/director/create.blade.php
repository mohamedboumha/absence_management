<x-app-layout>
    <div class="p-12">
      <x-container>
        <div class="flex justify-between mb-">
          <h1 class="font-semibold text-2xl">Ajouter directeur</h1>
      
          <x-back />
      </div>
  
        <form method="POST" class="mt-10"  action="{{ route('directors.store') }}">
          @csrf
  
          
          <div class="flex justify-around items-center w-full mb-3">
            <!-- First Name -->
            <div class="w-1/2">
                <x-input-label for="f_name" :value="__('Nom')" />
                <x-text-input id="f_name" class="block mt-1 w-11/12" type="text" name="f_name" :value="old('f_name')" required autofocus autocomplete="f_name" />
                <x-input-error :messages="$errors->get('f_name')" class="mt-2" />
            </div>
  
            <!-- Last Name -->
            <div class="w-1/2">
                <x-input-label for="l_name" :value="__('Prenom')" />
                <x-text-input id="l_name" class="block mt-1 w-11/12" type="text" name="l_name" :value="old('l_name')" required autofocus autocomplete="l_name" />
                <x-input-error :messages="$errors->get('l_name')" class="mt-2" />
            </div>
          </div>
  
          <div class="flex justify-around items-center w-full mb-3">
            <!-- First Name Ar -->
            <div class="w-1/2">
                <x-input-label for="f_name_ar" :value="__('Nom')" />
                <x-text-input id="f_name_ar" class="block mt-1 w-11/12" type="text" name="f_name_ar" :value="old('f_name_ar')" required autofocus autocomplete="f_name_ar" />
                <x-input-error :messages="$errors->get('f_name_ar')" class="mt-2" />
            </div>
  
            <!-- Last Name Ar -->
            <div class="w-1/2">
                <x-input-label for="l_name_ar" :value="__('Prenom')" />
                <x-text-input id="l_name_ar" class="block mt-1 w-11/12" type="text" name="l_name_ar" :value="old('l_name_ar')" required autofocus autocomplete="l_name_ar" />
                <x-input-error :messages="$errors->get('l_name_ar')" class="mt-2" />
            </div>
          </div>
  
          <div class="flex justify-around items-center w-full mb-3">
            <!-- cni -->
            <div class="w-1/2">
                <x-input-label for="cni" :value="__('Cni')" />
                <x-text-input id="cni" class="block mt-1 w-11/12" type="text" name="cni" :value="old('cni')" required autofocus autocomplete="cni" />
                <x-input-error :messages="$errors->get('cni')" class="mt-2" />
            </div>
  
            <!-- ppr -->
            <div class="w-1/2">
                <x-input-label for="ppr" :value="__('Ppr')" />
                <x-text-input id="ppr" class="block mt-1 w-11/12" type="text" name="ppr" :value="old('ppr')" required autofocus autocomplete="ppr" />
                <x-input-error :messages="$errors->get('ppr')" class="mt-2" />
            </div>
          </div>

          <div class="flex justify-around items-center w-full mb-3">
            <!-- Email Address -->
            <div class="w-1/2">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-11/12" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

              <!-- Password -->
            <div class="w-1/2">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-11/12"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
          </div>

          <div class="flex justify-start items-center w-full mb-3">
            <!-- Confirm Password -->
            <div class="w-1/2">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-11/12"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
