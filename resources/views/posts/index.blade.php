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

<div id="app">

</div>

@foreach($posts as $post)
<div class="card" class="gridCard m-b-md" style="width: 36rem;">

    <ul>
        <div class="card-body"> 
            <li> 
                @auth
                <a href="{{ route('profiles.show', $post->user_id) }}" class="text-dark" class="nav-link" >
                    <strong>{{ $post->username }}</strong>
                </a>
                @endauth

             
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
                    <button>Comment</button>
                </a>
                
               
                
                <div class="float-right">
                    <button  onclick="actOnPost(event);" data-post-id="{{ $post->id }}">Like</button>
                    <span id="likes-count-{{ $post->id }}">{{ $post->likes_count }}</span>
                </div>
            
                @endauth
               
            </li> 
        </div>       
    </ul>
</div>
@endforeach
@endsection
