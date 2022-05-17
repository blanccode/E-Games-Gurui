<x-admin-app-layout>
    <livewire:left-nav />

    <div class="p-2.5 main-section rounded-xxl card-bg sm:mx-3" >
        <livewire:user.profile :user="$user"/>
    </div>
    <livewire:right-nav />
</x-admin-app-layout>
