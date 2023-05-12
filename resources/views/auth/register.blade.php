<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- First Name -->
        <div>
            <x-input-label for="f_name" :value="__('Nom')" />
            <x-text-input id="f_name" class="block mt-1 w-full" type="text" name="f_name" :value="old('f_name')" required autofocus autocomplete="f_name" />
            <x-input-error :messages="$errors->get('f_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div>
            <x-input-label for="l_name" :value="__('Prenom')" />
            <x-text-input id="l_name" class="block mt-1 w-full" type="text" name="l_name" :value="old('l_name')" required autofocus autocomplete="l_name" />
            <x-input-error :messages="$errors->get('l_name')" class="mt-2" />
        </div>

        <!-- First Name Ar -->
        <div>
            <x-input-label for="f_name_ar" :value="__('Nom (Arabe)')" />
            <x-text-input id="f_name_ar" class="block mt-1 w-full" type="text" name="f_name_ar" :value="old('f_name_ar')" required autofocus autocomplete="f_name_ar" />
            <x-input-error :messages="$errors->get('f_name_ar')" class="mt-2" />
        </div>

        <!-- Last Name Ar -->
        <div>
            <x-input-label for="l_name_ar" :value="__('Prenom (Arabe)')" />
            <x-text-input id="l_name_ar" class="block mt-1 w-full" type="text" name="l_name_ar" :value="old('l_name_ar')" required autofocus autocomplete="l_name_ar" />
            <x-input-error :messages="$errors->get('l_name_ar')" class="mt-2" />
        </div>

        <!-- cni -->
        <div>
            <x-input-label for="cni" :value="__('Cni')" />
            <x-text-input id="cni" class="block mt-1 w-full" type="text" name="cni" :value="old('cni')" required autofocus autocomplete="cni" />
            <x-input-error :messages="$errors->get('cni')" class="mt-2" />
        </div>

        <!-- ppr -->
        <div>
            <x-input-label for="ppr" :value="__('Ppr')" />
            <x-text-input id="ppr" class="block mt-1 w-full" type="text" name="ppr" :value="old('ppr')" required autofocus autocomplete="ppr" />
            <x-input-error :messages="$errors->get('ppr')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
