<div>
    <label>Bearbeite Post</label>

    <x-admin.modal :model="$post" model-name="Post"/>

    <form class="pb-4 rounded-b-xl card-bg-100 p-3"  wire:submit.prevent="updatePost" >


        <div class="w-full ">

            <div class="flex justify-center " >
                @if(!$imageFile)
{{--                    <div class="rounded-t-xl" style="background-image: url('{{ Storage::url('images/' . $post->image) }}');--}}
{{--                        height: max-content;--}}
{{--                        width: 100% ;--}}
{{--                        height: 226px;--}}
{{--                        background-repeat: no-repeat;--}}
{{--                        background-size: cover;--}}

{{--                        " ></div>--}}

                    <img data-post-content class=" rounded-news  w-8/12 object-cover"  src="{{url('storage/images/' . $post->image)}}"/>
{{--{{$post->id}}--}}
                @endif
                @if($imageFile)
{{--                    <div class="rounded" style="background-image: url('{{$imageFile}}');--}}
{{--                        height: max-content;--}}
{{--                        width: 134px ;--}}
{{--                        height: 300px;--}}
{{--                        background-repeat: no-repeat;--}}
{{--                        background-position: center;--}}
{{--                        background-size: cover;--}}

{{--                        " ></div>--}}
                    <img class=" rounded-news "  src="{{$imageFile}}"/>

                @endif
                @if($videoFile)
                    <video class="post-vid  rounded-t-xl" autoplay muted preload="metadata" >
                        <source src="{{$videoFile}}#t=0.1" type="video/mp4">
                        <source src="{{$videoFile}}#t=0.1" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                @endif
            </div>



            <div class="flex justify-start items-center" >
                <div class="  flex justify-between">
                    <label for="photo-file" class="file-icons">
                        <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.75 4.25C0.75 3.32174 1.11875 2.4315 1.77513 1.77513C2.4315 1.11875 3.32174 0.75 4.25 0.75H14.75C15.6783 0.75 16.5685 1.11875 17.2249 1.77513C17.8813 2.4315 18.25 3.32174 18.25 4.25V14.75C18.25 15.6783 17.8813 16.5685 17.2249 17.2249C16.5685 17.8813 15.6783 18.25 14.75 18.25H4.25C3.32174 18.25 2.4315 17.8813 1.77513 17.2249C1.11875 16.5685 0.75 15.6783 0.75 14.75V4.25Z" stroke="#E9E9E9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6.4375 8.625C7.64562 8.625 8.625 7.64562 8.625 6.4375C8.625 5.22938 7.64562 4.25 6.4375 4.25C5.22938 4.25 4.25 5.22938 4.25 6.4375C4.25 7.64562 5.22938 8.625 6.4375 8.625Z" stroke="#E9E9E9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.7103 10.0434L4.25 18.25H14.8664C15.7638 18.25 16.6244 17.8935 17.259 17.259C17.8935 16.6244 18.25 15.7638 18.25 14.8664V14.75C18.25 14.3423 18.0969 14.1856 17.8213 13.8838L14.295 10.0381C14.1307 9.85887 13.9307 9.71582 13.708 9.61812C13.4853 9.52042 13.2447 9.47021 13.0015 9.47071C12.7583 9.4712 12.5178 9.52238 12.2955 9.62099C12.0732 9.71959 11.8739 9.86345 11.7103 10.0434V10.0434Z" stroke="#E9E9E9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                    </label>
                    <input id="photo-file" wire:model.lazy="image" wire:change="$emit('imageChosen')" data-image-chosen type="file" name="image" >

                </div>
                <div class="flex justify-between ">
                    <label class="file-icons" for="video-file">
                        <svg width="25" height="17" viewBox="0 0 25 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 3.8125C0 2.9837 0.32924 2.18884 0.915291 1.60279C1.50134 1.01674 2.2962 0.6875 3.125 0.6875H14.8438C15.6017 0.687411 16.3339 0.962801 16.9039 1.46239C17.4739 1.96197 17.8429 2.6517 17.9422 3.40312L22.8016 1.24375C23.0394 1.13777 23.3 1.09291 23.5596 1.11326C23.8192 1.13361 24.0696 1.21851 24.288 1.36025C24.5065 1.502 24.686 1.69609 24.8104 1.92488C24.9347 2.15367 24.9999 2.40992 25 2.67031V14.3297C24.9998 14.5899 24.9346 14.8459 24.8103 15.0745C24.6861 15.3031 24.5067 15.4971 24.2885 15.6388C24.0702 15.7805 23.8201 15.8654 23.5607 15.886C23.3013 15.9065 23.0409 15.8619 22.8031 15.7563L17.9422 13.5969C17.8429 14.3483 17.4739 15.038 16.9039 15.5376C16.3339 16.0372 15.6017 16.3126 14.8438 16.3125H3.125C2.2962 16.3125 1.50134 15.9833 0.915291 15.3972C0.32924 14.8112 0 14.0163 0 13.1875V3.8125ZM17.9688 11.8984L23.4375 14.3297V2.67031L17.9688 5.10156V11.8984ZM3.125 2.25C2.7106 2.25 2.31317 2.41462 2.02015 2.70765C1.72712 3.00067 1.5625 3.3981 1.5625 3.8125V13.1875C1.5625 13.6019 1.72712 13.9993 2.02015 14.2924C2.31317 14.5854 2.7106 14.75 3.125 14.75H14.8438C15.2582 14.75 15.6556 14.5854 15.9486 14.2924C16.2416 13.9993 16.4062 13.6019 16.4062 13.1875V3.8125C16.4062 3.3981 16.2416 3.00067 15.9486 2.70765C15.6556 2.41462 15.2582 2.25 14.8438 2.25H3.125Z" fill="#E9E9E9"/>
                        </svg>

                    </label>
                    <input id="video-file" class="rounded-xl p-2" wire:model.lazy="video" wire:change="$emit('videoChosen')" data-video-chosen type="file"  name="video">
                </div>

            </div>
            <textarea wire:model.defer="postInput" class="accent-bg textarea w-full text-gray-200 rounded-lg" type="text" name="text" required >

            </textarea>

        </div>

        <div class="flex justify-end">
            <button  class="accent-blue rounded-lg p-2 px-10 text-white" type="submit" >Submit</button>

        </div>
    </form>

</div>

<script>
    Livewire.on('imageChosen', () => {

        let imagePrewiev = document.querySelector('[data-image-chosen]')
        let file = imagePrewiev.files[0];

        const reader = new FileReader();
        reader.onloadend = (e) => {
            photoPreview = e.target.result;
            Livewire.emit('imageFile', [file.name, reader.result])
            console.log(file.name)

        };
        reader.readAsDataURL(file);
    })
    Livewire.on('videoChosen', () => {

        let videoPrewiev = document.querySelector('[data-video-chosen]')
        let videoFile = videoPrewiev.files[0];

        const reader = new FileReader();
        reader.onloadend = () => {
            Livewire.emit('videoFile', reader.result)
            console.log(reader.result)

        };
        reader.readAsDataURL(videoFile);
    })
</script>
