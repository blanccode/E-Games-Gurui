<x-admin-app-layout>
    <livewire:left-nav />
    <div class="p-2.5 main-section rounded-xl card-bg sm:mx-3" >
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

         <div id="tag_container" class="mb-10 pt-3">

            @include('twitch-result')
         </div>

        <script type="text/javascript">
            $(window).on('hashchange', function() {
                // console.log('dsjknko')
                if (window.location.hash) {
                    var page = window.location.hash.replace('#', '');
                    if (page == Number.NaN || page <= 0) {
                        return false;
                    }else{
                        getData(page);
                    }
                }
            });

            $(document).ready(function()
            {
                $(document).on('click', '.pagination',function(event)
                {
                    event.preventDefault();

                    $('li').removeClass('active');
                    $(this).parent('li').addClass('active');

                    var myurl = $(this).attr('href');
                    var page=$(this).attr('href').split('page=')[1];
                    console.log(page)
                    getData(page);
                });

            });

            function getData(page){
                $.ajax(
                    {
                        url: '?page=' + page,
                        type: "get",
                        datatype: "html"
                    }).done(function(data){
                    $("#tag_container").empty().html(data);
                    location.hash = page;
                }).fail(function(jqXHR, ajaxOptions, thrownError){
                    alert('No response from server');
                });
            }
        </script>


    </div>
    <livewire:right-nav />
</x-admin-app-layout>

