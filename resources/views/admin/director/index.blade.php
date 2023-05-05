<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Schools --}}
            <div class="bg-white mb-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-5">
                        <h1 class="font-semibold text-xl">Schools</h1>

                        <a class="bg"  x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-school')">
                            <x-primary-button>Add school</x-primary-button>
                        </a>
                    </div>
                </div>
                <x-modal name="create-school" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <x-school-form></x-school-form>
                </x-modal>

                    @if (count($schools))
                    <table class="w-full">
                        <tbody>
                            @foreach ($schools as $school)
                            <tr class="border dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4">{{ $school->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if ($school->level == 0) Primaire @elseif ($school->level == 1) Collège @else Lycée @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <form method="post" action="{{ route('schools.destroy', $school->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="p-0">
                                            Delete school
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="flex justify-center">
                        Il n'y a pas des écoles!
                    </div>
                @endif
            </div>

            {{-- Directors --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-5">
                        <h1 class="font-semibold text-xl">Directors</h1>

                        <a class="bg" href="{{ route('directors.create') }}">
                            <button {{ !count($schools) ? 'disabled' : '' }} class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 disabled:bg-gray-400">test</button>
                        </a>
                    </div>

                    @if (count($directors))
                        <table class="w-full">
                            <tbody>
                                @foreach ($directors as $director)
                                <tr class="border dark:border-neutral-500">
                                    <td class="whitespace-nowrap px-6 py-4">{{ $director->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $director->email }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <form method="post" action="{{ route('directors.destroy', $director->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="">
                                                Delete director
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="flex justify-center">
                            Il n'y a pas des directeurs!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
