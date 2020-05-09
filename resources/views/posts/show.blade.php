@extends('layout')

@section('title')
View Post
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                   
                    @include('partials.errors')

                    <strong> Username: </strong>
                    <br>

                    {{ $profile->username ?? '' }}
                    <br>

                    <strong> Post: </strong>
                    <br>
                    <div class="card-body"> 
                    <p>{{ $post->content }}</p>

                    <h4>Comment Section</h4>

                    @include('posts.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

                    <section>
                        @if( $comment->is_gif == TRUE )
                        <figure>
                            <img src="{{ $comment->content }}">
                        </figure>
                        @else
                        <p>
                            {{ $comment->content }}
                        </p>
                        @endif
                    </section>

                    <a href="{{route('comments.show', $id)}}" id="reply"></a>
                    
                    <div id="app">
                        <comment-create-form submission-url="{{route('comments.store')}}" comment-id="{{ $comment->id }}" post-id="{{ $post->id }}" v-model="content">
                            @csrf
                        </comment-create-form>
                        <Giphy v-on:image-clicked="imageClicked"/>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection