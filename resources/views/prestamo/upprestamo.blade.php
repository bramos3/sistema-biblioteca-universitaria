<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>
  <script type="module" src="../jquery/dashboard.js"></script>
  <script src="../jquery/prestamo.js"></script>

  <title>Editar Prestamo</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen">

  @include('partes.nav')

  <div class="flex">
    <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16">
      @include('partes.sidebar')
    </aside>

    <div class="ml-64 w-full pt-16 p-6 min-h-[calc(100vh-4rem)] flex flex-col">

      <div class="flex-grow flex items-center justify-center">
        <form action="{{ route('upprestamo.update', $prestamo->id) }}" method="POST" class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8 w-full max-w-md">
        @csrf
        @method('PUT')
          <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center"> Editar Prestamo</h2>

          <div class="mb-4">
            <label for="codigo_estudiante" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código de estudiante</label>
            <input type="text" id="codigo_estudiante" name="codigo_estudiante" placeholder="2273300023"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" value="{{ $prestamo->codigo_estudiante}}" required />
          </div>
          <div class="mb-4">
            <label for="fecha_prestamo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de prestamo</label>
            <input type="text" id="fecha_prestamo" name="fecha_prestamo" placeholder="2025-10-01" value="{{ $prestamo->fecha_prestamo }}"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" required />
          </div>

          <div class="mb-4">
            <label for="fecha_entrega" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de entrega</label>
            <input type="text" id="fecha_entrega" name="fecha_entrega" placeholder="2025-10-02"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" value="{{ $prestamo->fecha_entrega}}" required />
          </div>
          <div class="mb-4">
            <label for="personal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Personal</label>
            <input type="text" id="personal" name="personal" placeholder="Brandhon valle"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
              value="{{ $prestamo->personal}}" required />
          </div>

          <div class="mb-4">
            <label for="libro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Codigo Libro</label>
            <input type="libro" id="codigo_libro" name="codigo_libro" placeholder="stars wars"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400"
              value="{{ $prestamo->codigo_libro}}" required />
          </div>




          <button type="submit"
            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
            Editar Prestamo
          </button>

        </form>
      </div>
    </div>
  </div>

</body>

</html>