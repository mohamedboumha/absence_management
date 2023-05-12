@props(['heads'])

<table class="w-full">
  <thead class="bg-gray-200">
    <tr>
      @foreach ($heads as $head)
        <td class="font-extrabold whitespace-nowrap px-6 py-4">{{ $head }}</td>
      @endforeach
    </tr>
  </thead>

  <tbody>
    {{ $slot }}
  </tbody>
  
</table>