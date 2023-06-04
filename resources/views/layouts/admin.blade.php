<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="76x76" href="/admin/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="/admin/img/favicon.png" />

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{ url('/admin/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ url('/admin/css/nucleo-svg.css') }}" rel="stylesheet" />

  <!-- Libraries -->
  <link href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css" rel="stylesheet">
  <link href="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/css/dataTables.checkboxes.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.9/dist/sweetalert2.min.css" rel="stylesheet">

  <!-- Scripts -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
  <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.10/js/dataTables.checkboxes.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
  <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.9/dist/sweetalert2.all.min.js"></script>

  <!-- Styles -->
  <link href="{{ url('/admin/css/argon-dashboard-tailwind.css') }}" rel="stylesheet">
  <style>
    /*Form fields*/
    .dataTables_wrapper select,
    .dataTables_wrapper .dataTables_filter input {
      color: #4a5568;
      /*text-gray-700*/
      padding-left: 1rem;
      /*pl-4*/
      padding-right: 1rem;
      /*pl-4*/
      padding-top: .5rem;
      /*pl-2*/
      padding-bottom: .5rem;
      /*pl-2*/
      line-height: 1.25;
      /*leading-tight*/
      border-width: 2px;
      /*border-2*/
      border-radius: .25rem;
      border-color: #edf2f7;
      /*border-gray-200*/
      background-color: #edf2f7;
      /*bg-gray-200*/
    }

    .dataTables_wrapper select {
      padding-right: 1.5rem;
    }

    /*Row Hover*/
    table.dataTable.hover tbody tr:hover,
    table.dataTable.display tbody tr:hover {
      background-color: #ebf4ff;
      /*bg-indigo-100*/
    }

    /*Pagination Buttons*/
    .dataTables_wrapper .dataTables_paginate .paginate_button {
      font-weight: 700;
      /*font-bold*/
      border-radius: .25rem;
      /*rounded*/
      border: 1px solid transparent;
      /*border border-transparent*/
    }

    /*Pagination Buttons - Current selected */
    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
      color: #fff !important;
      /*text-white*/
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
      /*shadow*/
      font-weight: 700;
      /*font-bold*/
      border-radius: .25rem;
      /*rounded*/
      background: #008652 !important;
      /*bg-indigo-500*/
      border: 1px solid transparent;
      /*border border-transparent*/
    }

    /*Pagination Buttons - Hover */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      color: #fff !important;
      /*text-white*/
      box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
      /*shadow*/
      font-weight: 700;
      /*font-bold*/
      border-radius: .25rem;
      /*rounded*/
      background: #008652 !important;
      /*bg-indigo-500*/
      border: 1px solid transparent;
      /*border border-transparent*/
    }

    /*Add padding to bottom border */
    table.dataTable.no-footer {
      border-bottom: 1px solid #e2e8f0;
      /*border-b-1 border-gray-300*/
      margin-top: 0.75em;
      margin-bottom: 0.75em;
    }

    /*Change colour of responsive icon*/
    table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
      background-color: #008652 !important;
      /*bg-indigo-500*/
    }

    table.dataTable tr th.select-checkbox.selected::after {
      content: "✔";
      margin-top: -11px;
      margin-left: -4px;
      text-align: center;
      text-shadow: rgb(176, 190, 217) 1px 1px, rgb(176, 190, 217) -1px -1px, rgb(176, 190, 217) 1px -1px, rgb(176, 190, 217) -1px 1px;
    }

    .ck-editor__editable_inline {
      min-height: 150px;
    }
  </style>
</head>

<body class="leading-default m-0 bg-gray-50 font-sans text-base font-normal text-slate-500 antialiased dark:bg-slate-900">
  <div class="min-h-75 absolute w-full bg-blue-500 dark:hidden"></div>
  <!-- sidenav  -->
  <aside
    class="max-w-64 ease-nav-brand z-990 dark:bg-slate-850 fixed inset-y-0 my-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-xl transition-transform duration-200 dark:shadow-none xl:left-0 xl:ml-6 xl:translate-x-0"
    aria-expanded="false">
    <div class="h-19">
      <i class="fas fa-times absolute top-0 right-0 cursor-pointer p-4 text-slate-400 opacity-50 dark:text-white xl:hidden" sidenav-close></i>
      <a class="m-0 block whitespace-nowrap px-8 py-6 text-sm text-slate-700 dark:text-white"
        href="https://demos.creative-tim.com/argon-dashboard-tailwind/pages/dashboard.html" target="_blank">
        <img src="/admin/img/logo-ct-dark.png" class="ease-nav-brand inline h-full max-h-8 max-w-full transition-all duration-200 dark:hidden"
          alt="main_logo" />
        <img src="/admin/img/logo-ct.png" class="ease-nav-brand hidden h-full max-h-8 max-w-full transition-all duration-200 dark:inline"
          alt="main_logo" />
        <span class="ease-nav-brand ml-1 font-semibold transition-all duration-200">KitaMudaIndonesia</span>
      </a>
    </div>

    <hr
      class="mt-0 h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="h-sidenav block max-h-screen w-auto grow basis-full items-center overflow-auto">
      <ul class="mb-0 flex flex-col pl-0">
        <li class="mt-0.5 w-full">
          <a class="py-2.7 bg-blue-500/13 ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 text-sm font-semibold text-slate-700 transition-colors dark:text-white dark:opacity-80"
            href="{{ route('admin.dashboard') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="ni ni-tv-2 relative top-0 text-sm leading-normal text-blue-500"></i>
            </div>
            <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Dashboard</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="py-2.7 ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80"
            href="{{ route('admin.transactions.index') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="ni ni-money-coins relative top-0 text-sm leading-normal text-orange-500"></i>
            </div>
            <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Laporan Transaksi</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="py-2.7 ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80"
            href="{{ route('admin.categories.index') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
              <i class="ni ni-atom relative top-0 text-sm leading-normal text-emerald-500"></i>
            </div>
            <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Kategori</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="py-2.7 ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80"
            href="{{ route('admin.services.index') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
              <i class="ni ni-settings relative top-0 text-sm leading-normal text-emerald-500"></i>
            </div>
            <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Layanan</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="py-2.7 ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80"
            href="{{ route('admin.portfolios.index') }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
              <i class="ni ni-app relative top-0 text-sm leading-normal text-inherit"></i>
            </div>
            <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Projects</span>
          </a>
        </li>


        <li class="mt-4 w-full">
          <h6 class="ml-2 pl-6 text-xs font-bold uppercase leading-tight opacity-60 dark:text-white">Account pages</h6>
        </li>

        <li class="mt-0.5 w-full">
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <a class="py-2.7 ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 text-sm transition-colors dark:text-white dark:opacity-80"
              href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="ni ni-single-02 relative top-0 text-sm leading-normal text-slate-700"></i>
              </div>
              <span class="ease pointer-events-none ml-1 opacity-100 duration-300">Logout</span>
            </a>
          </form>
        </li>
      </ul>
    </div>
  </aside>
  <!-- end sidenav -->

  <main class="xl:ml-68 relative h-full max-h-screen rounded-xl transition-all duration-200 ease-in-out">
    <!-- Navbar -->
    <nav
      class="duration-250 relative mx-6 flex flex-wrap items-center justify-between rounded-2xl px-0 py-2 shadow-none transition-all ease-in lg:flex-nowrap lg:justify-start"
      navbar-main navbar-scroll="false">
      <div class="flex-wrap-inherit mx-auto flex w-full items-center justify-between px-4 py-1">
        <nav>
          <!-- breadcrumb -->
          <ol class="mr-12 flex flex-wrap rounded-lg bg-transparent pt-1 sm:mr-16">
            <li class="text-sm leading-normal">
              <a class="text-white opacity-50" href="javascript:;">Pages</a>
            </li>
            <li class="pl-2 text-sm capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']"
              aria-current="page">Dashboard</li>
          </ol>
          <h6 class="mb-0 font-bold capitalize text-white">Dashboard</h6>
        </nav>

        <div class="mt-2 flex grow items-center sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
          <div class="flex items-center md:ml-auto md:pr-4">
          </div>
          <ul class="md-max:w-full mb-0 flex list-none flex-row justify-end pl-0">
            <li class="flex items-center">
              <a href="#" class="ease-nav-brand block px-0 py-2 text-sm font-semibold text-white transition-all">
                <i class="fa fa-user sm:mr-1"></i>
                <span class="hidden sm:inline">{{ auth()->user()->name }}</span>
              </a>
            </li>
            <li class="flex items-center pl-4 xl:hidden">
              <a href="javascript:;" class="ease-nav-brand block p-0 text-sm text-white transition-all" sidenav-trigger>
                <div class="w-4.5 overflow-hidden">
                  <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                  <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                </div>
              </a>
            </li>
            <li class="flex items-center px-4">
              <a href="javascript:;" class="ease-nav-brand p-0 text-sm text-white transition-all">
                <i fixed-plugin-button-nav class="fa fa-cog cursor-pointer"></i>
                <!-- fixed-plugin-button-nav  -->
              </a>
            </li>

            <!-- notifications -->

            <li class="relative flex items-center pr-2">
              <p class="transform-dropdown-show hidden"></p>
              <a href="javascript:;" class="ease-nav-brand block p-0 text-sm text-white transition-all" dropdown-trigger aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>

              <ul dropdown-menu
                class="transform-dropdown before:leading-default before:duration-350 before:ease lg:shadow-3xl duration-250 min-w-44 before:text-5.5 dark:shadow-dark-xl before:font-awesome dark:bg-slate-850 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-sm text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 before:sm:right-8 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                <!-- add show class on dropdown open js -->
                <li class="relative mb-2">
                  <a class="ease py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 dark:hover:bg-slate-900 lg:transition-colors"
                    href="javascript:;">
                    <div class="flex py-1">
                      <div class="my-auto">
                        <img src="/admin/img/team-2.jpg"
                          class="mr-4 inline-flex h-9 w-9 max-w-none items-center justify-center rounded-xl text-sm text-white" />
                      </div>
                      <div class="flex flex-col justify-center">
                        <h6 class="mb-1 text-sm font-normal leading-normal dark:text-white"><span class="font-semibold">New message</span> from Laur
                        </h6>
                        <p class="mb-0 text-xs leading-tight text-slate-400 dark:text-white/80">
                          <i class="fa fa-clock mr-1"></i>
                          13 minutes ago
                        </p>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end Navbar -->

    {{ $slot }}
  </main>
  <div fixed-plugin>
    <a fixed-plugin-button class="z-990 rounded-circle fixed bottom-8 right-8 cursor-pointer bg-white px-4 py-2 text-xl text-slate-700 shadow-lg">
      <i class="fa fa-cog pointer-events-none py-2"> </i>
    </a>
    <!-- -right-90 in loc de 0-->
    <div fixed-plugin-card
      class="z-sticky shadow-3xl w-90 ease -right-90 dark:bg-slate-850/80 fixed top-0 left-auto flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white/80 bg-clip-border px-2.5 backdrop-blur-2xl backdrop-saturate-200 duration-200">
      <div class="mb-0 rounded-t-2xl border-b-0 px-6 pt-4 pb-0">
        <div class="float-left">
          <h5 class="mt-4 mb-0 dark:text-white">Argon Configurator</h5>
          <p class="dark:text-white dark:opacity-80">See our dashboard options.</p>
        </div>
        <div class="float-right mt-6">
          <button fixed-plugin-close-button
            class="tracking-tight-rem bg-150 bg-x-25 active:opacity-85 mb-4 inline-block cursor-pointer rounded-lg border-0 bg-transparent p-0 text-center align-middle text-sm font-bold uppercase leading-normal text-slate-700 shadow-none transition-all ease-in hover:-translate-y-px dark:text-white">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr
        class="mx-0 my-1 h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
      <div class="flex-auto overflow-auto p-6 pt-0 sm:pt-4">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0 dark:text-white">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)">
          <div class="my-2 text-left" sidenav-colors>
            <span
              class="py-2.2 rounded-circle h-5.6 mr-1.25 w-5.6 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-slate-700 bg-gradient-to-tl from-blue-500 to-violet-500 text-center align-baseline text-xs font-bold uppercase leading-none text-white transition-all duration-200 ease-in-out hover:border-slate-700"
              active-color data-color="blue" onclick="sidebarColor(this)"></span>
            <span
              class="py-2.2 rounded-circle h-5.6 mr-1.25 w-5.6 dark:from-slate-750 dark:to-gray-850 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white bg-gradient-to-tl from-zinc-800 to-zinc-700 text-center align-baseline text-xs font-bold uppercase leading-none text-white transition-all duration-200 ease-in-out hover:border-slate-700 dark:bg-gradient-to-tl"
              data-color="gray" onclick="sidebarColor(this)"></span>
            <span
              class="py-2.2 rounded-circle h-5.6 mr-1.25 w-5.6 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white bg-gradient-to-tl from-blue-700 to-cyan-500 text-center align-baseline text-xs font-bold uppercase leading-none text-white transition-all duration-200 ease-in-out hover:border-slate-700"
              data-color="cyan" onclick="sidebarColor(this)"></span>
            <span
              class="py-2.2 rounded-circle h-5.6 mr-1.25 w-5.6 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white bg-gradient-to-tl from-emerald-500 to-teal-400 text-center align-baseline text-xs font-bold uppercase leading-none text-white transition-all duration-200 ease-in-out hover:border-slate-700"
              data-color="emerald" onclick="sidebarColor(this)"></span>
            <span
              class="py-2.2 rounded-circle h-5.6 mr-1.25 w-5.6 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white bg-gradient-to-tl from-orange-500 to-yellow-500 text-center align-baseline text-xs font-bold uppercase leading-none text-white transition-all duration-200 ease-in-out hover:border-slate-700"
              data-color="orange" onclick="sidebarColor(this)"></span>
            <span
              class="py-2.2 rounded-circle h-5.6 mr-1.25 w-5.6 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white bg-gradient-to-tl from-red-600 to-orange-600 text-center align-baseline text-xs font-bold uppercase leading-none text-white transition-all duration-200 ease-in-out hover:border-slate-700"
              data-color="red" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-4">
          <h6 class="mb-0 dark:text-white">Sidenav Type</h6>
          <p class="text-sm leading-normal dark:text-white dark:opacity-80">Choose between 2 different sidenav types.
          </p>
        </div>
        <div class="flex">
          <button transparent-style-btn
            class="xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 dark:opacity-65 hover:shadow-xs active:opacity-85 tracking-tight-rem bg-150 bg-x-25 mb-2 inline-block w-full cursor-pointer rounded-lg border border-solid border-transparent bg-blue-500 bg-gradient-to-tl from-blue-500 to-violet-500 px-4 py-2.5 text-center align-middle text-sm font-bold capitalize leading-normal text-white shadow-md transition-all ease-in hover:-translate-y-px hover:border-blue-500 dark:pointer-events-none dark:cursor-not-allowed dark:border-0 dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white"
            data-class="bg-transparent" active-style>White</button>
          <button white-style-btn
            class="xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-blue-500 xl-max:to-violet-500 xl-max:text-white xl-max:border-0 dark:opacity-65 hover:shadow-xs active:opacity-85 tracking-tight-rem bg-150 bg-x-25 mb-2 ml-2 inline-block w-full cursor-pointer rounded-lg border border-solid border-blue-500 bg-transparent bg-none px-4 py-2.5 text-center align-middle text-sm font-bold capitalize leading-normal text-blue-500 shadow-md transition-all ease-in hover:-translate-y-px hover:border-blue-500 dark:pointer-events-none dark:cursor-not-allowed dark:border-0 dark:bg-gradient-to-tl dark:from-blue-500 dark:to-violet-500 dark:text-white"
            data-class="bg-white">Dark</button>
        </div>
        <p class="mt-2 block text-sm leading-normal dark:text-white dark:opacity-80 xl:hidden">You can change the
          sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="my-4 flex">
          <h6 class="mb-0 dark:text-white">Navbar Fixed</h6>
          <div class="min-h-6 ml-auto block pl-0">
            <input navbarFixed
              class="rounded-10 duration-250 after:rounded-circle after:duration-250 checked:after:translate-x-5.3 relative float-left mt-1 ml-auto h-5 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all ease-in-out after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:shadow-2xl after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
              type="checkbox" />
          </div>
        </div>
        <hr
          class="my-6 h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />
        <div class="mt-2 mb-12 flex">
          <h6 class="mb-0 dark:text-white">Light / Dark</h6>
          <div class="min-h-6 ml-auto block pl-0">
            <input dark-toggle
              class="rounded-10 duration-250 after:rounded-circle after:duration-250 checked:after:translate-x-5.3 relative float-left mt-1 ml-auto h-5 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all ease-in-out after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:shadow-2xl after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right"
              type="checkbox" />
          </div>
        </div>
        <a target="_blank"
          class="hover:shadow-xs active:opacity-85 tracking-tight-rem bg-150 bg-x-25 dark:from-slate-750 dark:to-gray-850 mb-4 inline-block w-full cursor-pointer rounded-lg border border-solid border-transparent bg-transparent bg-gradient-to-tl from-zinc-800 to-zinc-700 px-6 py-2.5 text-center align-middle text-sm font-bold leading-normal text-white shadow-md transition-all ease-in hover:-translate-y-px dark:border dark:border-solid dark:border-white dark:bg-gradient-to-tl"
          href="https://www.creative-tim.com/product/argon-dashboard-tailwind">Free Download</a>
        <a target="_blank"
          class="active:shadow-xs active:opacity-85 tracking-tight-rem bg-150 bg-x-25 mb-4 inline-block w-full cursor-pointer rounded-lg border border-solid border-slate-700 bg-transparent px-6 py-2.5 text-center align-middle text-sm font-bold leading-normal text-slate-700 shadow-none transition-all ease-in hover:-translate-y-px hover:bg-transparent hover:text-slate-700 hover:shadow-none active:bg-slate-700 active:text-white active:hover:bg-transparent active:hover:text-slate-700 active:hover:shadow-none dark:border dark:border-solid dark:border-white dark:text-white"
          href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/argon-dashboard/">View
          documentation</a>
        <div class="w-full text-center">
          <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard-tailwind" data-icon="octicon-star"
            data-size="large" data-show-count="true" aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
          <h6 class="mt-4 dark:text-white">Thank you for sharing!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23tailwindcss&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard-tailwind"
            class="hover:shadow-xs active:opacity-85 tracking-tight-rem bg-150 bg-x-25 me-2 mb-0 mr-2 inline-block cursor-pointer rounded-lg border-0 border-slate-700 bg-slate-700 px-5 py-2.5 text-center align-middle text-sm font-bold leading-normal text-white shadow-md transition-all ease-in hover:-translate-y-px"
            target="_blank"> <i class="fab fa-twitter mr-1"></i> Tweet </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard-tailwind"
            class="hover:shadow-xs active:opacity-85 tracking-tight-rem bg-150 bg-x-25 me-2 mb-0 mr-2 inline-block cursor-pointer rounded-lg border-0 border-slate-700 bg-slate-700 px-5 py-2.5 text-center align-middle text-sm font-bold leading-normal text-white shadow-md transition-all ease-in hover:-translate-y-px"
            target="_blank"> <i class="fab fa-facebook-square mr-1"></i> Share </a>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ url('/admin/js/plugins/chartjs.min.js') }}" async></script>
  <script src="{{ url('/admin/js/plugins/perfect-scrollbar.min.js') }}" async></script>

  {{ $script ?? '' }}
  {{ $modal ?? '' }}
</body>

</html>
