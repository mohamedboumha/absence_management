<form method="POST" class="p-6"  action="{{ route('profs.store') }}">
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

    {{ $slot }}

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-4">
            {{ __('Ajouter') }}
        </x-primary-button>
    </div>
</form>
