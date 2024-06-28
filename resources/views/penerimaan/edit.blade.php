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
                        <div>
                            <div class="flex items-start gap-3">
                                <label for="">Tanggal Terima</label>
                                @error('tanggal_terima')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="date" name="tanggal_terima" placeholder="Tanggal Terima"
                                aria-label="Tanggal Terima"
                                value="{{ old('tanggal_terima') ?? $data->tanggal_terima }}" />
                        </div>
                        <div class="col-span-2">
                            <div class="flex items-start gap-3">
                                <label for="">Jumlah</label>
                                @error('jumlah')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="number" name="jumlah" placeholder="Jumlah" aria-label="Jumlah"
                                value="{{ $data->jumlah }}" />
                        </div>
                        <div>
                            <label for="">Barang</label>
                            <select name="id_barang">
                                @foreach ($barang as $b)
                                    <option value="{{ $b->id }}"
                                        {{ $b->id == old('id_barang', $data->id_barang) ? 'selected' : '' }}>
                                        {{ $b->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-end">
                            <input type="submit" value="Tambah" name="_submit" />
                        </div>
                    </div>
                </form>
        </x-wrapper>
    </x-margin>

</x-app-layout>
