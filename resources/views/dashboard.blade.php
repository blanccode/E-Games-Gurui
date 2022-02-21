<x-app-layout class="">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class=" main-section rounded-xl ">
        <livewire:news-section />

        <div class=" rounded-lg  bg-white">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--<x-jet-welcome />--}}
                <livewire:post />

            </div>
        </div>
    </div>
</x-app-layout>
