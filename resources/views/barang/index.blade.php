<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manajemen') . ' ' . $title }}
        </h2>
    </x-slot>

    <x-margin>
        <x-wrapper>
            <form action="{{ route(Str::lower($title) . '.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-5">
                    <div class="col-span-2">
                        <div class="flex items-start gap-3">
                            <label for="">Nama</label>
                            @error('nama')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="text" name="nama" placeholder="Nama" aria-label="Nama"
                            value="{{ old('nama') }}" />
                    </div>
                    <div class="col-span-3">
                        <div class="flex items-start gap-3">
                            <label for="">Deskripsi</label>
                            @error('deskripsi')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="text" name="deskripsi" placeholder="Deskripsi" aria-label="Deskripsi"
                            value="{{ old('deskripsi') }}" />
                    </div>
                    <div class="col-span-2">
                        <div class="flex items-start gap-3">
                            <label for="">Harga</label>
                            @error('harga')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="number" name="harga" placeholder="Harga" aria-label="Harga" value="{{ old('harga') }}" />
                    </div>
                    <div>
                        <label for="">Kategori</label>
                        <select name="id_kategori">
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}" {{ $k->id == old('id_kategori') ? 'selected' : '' }}>{{ $k->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="">Supplier</label>
                        <select name="id_supplier">
                            @foreach ($suppliers as $s)
                                <option value="{{ $s->id }}" {{ $s->id == old('id_supplier') ? 'selected' : '' }}>{{ $s->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center">
                        <input type="submit" value="Tambah" name="_submit" style="margin: 0;" />
                    </div>
                </div>
            </form>
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        No</th>
                                    <th scope="col">Nama
                                    </th>
                                    <th scope="col">Deskripsi
                                    </th>
                                    <th scope="col">Harga
                                    </th>
                                    <th scope="col">Kategori
                                    </th>
                                    <th scope="col">Supplier
                                    </th>
                                    <th scope="col">
                                        Ditambahkan
                                    </th>
                                    <th scope="col">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->deskripsi }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td>{{ $item->kategori->nama }}</td>
                                        <td>{{ $item->suppliers->nama }}</td>
                                        <td>{{ date('d M Y H:i', strtotime($item->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route(Str::lower($title) . '.edit', $item) }}">
                                                <button type="button"
                                                    class="w-16 p-1 m-0 bg-blue-500 text-md">Edit</button>
                                            </a>
                                            <form action="{{ route(Str::lower($title) . '.destroy', $item) }}"
                                                method="POST" class="inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit"
                                                    class="p-1 m-0 bg-red-500 max-w-16 text-md">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </x-wrapper>
    </x-margin>
</x-app-layout>
