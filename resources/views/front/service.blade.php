<x-front-layout>
  <!-- ====== Services Section Start -->
  <section style="padding-left: 5%; padding-right: 5%;" class="pt-10 pb-12 lg:pt-[15px] lg:pb-[90px]">
    <a href="{{ route('front.home') }}" class="font-bold">&laquo; Kembali</a>
    <div class="container">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full px-4">
          <div class="mx-auto mb-12 max-w-[510px] text-center lg:mb-20">
            <span class="mb-2 block text-lg font-semibold text-yellow-500">
              Layanan Kami
            </span>
            <h2 class="text-dar mb-4 text-3xl font-bold sm:text-4xl md:text-[40px]">
              Semua Layanan
            </h2>
            <p class="text-body-color text-base">
              Kami Akan Memberikan Layanan Terbaik Untuk Anda
            </p>
          </div>
        </div>
      </div>

      <section class="light:bg-gray-900 bg-white">
        @foreach ($categories as $category)
          <div class="mx-auto max-w-screen-xl py-8 px-4 sm:py-16 lg:px-6">
            <div class="mb-8 max-w-screen-md lg:mb-16">
              <h2 class="light:text-white mb-4 text-4xl font-extrabold tracking-tight text-gray-900">
                {{ $category->name }}
              </h2>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 md:gap-12 md:space-y-0 lg:grid-cols-3">
              @foreach ($category->services as $service)
                <div>
                  <div class="mb-8 rounded-[20px] bg-white p-10 shadow-md hover:shadow-lg md:px-7 xl:px-10">
                    <div class="mb-8 flex h-[70px] w-[70px] items-center justify-center rounded-2xl bg-yellow-200">
                      <img src="{{ $service->thumbnail }}" alt="thumbnail" style="max-width: 40px;">
                    </div>
                    <h4 class="text-dark mb-3 text-xl font-semibold">
                      {{ $service->name }}
                    </h4>
                    <p class="text-body-color">
                      {{ $service->motto }}
                    </p><br>
                    <a href="#" class="underline">Lihat Detail</a>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach
      </section>
    </div>
  </section>
  <!-- ====== Services Section End -->
  <div class="mx-auto px-4 pt-16 sm:max-w-xl md:max-w-full md:px-24 lg:max-w-screen-xl lg:px-8">
    <div class="row-gap-6 mb-8 grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
      <div class="sm:col-span-2">
        <a href="/" aria-label="Go home" title="Company" class="inline-flex items-center">
          <img src="{{ asset('front/img/logo.png') }}" alt="" style="max-width: 120px;">
        </a>
        <div class="mt-6 lg:max-w-sm">
          <p class="text-sm text-gray-800">
            Kami akan kenalkan anda dengan sistem website dengan lebih Professional yang lebih baik
          </p>
        </div>
      </div>
      <div class="space-y-2 text-sm">
        <p class="text-base font-bold tracking-wide text-gray-900">Contacts</p>
        <div class="flex">
          <p class="mr-1 text-gray-800">Phone:</p>
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
        <span class="text-base font-bold tracking-wide text-gray-900">Social</span>
        <div class="mt-1 flex items-center space-x-3">
          <a href="/" class="hover:text-deep-purple-accent-400 text-gray-500 transition-colors duration-300">
            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
              <path
                d="M24,4.6c-0.9,0.4-1.8,0.7-2.8,0.8c1-0.6,1.8-1.6,2.2-2.7c-1,0.6-2,1-3.1,1.2c-0.9-1-2.2-1.6-3.6-1.6 c-2.7,0-4.9,2.2-4.9,4.9c0,0.4,0,0.8,0.1,1.1C7.7,8.1,4.1,6.1,1.7,3.1C1.2,3.9,1,4.7,1,5.6c0,1.7,0.9,3.2,2.2,4.1 C2.4,9.7,1.6,9.5,1,9.1c0,0,0,0,0,0.1c0,2.4,1.7,4.4,3.9,4.8c-0.4,0.1-0.8,0.2-1.3,0.2c-0.3,0-0.6,0-0.9-0.1c0.6,2,2.4,3.4,4.6,3.4 c-1.7,1.3-3.8,2.1-6.1,2.1c-0.4,0-0.8,0-1.2-0.1c2.2,1.4,4.8,2.2,7.5,2.2c9.1,0,14-7.5,14-14c0-0.2,0-0.4,0-0.6 C22.5,6.4,23.3,5.5,24,4.6z">
              </path>
            </svg>
          </a>
          <a href="/" class="hover:text-deep-purple-accent-400 text-gray-500 transition-colors duration-300">
            <svg viewBox="0 0 30 30" fill="currentColor" class="h-6">
              <circle cx="15" cy="15" r="4"></circle>
              <path
                d="M19.999,3h-10C6.14,3,3,6.141,3,10.001v10C3,23.86,6.141,27,10.001,27h10C23.86,27,27,23.859,27,19.999v-10   C27,6.14,23.859,3,19.999,3z M15,21c-3.309,0-6-2.691-6-6s2.691-6,6-6s6,2.691,6,6S18.309,21,15,21z M22,9c-0.552,0-1-0.448-1-1   c0-0.552,0.448-1,1-1s1,0.448,1,1C23,8.552,22.552,9,22,9z">
              </path>
            </svg>
          </a>
          <a href="/" class="hover:text-deep-purple-accent-400 text-gray-500 transition-colors duration-300">
            <svg viewBox="0 0 24 24" fill="currentColor" class="h-5">
              <path
                d="M22,0H2C0.895,0,0,0.895,0,2v20c0,1.105,0.895,2,2,2h11v-9h-3v-4h3V8.413c0-3.1,1.893-4.788,4.659-4.788 c1.325,0,2.463,0.099,2.795,0.143v3.24l-1.918,0.001c-1.504,0-1.795,0.715-1.795,1.763V11h4.44l-1,4h-3.44v9H22c1.105,0,2-0.895,2-2 V2C24,0.895,23.105,0,22,0z">
              </path>
            </svg>
          </a>
        </div>
        <p class="mt-4 text-sm text-gray-500">
          Aldeoz Building <br>
          Jl. Warung Jati Barat No. 39 <br>
          Kalibata, Pancoran <br>
          Jakarta Selatan <br>
          DKI Jakarta 12740
        </p>
      </div>
    </div>
    <div class="flex flex-col-reverse justify-between border-t pt-5 pb-10 lg:flex-row">
      <p class="text-sm text-gray-600">
        © Copyright 2023 By. Kita Muda Indonesia. All rights reserved.
      </p>
    </div>
  </div>
</x-front-layout>
