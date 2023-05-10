<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-around items-center">
                    <div class="border cursor-pointer hover:bg-gray-100 shadow px-10 py-3">
                        <h3 class="font-semibold text-xl capitalize">école avec le plus d'absentéisme des professeurs</h3>
                        <span class="text-xl">{{ $schoolWithMaxAbsences['school']->name }}</span>
                        <span class="text-xl">({{ count($schoolWithMaxAbsences['absences']) }} abs..)</span>
                    </div>
                    <div class="border cursor-pointer hover:bg-gray-100 shadow px-10 py-3">
                        <h3 class="font-semibold text-xl capitalize">école avec le moins d'absences des professeurs</h3>
                        <span class="text-xl">{{ $schoolWithMinAbsences['school']->name }}</span>
                        <span class="text-xl">({{ count($schoolWithMinAbsences['absences']) }} abs..)</span>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div schools="{{ json_encode($schools) }}" id="chart">
                        <div id="chartChild" class="hidden"></div>
                    </div>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-around items-center">
                    <div class="border cursor-pointer hover:bg-gray-100 shadow px-10 py-3">
                        <h3 class="text-xl">Aujourd'hui</h3>
                        <span class="text-2xl">{{ count($today) }}</span>
                    </div> 
                    <div class="border cursor-pointer hover:bg-gray-100 shadow px-10 py-3">
                        <h3 class="text-xl">Cette semaine</h3>
                        <span class="text-2xl">{{ count($this_week) }}</span>
                    </div>
                    <div class="border cursor-pointer hover:bg-gray-100 shadow px-10 py-3">
                        <h3 class="text-xl">Ce mois-ci</h3>
                        <span class="text-2xl">{{ count($this_month) }}</span>
                    </div>
                    <div class="border cursor-pointer hover:bg-gray-100 shadow px-10 py-3">
                        <h3 class="text-xl">Cette année</h3>
                        <span class="text-2xl">{{ count($this_year) }}</span>
                    </div>
                </div>
            </div>

        </div>


        </div>
    </div>
</x-app-layout>

<script>
    let container = document.getElementById('container');
    const selectSchool = document.getElementById('select-school');
    const chartChild = document.getElementById('chartChild');

    chartChild.textContent = JSON.stringify(@json($weekDays));

</script>
