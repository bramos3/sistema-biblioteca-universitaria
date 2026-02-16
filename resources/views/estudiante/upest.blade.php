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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="../jquery/estudiante.js"></script>

  <title>Modificar Estudiante</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen">

  @include('partes.nav')

  <div class="flex">
    <aside class="w-64 h-screen bg-gray-800 text-white fixed top-0 left-0 pt-16">
      @include('partes.sidebar')
    </aside>

    <div class="ml-64 w-full pt-16 p-6 min-h-[calc(100vh-4rem)] flex flex-col">

      <div class="flex-grow flex items-center justify-center">
        <form id="modificar-estudiante" class="bg-white dark:bg-gray-800 m-0 shadow-lg rounded-2xl p-8 w-full max-w-md">
          <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 text-center"> Modificar Estudiante</h2>


          <input type="hidden" id="codigo" name="codigo" value=<?php echo $estudiante['codigo'] ?> />


          <div class="mb-3">
            <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" placeholder="Ramos Torres"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" value="<?php echo $estudiante['apellidos'] ?>" required />
          </div>

          <div class="mb-4">
            <label for="nombres" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombres</label>
            <input type="text" id="nombres" name="nombre" placeholder="Brandhon "
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" value="<?php echo $estudiante['nombres'] ?>" required />
          </div>
          <div class="mb-4">
            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
            <input type="text" id="telefono" name="telefono" placeholder="123456789"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" value="<?php echo $estudiante['telefono'] ?>" required />
          </div>

          <div class="mb-4">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Electrónico</label>
            <input type="email" id="email" name="email" placeholder="ejemplo@correo.com"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400" value="<?php echo $estudiante['correo'] ?>" required />
          </div>




          <button type="submit"
            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
            Modificar Estudiante
          </button>

        </form>
      </div>
    </div>
  </div>

</body>

</html>