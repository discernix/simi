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
                    <div class="col-span-4">
                        <div class="flex items-start gap-3">
                            <label for="">Nama</label>
                            @error('nama')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="text" name="nama" placeholder="Nama" aria-label="Kode" value="{{ old('nama') }}" />
                    </div>
                    <div class="flex items-end">
                        <input type="submit" value="Tambah" name="_submit" />
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
