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
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" type="module"></script>
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" nomodule defer></script>

  <!-- Styles -->
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
  <!-- navbar -->
  <div x-data="{ open: false }" class="bg-cream w-full text-gray-700">
    <div class="mx-auto flex max-w-screen-xl flex-col px-8 md:flex-row md:items-center md:justify-between">
      <div class="flex flex-row items-center justify-between py-6">
        <div class="relative md:mt-8">
          <a href="#"
            class="focus:shadow-outline relative z-50 rounded-lg text-lg font-bold tracking-widest text-gray-900 focus:outline-none"><img
              src="{{ asset('front/img/logo.png') }}" alt="" style="max-width: 200px" /></a>
        </div>
        <button class="focus:shadow-outline rounded-lg focus:outline-none md:hidden" @click="open = !open">
          <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
            <path x-show="!open" fill-rule="evenodd"
              d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
              clip-rule="evenodd"></path>
            <path x-show="open" fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      <nav :class="{ 'transform md:transform-none': !open, 'h-full': open }"
        class="flex h-0 flex-grow origin-top scale-y-0 flex-col pb-4 duration-300 md:flex md:h-auto md:flex-row md:items-center md:justify-end md:pb-0">
        <a class="focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm hover:text-gray-900 focus:outline-none md:mt-8 md:ml-4"
          href="#">Dasbor</a>
        <a class="focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm hover:text-gray-900 focus:outline-none md:mt-8 md:ml-4"
          href="#layanan">Layanan</a>
        <a class="focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm hover:text-gray-900 focus:outline-none md:mt-8 md:ml-4"
          href="#tentang">Tentang</a>
        <div @click.away="open = false" class="relative" x-data="{ open: false }">
          <button @click="open = !open"
            class="focus:shadow-outline mt-2 rounded-lg bg-transparent px-4 py-2 text-sm hover:text-gray-900 focus:outline-none md:mt-8 md:ml-4">
            <span>Proyek</span>
            <svg fill="currentColor" viewBox="0 0 20 20" :class="{ 'rotate-180': open, 'rotate-0': !open }"
              class="mt-1 ml-1 inline h-4 w-4 transform transition-transform duration-200 md:-mt-1">
              <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
            </svg>
          </button>
          <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95"
            class="md:w-90 absolute right-0 mt-2 w-full origin-top-right rounded-md shadow-lg" style="margin-left: 50%;">
            <div class="dark-mode:bg-gray-800 rounded-md bg-white px-2 py-2 shadow">
              <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                href="#">Link #1</a>
              <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                href="#">Link #2</a>
              <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                href="#">Link #3</a>
              <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                href="#">Link #3</a>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <!-- endnavbar -->

  <!-- hero -->
  <div class="bg-cream">
    <div class="mx-auto flex max-w-screen-xl flex-col items-start px-8 lg:flex-row">
      <!--Left Col-->
      <div class="mb-5 flex w-full flex-col items-start justify-center text-center md:mb-0 lg:w-6/12 lg:pt-24 lg:text-left">
        <h1 data-aos="fade-right" data-aos-once="true" class="text-darken my-4 text-5xl font-bold leading-tight" id="home">
          <span class="text-yellow-500">Selamat Datang di</span><br />
          Kita Muda Indonesia
        </h1>
        <p data-aos="fade-down" data-aos-once="true" data-aos-delay="300" class="mb-8 text-2xl leading-normal">Jadikan
          Perusahaan Anda Menjadi Lebih <br />Profesional</p>
        <div data-aos="fade-up" data-aos-once="true" data-aos-delay="700"
          class="w-full items-center justify-center md:flex md:space-x-5 lg:justify-start">
          <a href="#"
            class="text-darken transform rounded-full bg-yellow-200 py-4 px-9 text-xl font-bold transition duration-300 ease-in-out hover:scale-110 focus:outline-none lg:mx-0">Lihat
            Portofolio Kami</a>
        </div><br>

      </div>
      <!--Right Col-->
      <div class="relative w-full lg:-mt-10 lg:w-6/12" id="girl">
        <img data-aos="fade-up" data-aos-once="true" class="mx-auto w-10/12 2xl:-mb-20" src="{{ asset('front/img/banner.png') }}" />
        <!-- calendar -->
        <div data-aos="fade-up" data-aos-delay="300" data-aos-once="true"
          class="floating-4 absolute top-20 -left-6 sm:top-32 sm:left-10 md:top-40 md:left-16 lg:-left-0 lg:top-52">
          <img class="h-12 rounded-lg bg-white bg-opacity-80 sm:h-16" src="{{ asset('front/img/banner/icon01.svg') }}" />
        </div>
        <!-- red -->
        <div data-aos="fade-up" data-aos-delay="400" data-aos-once="true"
          class="floating absolute top-20 right-10 sm:right-24 sm:top-28 md:top-36 md:right-32 lg:top-32 lg:right-16">
          <svg class="h-16 sm:h-24" viewBox="0 0 149 149" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_d)">
              <rect x="40" y="32" width="69" height="69" rx="14" fill="#F3627C" />
            </g>
            <rect x="51.35" y="44.075" width="47.3" height="44.85" rx="8" fill="white" />
            <path d="M74.5 54.425V78.575" stroke="#F25471" stroke-width="4" stroke-linecap="round" />
            <path d="M65.875 58.7375L65.875 78.575" stroke="#F25471" stroke-width="4" stroke-linecap="round" />
            <path d="M83.125 63.9125V78.575" stroke="#F25471" stroke-width="4" stroke-linecap="round" />
            <defs>
              <filter id="filter0_d" x="0" y="0" width="149" height="149" filterUnits="userSpaceOnUse"
                color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" />
                <feOffset dy="8" />
                <feGaussianBlur stdDeviation="20" />
                <feColorMatrix type="matrix" values="0 0 0 0 0.825 0 0 0 0 0.300438 0 0 0 0 0.396718 0 0 0 0.26 0" />
                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
              </filter>
            </defs>
          </svg>
        </div>
        <!-- ux class -->
        <div data-aos="fade-up" data-aos-delay="500" data-aos-once="true"
          class="floating absolute bottom-14 -left-4 sm:left-2 sm:bottom-20 lg:bottom-24 lg:-left-4">
          <img class="h-20 rounded-lg bg-white bg-opacity-80 sm:h-28" src="{{ asset('front/img/ux-class.svg') }}" alt="" />
        </div>
        <!-- congrats -->
        <div data-aos="fade-up" data-aos-delay="600" data-aos-once="true"
          class="floating-4 absolute bottom-20 -right-6 md:bottom-48 lg:bottom-52 lg:right-8">
          <img class="h-12 rounded-lg bg-white bg-opacity-80 sm:h-16" src="{{ asset('front/img/congrat.svg') }}" alt="" />
        </div>
      </div>
    </div>
    <div class="relative z-40 -mt-14 text-white sm:-mt-24 lg:-mt-36">
      <svg class="xl:h-40 xl:w-full" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M600,112.77C268.63,112.77,0,65.52,0,7.23V120H1200V7.23C1200,65.52,931.37,112.77,600,112.77Z" fill="currentColor"></path>
      </svg>
      <div class="-mt-px h-20 w-full bg-white"></div>
    </div>
  </div>
  <!-- endhero -->

  <!-- container -->
  <div class="container mx-auto max-w-screen-xl overflow-x-hidden px-4 text-gray-700 lg:px-8">
    <!-- trusted by -->
    <div class="mx-auto max-w-4xl">
      <h1 class="mb-3 text-center font-medium text-gray-400">Terpercaya oleh perusahaan ternama</h1>
      <div class="grid grid-cols-3 justify-items-center gap-4 lg:grid-cols-3">
        <img class="h-20" src="{{ asset('front/img/client/5.png') }}" />
        <img class="h-20" src="{{ asset('front/img/client/2.png') }}" />
        <img class="h-20" src="{{ asset('front/img/client/3.png') }}" />
        <img class="h-20 translate-y-2 transform" src="{{ asset('front/img/client/4.png') }}" />
        <img class="h-20" src="{{ asset('front/img/client/6.png') }}" />
        <img class="h-20" src="{{ asset('front/img/client/1.png') }}" />
      </div>
    </div>

    <!-- All-In-One Cloud Software. -->
    <div data-aos="flip-up" class="mx-auto mt-24 max-w-xl text-center">
      <h1 class="text-darken my-3 text-2xl font-bold">Kenapa Harus dengan <span class="text-yellow-500">KMI</span> ?
      </h1>
      <p class="leading-relaxed text-gray-500">Kita Muda Indonesia adalah jawaban dari semua pertanyaan anda tentang
        bagaiman meningkatkan produktivitas Perusahaan anda ?</p>
    </div>
    <!-- card -->
    <div class="mt-20 grid gap-14 md:grid-cols-3 md:gap-5">
      <div data-aos="fade-up" class="rounded-xl bg-white p-6 text-center shadow-xl">
        <div style="background: #2b2b2b"
          class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="h-6 w-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />
          </svg>
        </div>
        <h1 class="text-darken mb-3 text-xl font-medium lg:px-14">Pemesanan Mudah</h1>
        <p class="px-4 text-gray-500">Pemesanan yang yang dapat dilakukan melalui genggaman tangan anda dan layar gadget
          anda melalui website KMI.</p>
      </div>
      <div data-aos="fade-up" data-aos-delay="150" class="rounded-xl bg-white p-6 text-center shadow-xl">
        <div style="background: #ffce00"
          class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="text-dark h-6 w-6">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
          </svg>
        </div>
        <h1 class="text-darken mb-3 text-xl font-medium lg:px-14">Pelayanan Prima</h1>
        <p class="px-4 text-gray-500">Kami akan memberikan Pelayanan terbaik dan pemberian komunikasi layanan terbaik
          demi kenyamanan pelanggan.</p>
      </div>
      <div data-aos="fade-up" data-aos-delay="300" class="rounded-xl bg-white p-6 text-center shadow-xl">
        <div style="background: #2b2b2b"
          class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="h-6 w-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z" />
          </svg>
        </div>
        <h1 class="text-darken mb-3 text-xl font-medium lg:px-14">Pengerjaan Optimal</h1>
        <p class="px-4 text-gray-500">Kami akan memberikan hasil pengerjaan yang cepat dan terbaik, karena kami didukung
          oleh sistem mesin dan pekerja yang terbaik.</p>
      </div>
    </div>

    <!-- lorem -->
    <div class="mt-28" id="layanan">
      <div data-aos="flip-down" class="mx-auto max-w-screen-md text-center">
        <h1 class="mb-4 text-3xl font-bold">Mari Lihat Semua<span class="text-yellow-500"> Layanan Kami</span></h1>
        <p class="text-gray-500">Kami Memiliki 3 Kategori layanan yang didalamnya memiliki beberapa layanan yang dapat
          membantu anda untuk meningkatkan kualitas dan produktivitas Perusahaan Anda.</p>
      </div>
      <div data-aos="fade-up" class="mt-7 flex flex-col justify-center space-y-5 md:flex-row md:space-y-0 md:space-x-6 lg:space-x-10">
        <div class="relative md:w-5/12">
          <img class="rounded-2xl" src="{{ asset('front/img/category/corp.png') }}" alt="" />
          <div class="absolute bottom-0 left-0 right-0 h-full w-full rounded-2xl bg-black bg-opacity-20">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transform">
              <h1 class="mb-3 text-center text-sm font-bold uppercase text-white lg:text-xl">CORPORATION</h1>
              <a href="pages/corp.html"
                class="lg:text-md w-full transform rounded-full border px-6 py-3 text-xs font-medium text-white transition duration-300 ease-in-out hover:scale-110 focus:outline-none">Lihat
                Semua Layanan</a>
            </div>
          </div>
        </div>
        <div class="relative md:w-5/12">
          <img class="rounded-2xl" src="{{ asset('front/img/category/report.png') }}" alt="" />
          <div class="absolute bottom-0 left-0 right-0 h-full w-full rounded-2xl bg-black bg-opacity-20">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transform">
              <h1 class="mb-3 text-center text-sm font-bold uppercase text-white lg:text-xl">REPORT MANAGEMENT</h1>
              <a href="pages/report.html"
                class="lg:text-md w-full transform rounded-full border px-6 py-3 text-xs font-medium text-white transition duration-300 ease-in-out hover:scale-110 focus:outline-none">Lihat
                Semua Layanan</a>
            </div>
          </div>
        </div>
        <div class="relative md:w-5/12">
          <img class="rounded-2xl" src="{{ asset('front/img/category/brand.png') }}" alt="" />
          <div class="absolute bottom-0 left-0 right-0 h-full w-full rounded-2xl bg-black bg-opacity-20">
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 transform">
              <h1 class="mb-3 text-center text-sm font-bold uppercase text-white lg:text-xl">BRANDING SERVICE</h1>
              <a href="pages/brand.html"
                class="lg:text-md w-full transform rounded-full border px-6 py-3 text-xs font-medium text-white transition duration-300 ease-in-out hover:scale-110 focus:outline-none">Lihat
                Semua Layanan</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-36 items-center sm:flex sm:space-x-8" id="tentang">
      <div data-aos="fade-right" class="relative sm:w-1/2">
        <div class="absolute -left-4 -top-3 z-0 h-12 w-12 animate-pulse rounded-full bg-yellow-500"></div>
        <h1 class="text-darken relative z-50 text-2xl font-semibold lg:pr-10">
          Perjalanan
          <span class="text-yellow-500">Kita Muda Indonesia</span>
        </h1>
        <p class="py-5 lg:pr-32">Sejak 2021 kami berdiri, kami telah melalui berbagai tantangan di sepanjang perjalanan
          kami. Namun kami percaya perjalanan yang tidak mudah akan memberikan hasil yang maksimal dan lebih baik.</p>
      </div>
      <div data-aos="fade-left" class="relative mt-10 sm:mt-0 sm:w-1/2">
        <div style="background: #23bdee" class="floating absolute -top-3 -left-3 z-0 h-24 w-24 rounded-lg"></div>
        <img class="relative z-40 rounded-xl" src="{{ asset('front/img/kmi-place.png') }}" alt="" />
        <div class="floating absolute -bottom-3 -right-3 z-10 h-40 w-40 rounded-lg bg-yellow-500"></div>
      </div>
    </div>

    <div class="mt-40 items-start md:flex md:space-x-10">
      <div data-aos="fade-down" class="relative md:w-7/12">
        <div style="background: #33efa0" class="absolute left-4 -top-12 z-0 h-32 w-32 animate-pulse rounded-full"></div>
        <div style="background: #33d9ef" class="absolute left-36 -top-12 z-0 h-5 w-5 animate-ping rounded-full"></div>
        <img class="floating relative z-50" src="{{ asset('front/img/vcall.png') }}" alt="" />
        <div style="background: #5b61eb" class="absolute right-16 -bottom-1 z-0 h-36 w-36 animate-pulse rounded-full">
        </div>
        <div style="background: #f56666" class="absolute right-52 bottom-1 z-0 h-5 w-5 animate-ping rounded-full"></div>
      </div>
      <!-- Visi Misi -->
      <div data-aos="fade-down" class="mt-20 text-gray-500 md:mt-0 md:w-5/12">
        <h1 class="text-darken text-2xl font-semibold lg:pr-40">Visi dan Misi <br /><span class="text-yellow-500">Kita
            Muda Indonesia</span></h1>
        <div class="my-5 flex items-center space-x-5">
          <div class="flex flex-shrink items-center justify-center rounded-full bg-white p-3 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
              class="text-darken h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg>
          </div>
          <p>Memberikan pelayanan terbaik dan optimal untuk pelanggan.</p>
        </div>
        <div class="my-5 flex items-center space-x-5">
          <div class="flex flex-shrink items-center justify-center rounded-full bg-white p-3 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
              class="text-darken h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <p>Kami akan memeberikan layanan setiap waktu 24/7 untuk pelanggan kami.</p>
        </div>
        <div class="my-5 flex items-center space-x-5">
          <div class="flex flex-shrink items-center justify-center rounded-full bg-white p-3 shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
              class="text-darken h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
            </svg>
          </div>
          <p>Membantu Perusahaan dan usaha di sekitar kami agar dapat lebih berkembang dan bersaing.</p>
        </div>
      </div>
      <!-- Visi Misi -->
    </div>

    <!-- Kata Sambutan -->
    <div class="mt-16 flex flex-col items-center md:flex-row md:space-x-10">
      <div data-aos="fade-right" class="md:w-1/2 lg:pl-14">
        <h1 class="text-darken text-2xl font-semibold lg:pr-10">
          <span class="text-yellow-500">Kata Mirza<br /></span>(CEO Kita Muda Indonesia)
        </h1>
        <p class="my-4 text-gray-500 lg:pr-32">"Bisnis dijalankan oleh profesional muda yang berpengalaman dan
          bersemengat untuk bergerak lebih maju sekaligus melepaskan semangat dan kreativitasnya."</p>
      </div>
      <img data-aos="fade-left" class="md:w-1/2" src="{{ asset('front/img/quotes.png') }}" />
    </div>

    <!-- Services -->
    <div class="mt-24 flex flex-col items-start md:flex-row md:space-x-10">
      <div data-aos="zoom-in-right" class="md:w-6/12">
        <img class="mx-auto md:w-8/12" src="{{ asset('front/img/all.png') }}" />
      </div>
      <div data-aos="zoom-in-left" class="md:w-6/12">
        <div class="mb-5 flex items-center space-x-20">
          <span class="absolute w-14 border border-gray-300"></span>
          <h1 class="text-sm tracking-widest text-gray-400">Semua Layanan</h1>
        </div>
        <h1 class="text-darken text-2xl font-semibold lg:pr-40">
          Kami menyediakan
          <span class="text-yellow-500">Berbagai Layanan </span>yang dapat membantu perusahaan anda
        </h1>
        <p class="my-5 text-gray-500 lg:pr-20">Dengan 10 Layanan Kami akan membantu anda untuk mewujudkan mimpi anda
          untuk menciptakan sebuah perusahaan yang berkualitas dan lebih berintegritas.</p>
        <a href="service.html"
          class="my-4 transform rounded-full border border-yellow-500 px-5 py-3 font-medium text-yellow-500 transition duration-300 ease-in-out hover:scale-110 focus:outline-none">Lihat
          Semua Layanan</a>
      </div>
    </div>

    <!-- TESTIMONIAL -->
    <div class="mt-24 flex flex-col-reverse items-start md:flex-row md:space-x-10">
      <div data-aos="zoom-in-right" class="md:w-5/12">
        <div class="mb-5 flex items-center space-x-20">
          <span class="absolute w-14 border border-gray-300"></span>
          <h1 class="text-sm tracking-widest text-gray-400">TESTIMONIAL</h1>
        </div>
        <h1 class="text-darken text-2xl font-semibold lg:pr-40">Berikan kesan dan pesan anda untuk kami</h1><br>
        <form action="#" class="space-y-8">
          <div>
            <label for="email" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Email Anda :</label>
            <input type="email" id="email"
              class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
              placeholder="youremail@perusahaan.ac.id" required>
          </div>
          <div>
            <label for="subject" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-300">Nama Perusahaan :</label>
            <input type="text" id="subject"
              class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light block w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm text-gray-900 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
              placeholder="Masukkan Nama Perusahaan Anda" required>
          </div>
          <div class="sm:col-span-2">
            <label for="message" class="mb-1 block text-sm font-medium text-gray-900 dark:text-gray-400">Kesan dan Pesan Anda :</label>
            <textarea id="message" rows="6"
              class="focus:ring-primary-500 focus:border-primary-500 dark:focus:ring-primary-500 dark:focus:border-primary-500 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
              placeholder="Masukkan Kesan dan Pesan Anda ..."></textarea>
          </div>
          <input type="submit"
            class="my-4 transform rounded-full border border-yellow-500 bg-white py-3 px-5 font-medium text-yellow-500 transition duration-300 ease-in-out hover:scale-110 focus:outline-none"></input>
        </form>
      </div>
      <div data-aos="zoom-in-left" class="md:w-7/12">
        <img class="md:w-10/18 mx-auto" src="{{ asset('front/img/testi.png') }}" />
      </div>
    </div>

    <div class="mt-24 flex flex-col items-start md:flex-row md:space-x-10">
      <div data-aos="zoom-in-right" class="md:w-6/12">
        <img class="mx-auto md:w-8/12" src="{{ asset('front/img/mobile.svg') }}" />
      </div>
      <div data-aos="zoom-in-left" class="md:w-6/12">
        <div class="mb-5 flex items-center space-x-20">
          <span class="absolute w-14 border border-gray-300"></span>
          <h1 class="text-sm tracking-widest text-gray-400">Layanan Portabel</h1>
        </div>
        <h1 class="text-darken text-2xl font-semibold lg:pr-40">
          Kami menyediakan pelayanan dalam versi
          <span class="text-yellow-500">Aplikasi</span>
        </h1>
        <p class="my-5 text-gray-500 lg:pr-20">Kami selain memberikan pelayanan dalam bentuk website, kami juga
          memberikan pelayanan berupa aplikasi yang dapat diunduh pada gawai anda.</p><br>
        <a href="service.html"
          class="my-4 mt-5 transform rounded-full border border-yellow-500 px-5 py-3 font-medium text-yellow-500 transition duration-300 ease-in-out hover:scale-110 focus:outline-none">Unduh
          Aplikasi Android Kami</a>
      </div>
    </div>


    <!-- Projects -->
    <div data-aos="zoom-in-right" class="container my-24 mx-auto px-6">
      <!-- Section: Design Block -->
      <section class="mb-32 text-gray-800">
        <style>
          .zoom:hover img {
            transform: scale(1.1);
          }
        </style>
        <div data-aos="flip-down" class="mx-auto max-w-screen-md text-center">
          <h1 class="mb-4 text-3xl font-bold">Mari Lihat <span class="text-yellow-500">Hasil Product Kami</span></h1>
          <p class="text-gray-500">Kami telah menerima dan membuat banyak product yang variatif oleh beberapa perusahaan
            besar</p>
        </div>

        <div class="my-10 grid gap-6 lg:grid-cols-3">
          @foreach ($portfolios as $portfolio)
            <div class="zoom relative overflow-hidden rounded-lg shadow-lg" style="background-position: 50%" data-mdb-ripple="true"
              data-mdb-ripple-color="dark">
              <img src="{{ $portfolio->thumbnail }}" class="w-full align-middle transition duration-300 ease-linear" />
              <a href="{{ route('portfolio.detail', $portfolio->slug) }}">
                <div class="absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed"
                  style="background-color: rgba(0, 0, 0, 0.3)">
                  <div class="flex h-full items-end justify-start">
                    <h5 class="m-6 text-lg font-bold text-white">{{ $portfolio->service->name }} {{ $portfolio->year_created }}</h5>
                  </div>
                </div>
                <div class="hover-overlay">
                  <div style="background-color: rgba(253, 253, 253, 0)"
                    class="mask absolute top-0 right-0 bottom-0 left-0 h-full w-full overflow-hidden bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
                  </div>
                </div>
              </a>
            </div>
          @endforeach

        </div>
      </section>
      <!-- Section: Design Block -->
    </div>
    <!-- Projects -->
  </div>
  <!-- .container -->

  <!-- Footer -->
  <div class="mx-auto px-4 pt-16 sm:max-w-xl md:max-w-full md:px-24 lg:max-w-screen-xl lg:px-8">
    <div class="row-gap-6 mb-8 grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
      <div class="sm:col-span-2">
        <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
          <img src="{{ asset('front/img/logo.png') }}" alt="" style="max-width: 120px" />
        </a>
        <div class="mt-6 lg:max-w-sm">
          <p class="text-sm text-gray-800">Kami akan kenalkan anda dengan sistem website dengan lebih Professional yang
            lebih baik</p>
        </div>
      </div>
      <div class="space-y-2 text-sm">
        <p class="text-base font-bold tracking-wide text-gray-900">Kontak</p>
        <div class="flex">
          <p class="mr-1 text-gray-800">No. Telpon :</p>
          <a href="tel:850-123-5021" aria-label="Our phone" title="Our phone"
            class="text-deep-purple-accent-400 hover:text-deep-purple-800 transition-colors duration-300">850-123-5021</a>
        </div>
        <div class="flex">
          <p class="mr-1 text-gray-800">Email :</p>
          <a href="mailto:info@lorem.mail" aria-label="Our email" title="Our email"
            class="text-deep-purple-accent-400 hover:text-deep-purple-800 transition-colors duration-300">marketing.kitakita@gmail.com</a>
        </div>
      </div>
      <div>
        <span class="text-base font-bold tracking-wide text-gray-900">Alamat</span>
        <p class="mt-2 text-sm text-gray-500">
          Aldeoz Building <br />
          Jl. Warung Jati Barat No. 39 <br />
          Kalibata, Pancoran <br />
          Jakarta Selatan <br />
          DKI Jakarta 12740
        </p>
      </div>
    </div>
    <div class="flex flex-col-reverse justify-between border-t pt-5 pb-10 lg:flex-row">
      <p class="text-sm text-gray-600">© Copyright 2023 By. Kita Muda Indonesia. All rights reserved.</p>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
