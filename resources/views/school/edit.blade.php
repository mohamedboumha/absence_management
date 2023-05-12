<x-app-layout>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white mb-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="font-extrabold text-xl mb-4">Modifier l'ecole</h1>

                <div class="flex justify-between mb-5">
                    <form method="POST" class="w-full"  action="{{ route('schools.update', $school) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$school->name" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Name Ar -->
                        <div>
                            <x-input-label for="name_ar" :value="__('Name (Arabe)')" />
                            <x-text-input id="name_ar" class="block mt-1 w-full" type="text" name="name_ar" :value="$school->name_ar" required autofocus autocomplete="name_ar" />
                            <x-input-error :messages="$errors->get('name_ar')" class="mt-2" />
                        </div>

                                            
                        <!-- Level -->
                        <div class="mt-3">
                            <x-input-label for="level" :value="__('Niveau')" />
                            <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 w-full" name="level">
                                <option {{ $school->level == 'Primaire' ? 'selected' : '' }} value="Primaire">Primaire</option>
                                <option {{ $school->level == 'Collège' ? 'selected' : '' }} value="Collège">Collège</option>
                                <option {{ $school->level == 'Lycée' ? 'selected' : '' }} value="Lycée">Lycée</option>
                            </select>
                            <x-input-error :messages="$errors->get('level')" class="mt-2" />
                        </div>

                        <div class="mt-3">
                            <x-input-label for="director" :value="__('Directeur')" />
                            <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 w-full" name="user_id">
                                @foreach ($directors as $director)
                                    <option {{ $school->user_id == $director->id ? 'selected' : '' }} value="{{ $director->id }}">{{ $director->f_name }} {{ $director->l_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Submit') }}
                            </x-primary-button>
                            <x-primary-button type='button' class="ml-4">
                                <a href="{{ route('directors.index') }}">{{ __('Anuller') }}</a>
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
