

<form method="POST" action="{{ route('directors.store') }}" class="p-6">
    @csrf

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
        <x-primary-button class="ml-4">
            {{ __('Create director account') }}
        </x-primary-button>
    </div>
</form>
