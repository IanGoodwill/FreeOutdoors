@extends('layout')

@section('content')

@auth 
@include('partials.sidebar')
@endauth

@if ( session()->get('success') )
<div role="alert">
    {{ session()->get('success') }}
</div>
@endif

<div id="app">
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
                    <button data-post-id="{{ $post->id }}" >View Comments</button>
                </a>
                <p>
                    <span id="comments-count-{{ $post->id }}">{{ $post->comments_count }} Comments </span>
                </p>

                <small>{{ $post->posted_at }}</small>
               
                <div class="float-right">
                    @if (Auth::check())
                    <likes :post={{ $post->id }} :liked={{ $post->liked() ? 'true' : 'false' }}>
                    </likes>
                    @endif
                    <span>{{ $post->likes()->count() }}</span>
                </div>
               
            
                @endauth
               
            </li> 
        </div>       
    </ul>
</div>
@endforeach
{{ $posts->links() }}
@endsection


</div>