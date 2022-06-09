<x-admin-app-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <p>{{ $post->text }}</p>
                        <p>
{{--                            {{ $post->title }}--}}
                        </p>
                        <hr />
                        <h4>Display Comments</h4>
                        <hr />
                        <form method="post" action="{{ route('comment.add') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="comment_body" class="form-control" />
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-warning" value="Add Comment" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])

    </div>

</x-admin-app-layout>
