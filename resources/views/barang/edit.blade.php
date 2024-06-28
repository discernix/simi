<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Manajemen') . ' ' . $title }}
        </h2>
    </x-slot>

    <x-margin>
        <x-wrapper>
            <div class="space-y-2">
                <x-h1>Edit {{ $title }}</x-h1>
                <form action="{{ route(Str::lower($title) . '.update', $data) }}" method="POST">
                    @method('PATCH')
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
                                value="{{ old('nama') ?? $data->nama }}" />
                        </div>
                        <div class="col-span-3">
                            <div class="flex items-start gap-3">
                                <label for="">Deskripsi</label>
                                @error('deskripsi')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="text" name="deskripsi" placeholder="Deskripsi" aria-label="Deskripsi"
                                value="{{ old('deskripsi') ?? $data->deskripsi }}" />
                        </div>
                        <div class="col-span-2">
                            <div class="flex items-start gap-3">
                                <label for="">Harga</label>
                                @error('harga')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="number" name="harga" placeholder="Harga" aria-label="Harga"
                                value="{{ old('harga') ?? $data->harga }}" />
                        </div>
                        <div>
                            <label for="">Kategori</label>
                            <select name="id_kategori">
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}" {{ $k->id == old('id_kategori', $data->id_kategori) ? 'selected' : '' }}>{{ $k->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="">Supplier</label>
                            <select name="id_supplier">
                                @foreach ($suppliers as $s)
                                    <option value="{{ $s->id }}" {{ old('id_supplier', $data->id_supplier) == $s->id ? 'selected' : '' }}>{{ $s->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center">
                            <input type="submit" value="Edit" name="_submit" style="margin: 0;" />
                        </div>
                    </div>
                </form>
        </x-wrapper>
    </x-margin>

</x-app-layout>
