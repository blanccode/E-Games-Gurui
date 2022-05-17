<div>
    <div x-data="{ open:false}" class="card-bg-100 rounded-t-xl flex justify-end ">

        <img @click="open = ! open" width="70px"  class="p-5" src={{url('svgs/trash.svg')}}>


        <div x-show="open"
             class="delete-container"
             style="display: none"
            {{--             x-transition--}}

        >

            <div
                x-show="open"
                x-transition
                @click.outside="open = false"
                class="delete-form rounded-articles"
            >
                <form action="{{ $model->id  }}" method="POST"   >
                    @method('DELETE')
                    @csrf

                    <div class="delete-content ">

                        <p>{{$modelName}} unwiderruflich löschen?</p>

                        <div class="flex justify-between pt-3 gap-4">

                            <button class="flex items-center bg-red-700 rounded-lg p-2 px-10 " type="submit" >
                                Löschen
                            </button>
                            <span @click="open = false" class=" accent-blue rounded-lg p-2 px-10" >
                        Zuruck
                        </span>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>
