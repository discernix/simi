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
                            <label for="">Nama</label>
                            <input type="text" name="nama" placeholder="Nama" aria-label="Kode" value="{{ $data->nama }}" />
                        </div>
                        <div>
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" aria-label="Kode"
                                value="{{ $data->tanggal_lahir }}" />
                        </div>
                        <div class="col-span-2">
                            <label for="">Alamat</label>
                            <input type="text" name="alamat" placeholder="Alamat" aria-label="Alamat" value="{{ $data->alamat }}" />
                        </div>
                        <div class="flex items-end">
                            <input type="submit" value="Edit" name="_submit" />
                        </div>
                    </div>
                </form>
        </x-wrapper>
    </x-margin>

</x-app-layout>
