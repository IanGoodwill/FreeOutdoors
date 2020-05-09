@foreach($comments as $comment)
<div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
    <strong>{{ $post->name }}</strong>
    <div class="card-body"> 
    <section>
        @if( $comment->is_gif == TRUE )
        <figure>
            <img src="{{ $comment->content }}">
        </figure>
        @else
        <p class="card-body">
            {{ $comment->content }}
        </p>
        @endif
    </section>
<div class="form-group row">
    <div class="form-group ml-1">
    <a  class="btn btn-primary  btn-sm" href="#" id="reply">Reply</a>
    </div>
    
    <div class="form-group ml-1"">
        <a href="{{ route('comments.edit', $comment->id) }}" post-id="{{ $post_id }}" comment-id="{{ $comment->id }}" class="btn btn-primary  btn-sm">Edit Comment</a>
    </div>

    <div class="form-group ml-1"">
        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger  btn-sm" type="submit" value="Delete Comment">
        </form>
    </div>
</div>

    @include('posts.commentsDisplay', ['comments' => $comment->replies])
</div>

@endforeach