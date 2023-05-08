<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="flex justify-between mb-5">
                    <h1 class="font-semibold text-xl">Directors</h1>

                    <a class="bg" x-data="" x-on:click.prevent="$dispatch('open-modal', 'create-director')">
                        <x-primary-button>Ajouter directeur</x-primary-button>
                    </a>
                </div>


                @if (count($directors))
                    <table class="w-full">
                        <thead>
                            <tr>
                                <td class="whitespace-nowrap px-6 py-4">Nom</td>
                                <td class="whitespace-nowrap px-6 py-4">Email</td>
                                <td class="whitespace-nowrap px-6 py-4">CIN</td>
                                <td class="whitespace-nowrap px-6 py-4">PPR</td>
                                <td class="whitespace-nowrap px-6 py-4"></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($directors as $director)
                            <tr class="border dark:border-neutral-500">
                                <td class="whitespace-nowrap px-6 py-4">{{ $director->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $director->email }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $director->cni }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $director->ppr }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <form method="post" action="{{ route('directors.destroy', $director->id) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="p-0 text-white font-bold border px-2 bg-red-500">
                                            Supprimer
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

<x-modal name="create-director" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <x-director-form></x-director-form>
</x-modal>

<x-flash-message class="{{ session('status') == 1 ? 'bg-green-600' : 'bg-red-600' }}" >
    @if (session('status') == 1)
        <x-icons.check-circle />
    @elseif (session('status') == 0)
        <x-icons.ban />
    @endif
</x-flash-message>
