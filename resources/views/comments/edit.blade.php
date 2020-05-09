@extends('layout')

@section('title')
Comment
@endsection

@section('content')

@include('partials.errors')
 
<div class="container-fluid">
    <div class="column h-100 justify-content-center align-items-center">

        <div class="card">
        <section>
            <div class="card-body">
            @if( $comment->is_gif == TRUE )
            <figure>
                <img src="{{ $comment->content }}">
            </figure>
            @else
            <p class="card-text">
                {{ $comment->content }}
            </p>
            @endif
        </section>
    </div>



    
        <div class="float-right" id="app">
            <comment-edit-form submission-url="{{ route( 'comments.update', $comment->id) }}" v-model="content">
                @csrf
                @method('PATCH')
            </comment-edit-form>
            <Giphy v-on:image-clicked="imageClicked" />
        </div>
    </div>


  
        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger" type="submit" value="Delete Comment">
    
</div>
</div>
    </form>

</div>

@endsection