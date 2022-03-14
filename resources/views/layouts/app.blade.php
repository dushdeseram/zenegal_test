<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Zenegal Test</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('templates/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('templates/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('templates/vendors/css/vendor.bundle.base.css') }}">
    
    <link rel="stylesheet" href="{{ asset('templates/css/style.css') }}">

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex align-items-center" style="text-align:center;text-transform: uppercase;">
              <a class="navbar-brand brand-logo" style="color: #ffffff;margin: auto;font-weight: bold;">
                Zenegal Test
              </a>
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('images/png/profile.png') }}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
              <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome to Zenegal Test</h5>
              <ul class="navbar-nav navbar-nav-right ml-auto">
                
                <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
                  <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle ml-2" src="{{ asset('images/png/profile.png') }}" alt="Profile image"> <span class="font-weight-normal"></span></a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                      <img class="img-md rounded-circle" src="{{ asset('images/png/profile.png') }}" alt="Profile image" width="150px">
                      <p class="mb-1 mt-3"></p>
                      <p class="font-weight-light text-muted mb-0"></p>
                    </div>
                    <a class="dropdown-item" href="{{URL::to('/logout')}}"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
                  </div>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
              </button>
            </div>
        </nav>
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="profile-image">
                                <img class="img-xs rounded-circle" src="{{ asset('images/png/profile.png') }}" alt="profile image">
                                <div class="dot-indicator bg-success"></div>
                            </div>
                            <div class="text-wrapper">
                                <p class="profile-name">{{ Session::get('user')['name'] }}</p>
                                <p class="designation"></p>
                            </div>
                            <div class="icon-container">
                                <i class="icon-bubbles"></i>
                                <div class="dot-indicator bg-danger"></div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item nav-category">
                        <span class="nav-link">Dashboard</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{URL::to('/dashboard')}}">
                        <span class="menu-title">Dashboard</span>
                        <i class="icon-screen-desktop menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item nav-category"><span class="nav-link">Content</span></li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                            <span class="menu-title">Content</span>
                            <i class="icon-basket menu-icon"></i>
                        </a>
                        <div class="collapse" id="auth">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/company/manage')}}">Manage Companies</a></li>
                                <li class="nav-item"> <a class="nav-link" href="{{URL::to('/employee/manage')}}">Manage Employees</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>

        

        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © zenegal test 2022</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Designed & Developed by <a href="" target="_blank">zenegal test</a> </span>
            </div>
        </footer>
    </div>

    <div class="modal fade common_modal" id="common_modal" tabindex="-1" role="dialog" aria-labelledby="common_modal_label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="common_modal_label">Modal title</h5>
                    <button type="button" class="close" onclick="hide_modal(this)">
                            <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>