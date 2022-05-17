<x-admin-app-layout>
    <livewire:left-nav />
    <div class="p-2.5 main-section rounded-xl card-bg sm:mx-3" >
{{--        {{$currentArticle}}--}}
        <livewire:admin.edit-articles :article="$currentArticle"/>
    </div>
    <livewire:right-nav />
</x-admin-app-layout>


