<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" media="all" href="{{ secure_asset('css/app.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Miriam+Libre:400,700|Source+Sans+Pro:400,700,600,400italic,700italic">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @section('addons')
    @show
</head>
<body>
    <div id="container">
        <div id="header">
            <nav class="site-nav">
              <div class="container wrapper">
                  <div class="nav__header">
                       <a class="nav__logo" href="{{ route('home') }}">
                           <img class="logo" src="http://4.bp.blogspot.com/-HHvg1xeTutI/WG-7XoPcObI/AAAAAAAAD1E/MGqIFPRE_C0KX0T4G8UCrvChDSuQhdqdACK4B/s1600/kepala%2Bussop%2Bone%2Bpiece%2B2.png">
                           <h4 class="logo__title">{{ config('app.name', 'Laravel') }}</h4>
                       </a>

                       <button type="button" class="nav__hamburger js-menu-toggle">
                           <div class="hamburger-box">
                               <div class="hamburger-inner"></div>
                           </div>
                       </button>
                   </div>
                   <div class="nav__container js-menu">
                       <div class="nav__search">
                           <form class="search" action="#">
                               <input type="text" name="q" placeholder="cari sesuatu">
                               <button type="submit">
                                   <i class="fa fa-search" aria-hidden="true"></i>
                               </button>
                           </form>
                       </div>
                       <div class="nav__main">
                           <ul>
                               <li class="nav__item"><a href="{{ route('home.category', ['category' => 'AniManga']) }}">AniManga</a></li>
                               <li class="nav__item"><a href="{{ route('home.category', ['category' => 'News']) }}">News</a></li>
                               <li class="nav__item"><a href="{{ route('home.category', ['category' => 'Celebrity']) }}">Celebrity</a></li>
                               <li class="nav__item"><a href="{{ route('home.category', ['category' => 'Entertainment']) }}">Entertainment</a></li>
                               <li class="nav__item"><a href="{{ route('home.listcat') }}">Artikel Lainnya</a></li>
                           </ul>
                       </div>
                       <ul class="nav__social social">
                           <li>
                                <a href="#" class="social__icon icon--facebook">
                                    <i class="fa fa-facebook-square" aria-hidden="true"></i>
                                </a>
                           </li>
                       </ul>
                   </div>
               </div>
           </nav>
        </div>

        <div id="content">
            <main class="site-main">
                @yield('content')
            </main>
        </div>

        <footer class="site-footer">
          <div class="container wrapper">
            <div class="footer__copy mt1">
              <p style="color: #eee">Copyright &copy; 2017 Anime FanClub</p>
            </div>
          </div>
        </footer>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{ secure_asset('js/app.js') }}"></script>
</body>
</html>
