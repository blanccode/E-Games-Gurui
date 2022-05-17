<x-app-layout class=" card-bg mx-3">

    <livewire:left-nav />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="mx-3 main-section card-bg rounded-xxl ">

        <div class=" rounded-lg  ">
            <div class=" overflow-hidden shadow-xl sm:rounded-lg">

                <livewire:post-section />

            </div>
        </div>
    </div>

    <livewire:right-nav />

</x-app-layout>
