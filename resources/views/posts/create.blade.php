@extends('layout')

@section('title')
Create Post Form
@endsection

@section('content')

<h1 class="text-center"> Fill out this form to create a post!</h1>

@include('partials.errors')

<div class="container-fluid">
    <div class="row h-100 justify-content-center align-items-center">

        <form method="post" action="{{ route( 'posts.store' ) }}" enctype="multipart/form-data">
            <div class="form-group container h-100">
         
                @csrf {{-- cross site request forgery. a security mesaure --}}

                <label for="content">
                    <strong> Post Content: </strong>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                </label>
            </div>

            <div class="container">
                <div class="panel panel-primary">
            
                  <div class="panel-body">
            
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                         <strong>{{ $message }}</strong>
                    </div>
                    <img src="images/{{ Session::get('image') }}">
            
                    @endif
            
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            
                    <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
            <div class="form-group container h-100">
                <input class="btn btn-primary btn-customized align-bottom" type="submit" value="Publish Post">
            </div>
        </form>

</div>
</div>

@endsection