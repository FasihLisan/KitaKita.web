<x-admin-layout>
  <div class="mx-auto w-full px-6 py-6">
    <!-- table 1 -->
    <div class="-mx-3 flex flex-wrap">
      <div class="w-full max-w-full flex-none px-3">
        <div
          class="dark:bg-slate-850 dark:shadow-dark-xl relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border shadow-xl">
          <div class="border-b-solid mb-4 rounded-t-2xl border-b-0 border-b-transparent p-6 pb-0">
            <h6 class="dark:text-white">Tambah Portfolio</h6>
          </div>
          <div class="flex-auto px-3 py-5 pt-0 pb-2">
            @if ($errors->any())
              <div class="mb-5" role="alert">
                <div class="rounded-t bg-red-500 px-4 py-2 font-bold text-white">
                  Ada kesalahan!
                </div>
                <div class="rounded-b border border-t-0 border-red-400 bg-red-100 px-4 py-3 text-red-700">
                  <p>
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                  </p>
                </div>
              </div>
            @endif

            <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <!-- Input Text | Name -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="name"> Nama Portfolio : </label>
                  <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Masukkan Nama Portfolio"
                    class="mb-1 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    required />
                  <div class="mt-0 text-sm text-gray-500">
                    Nama Portfolio. Contoh: Calendar OK-BANK 2023. Wajib diisi. Maksimal 255 karakter.
                  </div>
                </div>
              </div>

              <!-- Input Select | Category -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="Kategori"> Jenis Layanan : </label>
                  <div class="relative">
                    <select name="service_id"
                      class="block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 pr-8 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                      id="status">
                      <option value="">Masukkan Jenis Layanan Anda</option>
                      @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ old('service_id' == $service->id ? 'selected' : '') }}>
                          {{ $service->name }}
                        </option>
                      @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"></div>
                    <div class="mt-1 text-sm text-gray-500">
                      Jenis layanan. Contoh: Annual Report, Calendar, dsb. Wajib diisi.
                    </div>
                  </div>
                </div>
              </div>

              <!-- Input File | Photos -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for=""> Photos : </label>
                  <input type="file" name="photos[]" accept="image/png, image/jpeg, image/jpg, image/webp"
                    class="mb-1 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    multiple />
                  <div class="mt-0 text-sm text-gray-500">
                    Foto Portfolio. Lebih dari satu foto dapat diupload. Wajib Diisi. Max 2MB per file
                  </div>
                </div>
              </div>

              <!-- Button Submit -->
              <div class="-mx-5 mb-2 flex flex-wrap">
                <button type="submit"
                  class="active:opacity-85 bg-x-25 mb-0 inline-block cursor-pointer rounded-lg border-0 bg-transparent bg-black px-4 py-2.5 text-center align-middle text-sm font-bold leading-normal text-white shadow-none transition-all ease-in hover:-translate-y-px dark:text-white">
                  <i class="fas fa-plus mr-2 text-white" aria-hidden="true"></i>Simpan
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>
