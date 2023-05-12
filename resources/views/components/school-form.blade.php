<form method="POST" class="p-6"  action="{{ route('schools.store') }}">
    @csrf

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Name Ar-->
    <div>
        <x-input-label for="name_ar" :value="__('Name (Arabe)')" />
        <x-text-input id="name_ar" class="block mt-1 w-full" type="text" name="name_ar" :value="old('name_ar')" required autofocus autocomplete="name_ar" />
        <x-input-error :messages="$errors->get('name_ar')" class="mt-2" />
    </div>

    <!-- Level -->
    <div>
        <x-input-label for="level" :value="__('Niveau')" />
        <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-2 w-full" name="level">
            <option value="Primaire">Primaire</option>
            <option value="Collège">Collège</option>
            <option value="Lycée">Lycée</option>
        </select>
        <x-input-error :messages="$errors->get('level')" class="mt-2" />
    </div>

    {{ $slot }}

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-4">
            {{ __('Ajouter') }}
        </x-primary-button>
    </div>
</form>
