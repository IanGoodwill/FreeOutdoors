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
                            <img class="img-responsive"  alt="logo" src="{{URL('/images/mountain-big.png')}}">
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
                <img class="mountain-lake-image" src="{{URL('/images/adventure-big-text.jpg')}}" aria-label="Picture of people looking at a mountain lake.">
                <figcaption><small>Image by <a href="https://pixabay.com/users/Pexels-2286921/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2179256">Pexels</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2179256">Pixabay</a></small></figcaption>
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

            <section class="what-we-do">
                <h5 class="heading-small"> WHAT WE DO </h5>
                <br>
                <h4 class="heading-large"> Sharing Our Adventures </h4>
                <p class="text"> Deep into the wilds or in our backyard, we share the things that make us happy. we encourage everyone to share their passion for the outdoors regardless of their location or background.
                </p>
                <div class="gallery-container">
                    <figure class="gallery-image">
                        <img class="gallery-image" src="{{URL('/images/snow.jpg')}}" aria-label="Picture of a hiker in the snow">
                        <figcaption class="gallery-caption"><small>Image by <a href="https://pixabay.com/users/Noel_Bauza-2019050/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1185474">Noel Bauza</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1185474">Pixabay</a></small></figcaption>
                    </figure>
                    <figure class="gallery-image">
                        <img class="gallery-image" src="{{URL('/images/man-desert.jpg')}}" aria-label="Picture of peron jumping from one rock to another in a desert">
                        <figcaption class="gallery-caption"><small>Image by <a href="https://pixabay.com/users/stokpic-692575/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=731900">stokpic</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=731900">Pixabay</a></small></figcaption>
                    </figure>
                    <figure class="gallery-image">
                        <img class="gallery-image" src="{{URL('/images/feet-lake.jpg')}}" aria-label="Picture of a persons feet looking over a mountain lake">
                        <figcaption class="gallery-caption"><small>Image by <a href="https://pixabay.com/users/asmuSe-3280612/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1749508">畅 苏</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1749508">Pixabay</a></small></figcaption>
                    </figure>
                    <figure class="gallery-image">
                        <img class="gallery-image" src="{{URL('/images/cliff-cabin.jpg')}}" aria-label="Picture of people doing a yoga pose on top of a cliff">
                        <figcaption class="gallery-caption"><small>Image by <a href="https://pixabay.com/users/sasint-3639875/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1822484">Sasin Tipchai</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1822484">Pixabay</a></small></figcaption>
                    </figure>
                    <figure class="gallery-image">
                        <img class="gallery-image" src="{{URL('/images/dolomites.jpg')}}" aria-label="Picture of mountains and a meadow">
                        <figcaption class="gallery-caption"><small>Image by <a href="https://pixabay.com/users/kordi_vahle-4934524/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2580866">kordula vahle</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=2580866">Pixabay</a></small></figcaption>
                    </figure>
                    <figure class="gallery-image">
                        <img class="gallery-image" src="{{URL('/images/yard.jpg')}}" aria-label="Picture of a little kid playing in the yard.">
                        <figcaption class="gallery-caption"><small>Image by <a href="https://pixabay.com/users/Pexels-2286921/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1867464">Pexels</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=1867464">Pixabay</a></small></figcaption>
                    </figure>
                </div>
            </section>

            <section class="why-join">
                <h5 class="heading-small"> WHY JOIN? </h5>
                <br>
                <h4 class="heading-large">To Get Inspired </h4>
                <p class="text">Search no further for tips and tricks to enjoying the outdoors. Our platform is not bogged down with adds or filler content. Join the community to learn and share about local hiking trails, Events in your area, or simply to explore other peoples adventures to get away for a moment or to plan your next excursion.
                </p>
                <figure>
                    <img class="girl-yard-image" src="{{URL('/images/girl-yard.jpg')}}" aria-label="Picture of young girl looking at a yard. Image by Pexels from Pixabay.">
                    <figcaption><small>Image by <a href="https://pixabay.com/users/Skitterphoto-324082/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=535251">Rudy and Peter Skitterians</a> from <a href="https://pixabay.com/?utm_source=link-attribution&amp;utm_medium=referral&amp;utm_campaign=image&amp;utm_content=535251">Pixabay</a></small></figcaption>
                </figure>

                <a  href="{{ route( 'register') }}"><h4 class="heading-large"> Click Here To Create An Account </h4> </a>
                <h4 class="heading-large"> OR </h4>
                <h4 class="heading-large"> Get Outside And Play! </h4>
            </section>

            <figure>
                <img class="page-bottom" src="{{URL('/images/footer-deer.png')}}" aria-label="Silhouette of a deer among trees.">
            </figure>

            <footer class="footer">
                <h3>FreeOutdoors &copy; Copyright 2020</h3>
            </footer>
    </body>
</html>
