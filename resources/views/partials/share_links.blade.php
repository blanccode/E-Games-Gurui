<li class="mr-5">
    <button class="flex items-center cursor-pointer" x-on:click="open = ! open">

        <svg width="28" height="" viewBox="0 0 88 88" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M25.667 14.6666C22.7496 14.6666 19.9517 15.8256 17.8888 17.8885C15.8259 19.9514 14.667 22.7492 14.667 25.6666V55C14.667 57.9173 15.8259 60.7152 17.8888 62.7781C19.9517 64.841 22.7496 66 25.667 66H29.3337V73.3333C29.3335 73.982 29.5055 74.6192 29.8321 75.1798C30.1586 75.7403 30.6281 76.2042 31.1925 76.5241C31.7569 76.8439 32.3961 77.0083 33.0448 77.0005C33.6935 76.9926 34.3285 76.8128 34.885 76.4793L52.3457 66H62.3337C65.251 66 68.0489 64.841 70.1118 62.7781C72.1747 60.7152 73.3337 57.9173 73.3337 55V25.6666C73.3337 22.7492 72.1747 19.9514 70.1118 17.8885C68.0489 15.8256 65.251 14.6666 62.3337 14.6666H25.667Z" fill="#EEEEEE"/>
        </svg>
    </button>
</li>
<div data-share-container class="mr-3 share-container flex items-center cursor-pointer">
    {{--                                    <li class="cursor-pointer"  >--}}
    <div data-share-btn class="flex cursor-pointer">
        <img data-share-btn  width="35px" class="pl-1.5" src="{{url('svgs/turban.svg')}}">
    </div>


    {{--                                    </li>--}}

    <div data-share-content class="share-content rounded-xl accent-bg">


        <a   class="twitter-share-button" target="_blank" href="https://twitter.com/intent/tweet?text=Hey, check out my post at &url=http://localhost/posts/{{$post->id}}" >
            <img width="28px" height="auto" src="{{url('svgs/twitter.svg')}}">

        </a>
        <a   class="twitter-share-button" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/posts/{{$post->id}}" >
            <img width="28px" height="auto" src="{{url('svgs/fb-icon.svg')}}">

        </a>
        <a   class="twitter-share-button"  >

            <input class="hidden" type="text" value="{{Request::getHost(). '/posts/' . $post->id}}" id="myInput">

{{--            <button onclick="myFunction()">Copy text</button>--}}
            <div class="tooltip">
                <button onclick="myFunction()" onmouseout="outFunc()">
                    <span class="tooltiptext" id="myTooltip">Copy Link</span>
                    <img onclick="myFunction()" width="25px" height="auto" src="{{url('svgs/share.svg')}}">

                </button>
            </div>


        </a>

    </div>
</div>

<script defer>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);

        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Link Copied";
    }

    function outFunc() {
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copy Link";
    }
</script>
