<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/png" href="{{URL('/images/mountain.png')}}">
        <title>FreeOutdoors</title>
        <link href="{{ asset('css/welcome.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div class="navigation">
            <nav role="navigation">
    
                <ul>
            
                    <li>
                        <figure  >
                            <img class="img-responsive" hspace="20" alt="logo" src="{{URL('/images/mountain-logo2.webp')}}">
                        </figure>
                    </li>
            
                    <li>
                        <a  href="{{ route( 'posts.index') }}">
                        Explore
                        </a>
                    </li>
                    <li>
                        <a  href="{{ route( 'posts.index') }}">
                        About
                        </a>
                    </li>
                    @auth
                    <li>
                    <a  href="{{ route( 'posts.create') }}">
                        Create New Post
                        </a>
                    </li>
             
                    <li>
                    <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
            
                    <form id="logout-form" action="{{ route('logout') }}"       method="POST" style="display: none;">
                            {{ csrf_field() }}
                    </form>
                    </li>
                    @endauth
                    @guest
                    <li>
                    <a  href="{{ route( 'login') }}">
                        Login
                        </a>
                    </li>
            
                    <li>
                    <a  href="{{ route( 'register') }}">
                        Register
                        </a>
                    </li>
                    @endauth
                </ul>
            </nav>
        </div>
      
            

            <figure>
                <img class="mountain-lake-image" src="{{URL('/images/adventure-big-text.jpg')}}" aria-label="Picture of people looking at a mountain lake. Image by Pexels from Pixabay.">
                <figcaption>Image by Pexels from Pixabay.</figcaption>
            </figure>

            <section class="who-we-are">

                <h5 class="heading-small"> WHO WE ARE </h5>

                <br>

                <h4 class="heading-large"> Our Passion For The Outdoors </h4>

                <p class="text"> We do what we do because we are lovers of the outdoors and we wanted to be able to share that passion. Finding your next adventure could be a click away! In times where everything is connected it is getting increasingly difficult to disconnect and appreciate the world around us. The aim of this social platform is to give people a place to share the experiences that they have had, whether that is climbing a mountain or sitting in your back yard. 
                </p>

                <br>

                <a class="explore-link" href="{{ route( 'posts.index') }}">
                    Start Exploring
                </a>

            </section>

    </body>
</html>
