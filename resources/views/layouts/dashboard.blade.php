<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ secure_asset('images/favico-64x64.png') }}" type="image/x-icon" />
    <link rel="icon" href="{{ secure_asset('images/favico-64x64.png') }}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Page</title>

    <!-- Main Styles for this app -->
    <link href="{{ secure_asset('css/coreui-style.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ secure_asset('css/simple-line-icons.css') }}" rel="stylesheet">

    @section('plugin')
    @show
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
        <a class="navbar-brand" href="{{ route('admin.index') }}"></a>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item">
                <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    @if(Auth::user()->image !== null)
                    <img src="{{ secure_asset('images/user-pp/'.Auth::user()->image) }}" class="img-avatar" alt="{{ Auth::user()->email }}">
                    @else
                    <img src="{{ secure_asset('images/user-pp/user.png') }}" class="img-avatar" alt="{{ Auth::user()->email }}">
                    @endif
                    <span class="d-md-down-none">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">

                    <div class="dropdown-header text-center">
                        <strong>Account</strong>
                    </div>
                    <a class="dropdown-item" href="{{ route('admin.profil') }}"><i class="fa fa-user"></i> Profil</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="fa fa-lock"></i> Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {!! csrf_field() !!}
                    </form>
                </div>
            </li>
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="#">&nbsp;</a>
            </li>
        </ul>
    </header>

    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item nav-dropdown">
                      <a class="nav-link nav-dropdown-toggle" href="#"><i class="fa fa-star" aria-hidden="true"></i> Artikel Fanclub</a>
                      <ul class="nav-dropdown-items">
                          <li class="nav-item">
                               <a class="nav-link" href="{{ route('admin.artikel') }}"><i class="fa fa-plus" aria-hidden="true"></i>Artikel</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('admin.category') }}"><i class="fa fa-folder-open" aria-hidden="true"></i>Kategori Artikel</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('admin.tag') }}"><i class="fa fa-tags" aria-hidden="true"></i>Tag Artikel</a>
                          </li>
                      </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.invite') }}"><i class="fa fa-user-circle" aria-hidden="true"></i>Invite Admin</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main content -->
        <main class="main">
            <!-- Konten disini -->
            @yield('content')
            <!-- /.conainer-fluid -->
        </main>

        <aside class="aside-menu">
        </aside>


    </div>

    <!-- Bootstrap and necessary plugins -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js"></script>


    <!-- Plugins and scripts required by all views -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>


    <!-- GenesisUI main scripts -->
    <script src="{{ secure_asset('js/genesis-ui.min.js') }}"></script>

    <!-- Plugin Script -->
    @section('pluginjs')
    @show
</body>
</html>
