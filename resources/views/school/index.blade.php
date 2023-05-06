<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mb-6 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    @if (count($schools))
                    <table class="w-full">
                        <tbody>
                            @foreach ($schools as $school)
                            <a href="{{ route('schools.show', $school) }}">
                                <tr class="border dark:border-neutral-500 hover:bg-gray-200 ">
                                    <td class="whitespace-nowrap px-6 py-4">{{ $school->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if ($school->level == 0) Primaire @elseif ($school->level == 1) Collège @else Lycée @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    @if ($school->user_id == Auth::user()->id) Pas directeur sélectioner @else @foreach ($directors as $director )
                                    {{ $director->id == $school->user_id ? $director->name : "" }}
                                    @endforeach @endif
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">{{ count($school->profs) }} professeurs</td>
                            </tr>
                            </a>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="flex justify-center">
                        Il n'y a pas des écoles!
                    </div>
                @endif
        </div>
    </div>
</x-app-layout>
