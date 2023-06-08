<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kita Muda Indonesia</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Libraries -->
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
  <link href="https://unpkg.com/aos@next/dist/aos.css" rel="stylesheet" />

  <!-- Scripts -->
  @vite('resources/css/app.css')
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" type="module"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" nomodule defer></script>

  <!-- Styles -->
  @livewireStyles
  <style>
    /*primary color*/
    .bg-cream {
      background-color: #fff2e1;
    }

    /*font*/
    body {
      font-family: "Poppins", sans-serif;
    }

    .bg-yellow-500 {
      background-color: #e4b900;
    }

    .text-yellow-500 {
      color: #e4b900;
    }

    .floating {
      animation-name: floating;
      animation-duration: 3s;
      animation-iteration-count: infinite;
      animation-timing-function: ease-in-out;
    }

    @keyframes floating {
      0% {
        transform: translate(0, 0px);
      }

      50% {
        transform: translate(0, 8px);
      }

      100% {
        transform: translate(0, -0px);
      }
    }

    .floating-4 {
      animation-name: floating;
      animation-duration: 4s;
      animation-iteration-count: infinite;
      animation-timing-function: ease-in-out;
    }

    @keyframes floating-4 {
      0% {
        transform: translate(0, 0px);
      }

      50% {
        transform: translate(0, 8px);
      }

      100% {
        transform: translate(0, -0px);
      }
    }

    .text-darken {
      color: #1e1e1e;
    }
  </style>
</head>

<body class="antialiased">
  {{ $slot }}

  <!-- Scripts -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
