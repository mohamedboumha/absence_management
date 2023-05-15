<x-app-layout>
    <div class="py-12">
        <x-container>
                <div class="text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-5">
                        <h1 class="font-semibold text-xl">Professeurs</h1>
                    </div>

                    @if (count($profs))

                    <x-search :route="route('director.profs.index')"/>

                    <x-table    :heads="['Nom & Prenom', 'CNI', 'PPR', 'Travailler dans', '']">
                        @foreach ($profs as $prof)
                        <tr class="border dark:border-neutral-500">
                            <td class="whitespace-nowrap py-4 px-4">
                            @if(auth()->user()->role == 'admin')
                            <a class="text-blue-600 font-medium uppercase border-b-4 hover:text-blue-900 hover:border-b-blue-900 border-b-blue-600 " href="{{ route('profs.show', $prof) }}">
                            {{ $prof->f_name }} {{ $prof->l_name }}
                            </a>
                            @else
                            <a class="text-blue-600 font-medium uppercase border-b-4 hover:text-blue-900 hover:border-b-blue-900 border-b-blue-600 " href="{{ route('director.profs.show', $prof) }}">
                                {{ $prof->f_name }} {{ $prof->l_name }}
                            </a>
                            @endif
                            </td>
                            <td class="whitespace-nowrap py-4 px-4">{{ $prof->cni }}</td>
                            <td class="whitespace-nowrap py-4 px-4">{{ $prof->ppr }}</td>
                            <td class="whitespace-nowrap py-4 px-4">
                                @foreach ($schools as $school)
                                    @if ($school->id == $prof->school_id)
                                        {{ $school->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td class="whitespace-nowrap py-4 px-4 flex items-center justify-center">
                                <form action="{{ route('absences.index', $prof->id) }}" >
                                    <button class="p-0 text-white font-bold border px-2 bg-black">
                                        Gérer les absences
                                    </button>
                                </form>
                            </td>
                        </tr>
                            @endforeach
                    </x-table>
                    <div class="mt-10">{{ $profs->links() }}</div>
                @else
                    <div class="flex justify-center">
                        Il n'y a pas des professeurs!
                    </div>
                @endif
            </div>
        </x-container>
    </div>
</x-app-layout>

<x-flash-message class="{{ session('status') == 1 ? 'bg-green-600' : 'bg-red-600' }}" >
    @if (session('status') == 1)
        <x-icons.check-circle />
    @elseif (session('status') == 0)
        <x-icons.ban />
    @endif
</x-flash-message>
