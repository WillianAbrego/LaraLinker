<x-app-layout>
  <x-slot name="header">

    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
    @vite(['resources/js/bootstrap.js', 'resources/js/app.js', 'resources/js/shorter.js'])
    </script>

  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex mt-4 ml-4 mr-4 mb-4">
          <input id="long_url" type="text" placeholder="Url here" class=" w-full px-4 py-3 rounded">
          <button class="ml-4  w-auto px-6 py-3 font-semibold bg-gray-900 text-white rounded"
            onclick="shorter.short_url()">
            <span>Acortar</span>
          </button>
        </div>
        <div id="short_url_container" class="flex py-5 ml-4 mr-4" style="display: none">
          <input id="short_url" type="text" class="w-full px-4 py-3 rounded" onclick="shoter.copy_url()">
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
