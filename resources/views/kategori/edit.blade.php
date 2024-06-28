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
                        <div class="col-span-4">
                            <div class="flex items-start gap-3">
                                <label for="">Nama</label>
                                @error('nama')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="text" name="nama" placeholder="Nama" aria-label="Kode"
                                value="{{ old('nama') ?? $data->nama }}" />
                        </div>
                        <div class="flex items-end">
                            <input type="submit" value="Edit" name="_submit" />
                        </div>
                    </div>
                </form>
        </x-wrapper>
    </x-margin>

</x-app-layout>
