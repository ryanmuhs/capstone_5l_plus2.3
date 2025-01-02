<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-slate-400 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-[#7BC862] h-fit rounded-lg p-4">
                            <h2 class="text-2xl font-bold">21</h2>
                            <p class="text-sm">Poli Umum</p>
                        </div>
                        <div class="bg-[#4A9DA6] h-fit rounded-lg p-4">
                            <h2 class="text-2xl font-bold">21</h2>
                            <p class="text-sm">Poli Gigi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>