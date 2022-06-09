<x-admin-app-layout>
    <livewire:left-nav />

    <div class="p-2.5 main-section sm:mx-3" >
        <livewire:show-posts :post="$post" :id="$id"/>
    </div>
    <livewire:right-nav />
</x-admin-app-layout>

