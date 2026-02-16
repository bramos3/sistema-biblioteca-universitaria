<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script>

  <title>Nuevo Estudiante</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen">

  @include('partes.nav')

  <div class="flex">
    <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16">
      @include('partes.sidebar')
    </aside>

    <div class="ml-64 w-full pt-16 p-6 min-h-[calc(100vh-4rem)] flex flex-col">

      <div class="flex-grow flex items-center justify-center">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8 w-full max-w-md">
          
          {{-- Mensajes de éxito y error --}}
          @if(session('success'))
            <div class="mb-4 p-4 text-green-800 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-200">
              <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('success') }}
              </div>
            </div>
          @endif

          @if(session('error'))
            <div class="mb-4 p-4 text-red-800 bg-red-100 rounded-lg dark:bg-red-900 dark:text-red-200">
              <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ session('error') }}
              </div>
            </div>
          @endif

          <form action="{{ route('estudiantes.store') }}" method="POST" id="agregar-estudiante">
            @csrf
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">Registrar Nuevo Estudiante</h2>

            <div class="mb-4">
              <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código</label>
              <input type="text" id="codigo" name="codigo" value="{{ old('codigo') }}" placeholder="2273300023"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 @error('codigo') border-red-500 @enderror" required />
              @error('codigo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            
            <div class="mb-4">
              <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
              <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" placeholder="Tu Apellido"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 @error('apellidos') border-red-500 @enderror" required />
              @error('apellidos')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="mb-4">
              <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
              <input type="text" id="nombres" name="nombres" value="{{ old('nombres') }}" placeholder="Tu Nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 @error('nombres') border-red-500 @enderror" required />
              @error('nombres')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            
            <div class="mb-4">
              <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
              <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}" placeholder="123456789"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 @error('telefono') border-red-500 @enderror" required />
              @error('telefono')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <div class="mb-4">
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electrónico</label>
              <input type="email" id="correo" name="correo" value="{{ old('email') }}" placeholder="ejemplo@correo.com"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 @error('email') border-red-500 @enderror" required />
              @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <button type="submit"
              class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
              Registrar Estudiante
            </button>

          </form>
        </div>
      </div>
    </div>
  </div>

<!--   <script>
    // Auto-ocultar mensajes después de 5 segundos
    document.addEventListener('DOMContentLoaded', function() {
      const alerts = document.querySelectorAll('.bg-green-100, .bg-red-100');
      alerts.forEach(alert => {
        setTimeout(() => {
          alert.style.transition = 'opacity 0.5s';
          alert.style.opacity = '0';
          setTimeout(() => alert.remove(), 500);
        }, 5000);
      });
    });
  </script> -->

</body>

</html>