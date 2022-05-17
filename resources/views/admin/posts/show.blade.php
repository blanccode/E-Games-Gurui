<x-admin-app-layout>
    <livewire:left-nav />
    <div class="p-2.5 main-section rounded-xl card-bg sm:mx-3" >
        <livewire:admin.edit-posts :post="$currentPost"/>
    </div>
    <livewire:right-nav />
</x-admin-app-layout>


