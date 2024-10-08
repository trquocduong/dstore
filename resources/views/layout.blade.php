<!DOCTYPE html>
<html lang="en">
    @php
    use Illuminate\Support\Str;
    @endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Allaia | Bootstrap eCommerce Template - ThemeForest</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
	
    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="{{asset('css/checkout.css')}}" rel="stylesheet">
    <link href="{{asset('css/product_page.css')}}" rel="stylesheet">
    <link href="{{asset('css/about.css')}}" rel="stylesheet">
    <link href="{{asset('css/blog.css')}}" rel="stylesheet">
    <link href="{{asset('css/home_1.css')}}" rel="stylesheet">
    <link href="{{asset('css/contact.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

</head>

<body>
	
	<div id="page">
    <header>
        {{-- <h1>@yield('title2')</h1> --}}
        @include('components.header')
        @yield('banner') 
    </header>
    {{-- @include('components.banner') --}}

    <main>
        @yield('content')
    </main>

    @include('components.footer')
    </div>
    <div id="toTop"></div><!-- Back to top button -->
	
	<!-- COMMON SCRIPTS -->
    <script src="{{asset('js/common_scripts.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="{{asset('js/modernizr.j')}}s"></script>
	<script src="{{asset('js/video_header.min.js')}}"></script>
    <script  src="{{asset('js/carousel_with_thumbs.js')}}"></script>
	<script>
		// Video Header
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script>
	<script src="js/isotope.min.js"></script>

	<script>
		// Isotope filter
		$(window).on('load',function(){
		  var $container = $('.isotope-wrapper');
		  $container.isotope({ itemSelector: '.isotope-item', layoutMode: 'masonry' });
		});
		$('.isotope_filter').on( 'click', 'a', 'change', function(){
		  var selector = $(this).attr('data-filter');
		  $('.isotope-wrapper').isotope({ filter: selector });
		});
	</script>
    

</body>
</html>