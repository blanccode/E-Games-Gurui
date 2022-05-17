<x-admin-app-layout>
    <livewire:left-nav />

    <div class="p-2.5 main-section sm:mx-3" >
        <livewire:articles-section/>
        <div class="p-2.5 md:p-4 rounded-articles card-bg ">
            <livewire:dashboard-posts/>

        </div>
    </div>
    <livewire:right-nav />
</x-admin-app-layout>
