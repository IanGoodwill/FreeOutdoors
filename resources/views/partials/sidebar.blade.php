
@if ( session()->get('success') )
<div role="alert">
{{ session()->get('success') }}
</div>
@endif



<div class="float-right" class="mt-5">

<a href="{{ route('profiles.edit', $profile->id) }}" class="navbar-brand" class="nav-link" class="text-center" >Personal Profile</a>

<figure  >
    <img class="img-responsive" height="10%" alt="compass" src="{{URL('/images/compass.png')}}">
</figure>

</div> 