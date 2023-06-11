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
                        <h6 class="dark:text-white">Update Layanan</h6>
                    </div>
                    <div class="flex-auto px-3 py-5 pt-0 pb-2">
                        @if ($errors->any())
                            <div class="mb-5" role="alert">
                                <div class="rounded-t bg-red-500 px-4 py-2 font-bold text-white">
                                    Ada kesalahan!
                                </div>
                                <div
                                    class="rounded-b border border-t-0 border-red-400 bg-red-100 px-4 py-3 text-red-700">
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
                        <form action="{{ route('admin.services.update', $service->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Input Text | Name -->
                            <div class="-mx-3 mb-6 flex flex-wrap">
                                <div class="w-full px-3">
                                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                        for="motto"> Nama Layanan : </label>
                                    <input type="text" name="name" value="{{ old('name') ?? $service->name }}"
                                        class="mb-1 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                        placeholder="Masukkan Nama Layanan untuk Layanan Anda">
                                    <div class="mt-0 text-sm text-gray-500">
                                        Nama Layanan. Contoh: Corporation, Branding, dsb. Wajib diisi. Maksimal 255
                                        karakter.
                                    </div>
                                </div>
                            </div>

                            <!-- Input Text | Icon -->
                            <div class="-mx-3 mb-6 flex flex-wrap">
                                <div class="w-full px-3">
                                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                        for="motto"> Icon Layanan : </label>
                                    <input type="text" name="icon" value="{{ old('icon') ?? $service->icon }}"
                                        class="mb-1 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                        required />
                                    <div class="mt-0 text-sm text-gray-500">
                                        Flutter Icon. Contoh: 0xee34, 0xf521. Opsional.
                                        <a href="https://api.flutter.dev/flutter/material/Icons-class.html"
                                            target="_blank" class="text-blue-700">refrence</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Input Number | Icon Background -->
                            <div class="-mx-3 mb-6 flex flex-wrap">
                                <div class="w-full px-3" style="width: 25%">
                                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                        for="r"> Red : </label>
                                    <input type="number" name="r"
                                        value="{{ old('r') ?? json_decode($service->icon_background)[0] }}"
                                        min="1" max="255" placeholder="Red"
                                        class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-1 px-3 leading-normal text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                        required />
                                </div>
                                <div class="w-full px-3" style="width: 25%">
                                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                        for="r"> Green : </label>
                                    <input type="number" name="g"
                                        value="{{ old('g') ?? json_decode($service->icon_background)[1] }}"
                                        min="1" max="255" placeholder="Green"
                                        class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-1 px-3 leading-normal text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                        required />
                                </div>
                                <div class="w-full px-3" style="width: 25%">
                                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                        for="r"> Blue : </label>
                                    <input type="number" name="b"
                                        value="{{ old('b') ?? json_decode($service->icon_background)[2] }}"
                                        min="1" max="255" placeholder="Blue"
                                        class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-1 px-3 leading-normal text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                        required />
                                </div>
                                <div class="w-full px-3" style="width: 25%">
                                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                        for="r"> Alpha : </label>
                                    <input type="number" name="a"
                                        value="{{ old('a') ?? json_decode($service->icon_background)[3] }}"
                                        min="0" max="1" step=".1" placeholder="Alpha / Opacity"
                                        class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-1 px-3 leading-normal text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                        required />
                                </div>
                                <div class="w-full px-3">
                                    <div class="mt-0 text-sm text-gray-500">
                                        Warna Icon. Contoh: (255,155, 100, 0.8). Opsional.
                                    </div>
                                </div>
                            </div>

                            <!-- Input Select | Category -->
                            <div class="-mx-3 mb-6 flex flex-wrap">
                                <div class="w-full px-3">
                                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                        for="Kategori"> Kategori : </label>
                                    <div class="relative">
                                        <select name="category_id"
                                            class="block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 pr-8 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                            id="status">
                                            <option value="{{ $service->category->id }}">Tidak Diubah
                                                ({{ $service->category->name }})</option>
                                            <option disabled>&mdash; &mdash; &mdash; &mdash; &mdash; &mdash; &mdash;
                                                &mdash; &mdash; &mdash;</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id' == $category->id ? 'selected' : '') }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        </div>
                                        <div class="mt-1 text-sm text-gray-500">
                                            Kategori layanan. Contoh: Corporation, Branding, dsb. Wajib diisi.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Input Text | Motto -->
                            <div class="-mx-3 mb-6 flex flex-wrap">
                                <div class="w-full px-3">
                                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                        for="motto"> Motto Layanan : </label>
                                    <input type="text" name="motto"
                                        value="{{ old('motto') ?? $service->motto }}"
                                        placeholder="Masukkan Motto singkat untuk Layanan Anda"
                                        class="mb-1 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                        required />
                                    <div class="mt-0 text-sm text-gray-500">
                                        Motto Layanan. Contoh: Pelayanan Optimal. Wajib diisi. Maksimal 255 karakter.
                                    </div>
                                </div>
                            </div>

                            <!-- Input Textarea | Detail -->
                            <div class="-mx-3 mb-6 flex flex-wrap">
                                <div class="w-full px-3">
                                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                        for="Subjek"> Detail Layanan : </label>
                                    <div class="mt-2">
                                        <textarea id="editor" name="detail" placeholder="Masukkan Detail Untuk Layanan Anda"
                                            class="mb-3 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none">{!! old('detail') ?? $service->detail !!}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Input File | Images -->
                            <div class="-mx-3 mb-6 flex flex-wrap">
                                <div class="w-full px-3">
                                    <label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700"
                                        for="motto"> Images : </label>
                                    <input type="file" name="images[]"
                                        accept="image/png, image/jpeg, image/jpg, image/webp"
                                        placeholder="Masukkan Motto singkat untuk Layanan Anda"
                                        class="mb-1 block w-full appearance-none rounded border border-gray-200 bg-gray-200 py-3 px-4 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
                                        multiple />
                                    <div class="mt-0 text-sm text-gray-500">
                                        Foto layanan. Lebih dari satu foto dapat diupload. Opsional
                                    </div>
                                </div>
                            </div>

                            <!-- Button | Submit -->
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
