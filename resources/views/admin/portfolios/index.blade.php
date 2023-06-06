<x-admin-layout>
  <x-slot name="script">
    <script src="{{ url('/admin/js/argon-dashboard-tailwind.js') }}" async></script>
    <script>
      var datatable = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        stateSave: true,
        ajax: {
          url: '{!! url()->current() !!}'
        },
        language: {
          url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/id.json'
        },
        columns: [{
            data: 'name',
            name: 'name',
          },
          {
            data: 'service.name',
            name: 'service.name',
          },
          {
            data: 'year_created',
            name: 'year_created',
          },
          {
            data: 'thumbnail',
            name: 'thumbnail',
            orderable: false,
            searchable: false,
          },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false,
            width: '17%',
          }
        ],
        columnDefs: [{
          targets: [0, 1, 2],
          className: "text-center",
        }],
      });
    </script>
  </x-slot>

  {{-- Sweetalert if success exist --}}
  @if (session()->has('success'))
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
        showConfirmButton: false,
        timer: 3000,
      })
    </script>
  @endif

  <div class="mx-auto w-full px-6 py-6">
    <!-- table 1 -->
    <div class="-mx-3 flex flex-wrap">
      <div class="w-full max-w-full flex-none px-3">
        <div
          class="dark:bg-slate-850 dark:shadow-dark-xl relative mb-6 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid border-transparent bg-white bg-clip-border shadow-xl">
          <div class="border-b-solid mb-0 rounded-t-2xl border-b-0 border-b-transparent p-6 pb-5">
            <h6 class="dark:text-white">Portfolio</h6>
            <a class="active:opacity-85 bg-x-25 mb-0 inline-block cursor-pointer rounded-lg border-0 bg-transparent bg-black px-4 py-2.5 text-center align-middle text-sm font-semibold leading-normal text-white shadow-none transition-all ease-in hover:-translate-y-px dark:text-white"
              href="{{ route('admin.portfolios.create') }}">
              <i class="fas fa-plus aria-hidden= mr-2 text-white" true></i>
              Tambah Portfolio
            </a>
          </div>
          <div class="flex-auto px-0 pt-0 pb-2">
            <div class="overflow-x-auto p-4">
              <table id="dataTable" class="mb-0 w-full border-collapse items-center align-top text-slate-500 dark:border-white/40">
                <thead class="align-bottom">
                  <tr>
                    <th>Nama Portfolio</th>
                    <th>Jenis Layanan</th>
                    <th>Tahun Pembuatan</th>
                    <th>Thumbnail</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>
