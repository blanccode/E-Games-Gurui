<x-admin-app-layout>
    <livewire:left-nav />
{{--{{$comment}}--}}
    <div class="p-2.5 main-section sm:mx-3" >
        <livewire:show-comments :comment="$comment" :id="$id"/>
    </div>
    <livewire:right-nav />
</x-admin-app-layout>
