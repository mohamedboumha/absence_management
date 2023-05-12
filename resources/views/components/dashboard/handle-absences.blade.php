<div class="py-12">
<x-container>
    <h1 class="font-medium text-xl">Ce mois :</h1>
    <div class="text-gray-900 dark:text-gray-100 flex justify-around items-center">
        <div class="border cursor-pointer hover:bg-gray-100 shadow px-10 py-3">
            @if ($schoolWithMaxAbsences !== null)
                <h3 class="font-semibold text-xl capitalize">école avec le plus d'absentéisme des professeurs</h3>
                <span class="text-xl">{{ $schoolWithMaxAbsences['school']->name }}</span>
                <span class="text-xl">({{ count($schoolWithMaxAbsences['absences']) }} abs..)</span>
            @else
                <p>NONE</p>
            @endif
        </div>
        <div class="border cursor-pointer hover:bg-gray-100 shadow px-10 py-3">
            @if ($schoolWithMinAbsences !== null)
                <h3 class="font-semibold text-xl capitalize">école avec le moins d'absences des professeurs</h3>
                <span class="text-xl">{{ $schoolWithMinAbsences['school']->name }}</span>
                <span class="text-xl">({{ count($schoolWithMinAbsences['absences']) }} abs..)</span>
            @else
                <p>NONE</p>
            @endif
        </div>
    </div>
</x-container>
<x-container>
              <div class="text-gray-900 dark:text-gray-100">
                  <div schools="{{ json_encode($schools) }}" id="chart">
                      <div id="chartChild" class="hidden"></div>
                  </div>
              </div>
              <div class="text-gray-900 dark:text-gray-100 flex justify-around items-center">
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
</x-container>


      </div>
      <script>
          if (@json($weekDays).length> 0) {
          let container = document.getElementById('container');
          const selectSchool = document.getElementById('select-school');
          const chartChild = document.getElementById('chartChild');
      
              console.log('test');
              chartChild.textContent = JSON.stringify(@json($weekDays));
          }
  </script>
  </div>