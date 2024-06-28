<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col gap-5 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            {{-- <x-wrapper>
                <div class="grid grid-cols-4">
                    @foreach ($kunjungan_poli as $item)
                    <div>
                        <x-h1>{{ $item->poli->nama_poli }}</x-h1>
                        <h3>Total Pengunjung {{ $item->total }}</h3>
                    </div>
                    @endforeach
                </div>
            </x-wrapper> --}}

            <div class="grid grid-cols-4 gap-5">
                @if (isset($menu))
                    @foreach ($menu as $item)
                        <div class="flex flex-col p-4 bg-white border shadow-sm rounded-xl md:p-5">
                            <h3 class="text-lg font-bold text-gray-800">
                                {{ 'Manajemen' . ' ' . $item['title'] }}
                            </h3>
                            <p class="mt-1 text-xs font-medium text-gray-500 uppercase">
                                {{ Str::upper($item['title']) }}
                            </p>
                            <p class="mt-2 text-gray-500">
                                {{ Str::limit($item['description'], 55, '....') }}
                            </p>
                            <a class="inline-flex items-center mt-3 text-sm font-semibold text-blue-600 border border-transparent rounded-lg gap-x-1 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none"
                                href="{{ route(Str::lower($item['title']) . '.index') }}">
                                Pergi ke manajemen {{ Str::lower($item['title']) }}
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m9 18 6-6-6-6"></path>
                                </svg>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
