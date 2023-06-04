<x-admin-layout>
  <x-slot name="script">
    <script>
      ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
          console.error(error);
        });
    </script>
  </x-slot>

  <div class="mx-auto w-full px-6 py-6">
    <!-- table 1 -->
    <div class="-mx-3 flex flex-wrap">
      <div class="w-full max-w-full flex-none px-3">
        <div
          class="dark:bg-slate-850 dark:shadow-dark-xl relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border shadow-xl">
          <div class="border-b-solid mb-4 rounded-t-2xl border-b-0 border-b-transparent p-6 pb-0">
            <h6 class="dark:text-white">Detail Pesanan</h6>
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
            <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <!-- Service, Category -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="mb-6 w-full px-3 md:mb-0 md:w-1/2">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="layanan">
                    Nama Layanan :
                  </label>
                  <input type="text" value="{{ $transaction->service->name }}"
                    class="block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:bg-white focus:outline-none"
                    readonly="" />
                </div>
                <div class="w-full px-3 md:w-1/2">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="Kategori">
                    Kategori :
                  </label>
                  <input type="text" value="{{ $transaction->service->category->name }}"
                    class="block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    readonly="">
                </div>
              </div>

              <!-- Name -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="nama">
                    Nama Pemesan :
                  </label>
                  <input type="text" value="{{ $transaction->name }}"
                    class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    readonly="">
                </div>
              </div>

              <!-- Subject -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="Subjek">
                    Subjek Pesanan :
                  </label>
                  <input type="text" value="{{ $transaction->subject }}"
                    class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    readonly="">
                </div>
              </div>

              <!-- Note -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="note">
                    Note Pesanan :
                  </label>
                  <input type="text" value="{{ $transaction->note }}"
                    class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                    readonly="">
                </div>
              </div>

              <!-- Attachments -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="Subjek">
                    File Proposal :
                  </label>
                  <a href="#"
                    class="active:opacity-85 bg-x-25 mb-0 inline-block cursor-pointer rounded-lg border-0 bg-transparent bg-black px-4 py-2.5 text-center align-middle text-sm font-semibold leading-normal text-white shadow-none transition-all ease-in hover:-translate-y-px dark:text-white">
                    <i class="fas fa-file aria-hidden= mr-2 text-white" true="" aria-hidden="true"></i>example.pdf
                  </a>
                </div>
              </div>

              <!-- RFP -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="Subjek">
                    File RFP :
                  </label>
                  <a href="#"
                    class="active:opacity-85 bg-x-25 mb-0 inline-block cursor-pointer rounded-lg border-0 bg-transparent bg-black px-4 py-2.5 text-center align-middle text-sm font-semibold leading-normal text-white shadow-none transition-all ease-in hover:-translate-y-px dark:text-white"><i
                      class="fas fa-file aria-hidden= mr-2 text-white" true="" aria-hidden="true"></i>example.pdf
                  </a>
                </div>
              </div>

              <!-- Status -->
              <div class="-mx-3 mb-6 flex flex-wrap">
                <div class="w-full px-3">
                  <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700" for="status">
                    Status Pemesanan
                  </label>
                  <div class="relative">
                    <select name="status"
                      class="block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 pr-8 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                      id="status">
                      <option value="requested" {{ $transaction->status == 'requested' ? 'selected' : '' }}>Menunggu Konfirmasi</option>
                      <option value="accepted" {{ $transaction->status == 'accepted' ? 'selected' : '' }}>Sudah Dikonfirmasi</option>
                      <option value="rejected" {{ $transaction->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                      <option value="done" {{ $transaction->status == 'done' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    </div>
                  </div>
                </div>
              </div>

              <!-- Button | Submit -->
              <div class="-mx-5 mb-2 flex flex-wrap">
                <button type="submit"
                  class="active:opacity-85 bg-x-25 mb-0 inline-block cursor-pointer rounded-lg border-0 bg-transparent bg-slate-500 px-4 py-2.5 text-center align-middle text-sm font-semibold leading-normal text-white shadow-none transition-all ease-in hover:-translate-y-px dark:text-white">
                  <i class="fas fa-edit aria-hidden= mr-2 text-white" aria-hidden="true"></i>Update
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</x-admin-layout>
