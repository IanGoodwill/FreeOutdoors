@extends('layout')


@section('title')
FreeOutdoors
@endsection

@section('content')

@if ( session()->get('success') )
<div role="alert">
    {{ session()->get('success') }}
</div>
@endif


@foreach($posts as $post)
<div class="card" class="gridCard m-b-md" style="width: 36rem;">

    <ul>
        <div class="card-body"> 
            <li> 
                
                <a href="{{ route('profiles.show', $post->user_id) }}" class="text-dark" class="nav-link" >
                    <strong >{{ $post->name }}</strong>
                </a>
             
                <div class="float-right">
                    @if($follower->followed ?? '') 
                    <button><small>Followed</small></button>
                    @else 
                    <button><small>Not Followed</small></button>

                    @endif
                </div>

                <p>
                    {{ $post->content }}    
                </p>

                @auth 
                <a href="{{ route('posts.show', $post->id ) }}" >
                    <button data-post-id="{{ $post->id }}">View Comments</button>
                </a>
                <p>
                    <span id="comments-count-{{ $post->id }}">{{ $post->comments_count }} Comments </span>
                </p>

                <small>{{ $post->posted_at }}</small>
               
                
                <div class="float-right">
                    <button onclick="actOnPost(event);" data-post-id="{{ $post->id }}">Like</button>
                    <span id="likes-count-{{ $post->id }}">{{ $post->likes_count }}</span>
                    @section('js')
                    <script>
                        var updatePostStats = {
                            Like: function (postId) {
                                document.querySelector('#likes-count-' + postId).textContent++;
                            },
                
                            Unlike: function(postId) {
                                document.querySelector('#likes-count-' + postId).textContent--;
                            }
                        };
                
                
                        var toggleButtonText = {
                            Like: function(button) {
                                button.textContent = "Unlike";
                            },
                
                            Unlike: function(button) {
                                button.textContent = "Like";
                            }
                        };
                
                        var actOnPost = function (event) {
                            var postId = event.target.dataset.postId;
                            var action = event.target.textContent;
                            toggleButtonText[action](event.target);
                            updatePostStats[action](postId);
                            axios.post('/posts/' + postId + '/act',
                                { action: action });
                        };
                
                    </script>
                 @endsection
                </div>
            
                @endauth
               
            </li> 
        </div>       
    </ul>
</div>
@endforeach
@endsection

@auth 
@include('partials.sidebar')
@endauth