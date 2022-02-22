<x-app-layout class="">

    <livewire:left-nav />

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class=" main-section rounded-xl ">

        <div class=" rounded-lg  bg-white">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <livewire:post-section />

            </div>
        </div>
    </div>

    <livewire:right-nav />

</x-app-layout>
