<!DOCTYPE html> <!-- Indica que este es un documento HTML5 -->
<html lang="es"> <!-- Define el idioma de la página como español -->

<head>
  <meta charset="UTF-8" /> <!-- Define la codificación de caracteres (UTF-8) para admitir caracteres especiales -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" /> <!-- Hace que el sitio sea responsive para móviles -->
  <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Token CSRF para proteger formularios contra ataques de falsificación -->

  <script src="https://cdn.tailwindcss.com"></script> <!-- Carga Tailwind CSS (framework de estilos basado en clases) -->
  <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" /> <!-- Estilos de Flowbite (componentes UI para Tailwind) -->
  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script> <!-- Script JS de Flowbite -->
  <script src="https://kit.fontawesome.com/e2d71e4ca2.js" crossorigin="anonymous"></script> <!-- Carga íconos de FontAwesome -->

  <title>Nuevo Estudiante</title> <!-- Título que se muestra en la pestaña del navegador -->
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen"> <!-- Cuerpo con fondo claro o oscuro según el modo y altura mínima igual a la pantalla -->

  @include('partes.nav') <!-- Inserta el archivo Blade con la barra de navegación -->

  <div class="flex"> <!-- Contenedor flexible para alinear el aside y el contenido principal -->

    <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16"> <!-- Barra lateral izquierda fija, oscura -->
      @include('partes.sidebar') <!-- Inserta el archivo Blade de la barra lateral -->
    </aside>

    <div class="ml-64 w-full pt-16 p-6 min-h-[calc(100vh-4rem)] flex flex-col"> <!-- Contenedor principal desplazado a la derecha por el aside -->

      <div class="flex-grow flex items-center justify-center"> <!-- Centra el contenido vertical y horizontalmente -->
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-8 w-full max-w-md"> <!-- Tarjeta blanca o gris oscuro con sombra y bordes redondeados -->

          {{-- Mensajes de éxito y error --}}
          @if(session('success')) <!-- Si hay un mensaje de éxito en sesión, se muestra -->
            <div class="mb-4 p-4 text-green-800 bg-green-100 rounded-lg dark:bg-green-900 dark:text-green-200">
              <div class="flex items-center">
                <i class="fas fa-check-circle mr-2"></i> <!-- Icono de éxito -->
                {{ session('success') }} <!-- Mensaje de éxito -->
              </div>
            </div>
          @endif

          @if(session('error')) <!-- Si hay un mensaje de error en sesión, se muestra -->
            <div class="mb-4 p-4 text-red-800 bg-red-100 rounded-lg dark:bg-red-900 dark:text-red-200">
              <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i> <!-- Icono de error -->
                {{ session('error') }} <!-- Mensaje de error -->
              </div>
            </div>
          @endif

          <form action="{{ route('estudiante.store') }}" method="POST" id="agregar-estudiante"> <!-- Formulario para registrar estudiante -->
            @csrf <!-- Token CSRF obligatorio en formularios para proteger contra ataques -->

            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center">
              Registrar Nuevo Estudiante
            </h2> <!-- Título centrado del formulario -->

            <!-- Campo Código -->
            <div class="mb-4">
              <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código</label>
              <input type="number" id="codigo" name="codigo" value="{{ old('codigo') }}" placeholder="2273300023"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 
                @error('codigo') border-red-500 @enderror" />
              @error('codigo') <!-- Si hay error con el campo código, muestra el mensaje -->
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Campo Apellidos -->
            <div class="mb-4">
              <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
              <input type="text" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" placeholder="Tu Apellido"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 
                @error('apellidos') border-red-500 @enderror" />
              @error('apellidos') <!-- Muestra errores si existen -->
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Campo Nombres -->
            <div class="mb-4">
              <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
              <input type="text" id="nombres" name="nombres" value="{{ old('nombres') }}" placeholder="Tu Nombre"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 
                @error('nombres') border-red-500 @enderror" />
              @error('nombres')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Campo Teléfono -->
            <div class="mb-4">
              <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
              <input type="tel" id="telefono" name="telefono" value="{{ old('telefono') }}" placeholder="123456789"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 
                @error('telefono') border-red-500 @enderror" />
              @error('telefono')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Campo Correo Electrónico -->
            <div class="mb-4">
              <label for="correo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electrónico</label>
              <input type="email" id="correo" name="correo" value="{{ old('email') }}" placeholder="ejemplo@correo.com"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 
                dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400 
                @error('email') border-red-500 @enderror" />
              @error('correo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Botón de envío -->
            <button type="submit"
              class="w-full text-white bg-blue-600 hover:bg-blue-700 
              focus:ring-4 focus:outline-none focus:ring-blue-300 
              font-medium rounded-lg text-sm px-5 py-2.5 
              dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
              Registrar Estudiante
            </button>

          </form> <!-- Fin del formulario -->
        </div> <!-- Fin de la tarjeta -->
      </div> <!-- Fin del centrado -->
    </div> <!-- Fin del contenedor principal -->
  </div> <!-- Fin del flex de aside + contenido -->

</body>
</html> <!-- Fin del documento HTML -->
