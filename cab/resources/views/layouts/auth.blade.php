
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title> Admin & Dashboard </title>
      
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="{{asset('assets/auth/plugins/material/css/materialdesignicons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/auth/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- PLUGINS CSS STYLE -->
    <link href="{{asset('assets/auth/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
    
    <!-- <link href="{{asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')}}" rel="stylesheet" /> -->
    
    @yield('styles')

    <link href="{{asset('assets/auth/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
    
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    
    <link href="{{asset('assets/auth/plugins/toaster/toastr.min.css')}}" rel="stylesheet" />


    <!--  CSS -->
    <link id="main-css-href" rel="stylesheet" href="{{asset('assets/auth/css/style.css')}}" />

    


    <!-- FAVICON -->
    <link href="images/favicon.png" rel="shortcut icon" />

  </head>


    <body class="navbar-fixed sidebar-fixed" id="body">
  

      

      

      <!-- ====================================
      ——— WRAPPER
      ===================================== -->
      <div class="wrapper">
        
          <!-- ====================================
            ——— LEFT SIDEBAR WITH OUT FOOTER
          ===================================== -->
          <aside class="left-sidebar sidebar-dark" id="left-sidebar">
            <div id="sidebar" class="sidebar sidebar-with-footer">
              <!-- Aplication Brand -->
              <div class="app-brand top-sidebar">
                <a href="/index.html">
                @if (Auth::user()->profile_pic)
                <img style="width:70px;" src="/uploads/profile/{{Auth::user()->profile_pic }}" alt="auth-profile" class="img-fluid auth-img rounded-circle border border-white bg-white transition-x" />
                @else
              
              <img style="width:70px;" src="https://avatars.dicebear.com/api/initials/{{Auth::user()->name ." ". Auth::user()->last_name}}.svg" alt="auth-profile" class="img-fluid auth-img rounded-circle border border-white bg-white transition-x" />
                @endif
                  <span class="brand-name">Admin</span>
                </a>
              </div>
              <!-- begin sidebar scrollbar -->
              <div class="sidebar-left" data-simplebar style="height: 100%;">
                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">
    
                    <li class="every-li" onclick>
                      <a class="sidenav-item-link">
                        <i class="mdi mdi-chart-line"></i>
                        <span class="nav-text">Analytics Dashboard</span>
                      </a>
                    </li>
                   
                    <!-- <li>
                      <a class="sidenav-item-link" href=" {{ route('roles.index') }}">
                        <i class="mdi mdi-chart-line"></i>
                        <span class="nav-text">Manage Roles</span>
                      </a>
                    </li> -->

                    <!-- <li>
                      <a class="sidenav-item-link" href=" {{ route('permissions.index') }}">
                        <i class="mdi mdi-chart-line"></i>
                        <span class="nav-text">Manage Permissions</span>
                      </a>
                    </li> -->


                    <li class="every-li">
                      <a class="sidenav-item-link" href=" {{ route('admin-users.index') }}">
                        <i class="mdi mdi-chart-line"></i>
                        <span class="nav-text">Manage Users</span>
                      </a>
                    </li>

                    <li class="section-title">
                      Apps
                    </li>
                  

                    <li class="every-li"
                    >
                      <a class="sidenav-item-link" href="{{ route('portfolio.index') }}">
                        <i class="mdi mdi-format-line-weight"></i>
                        <span class="nav-text">Portfolio</span>
                      </a>
                    </li>

                    <li class="every-li">
                    <a class="sidenav-item-link" href="{{ route('cabdriver.index') }}">
                        <i class="mdi mdi-format-line-weight"></i>
                        <span class="nav-text">Cab Driver</span>
                      </a>
                    </li>

                    <li class="every-li">
                    <a class="sidenav-item-link" href="{{ route('driver.index') }}">
                        <i class="mdi mdi-format-line-weight"></i>
                        <span class="nav-text">Driver</span>
                      </a>
                    </li>

                    <li class="every-li">
                    <a class="sidenav-item-link" href="{{ route('manual-ride.index') }}">
                        <i class="mdi mdi-format-line-weight"></i>
                        <span class="nav-text">Manual Riding</span>
                      </a>
                    </li>

                    <li class="every-li">
                    <a class="sidenav-item-link" href="{{ route('customer.index') }}">
                        <i class="mdi mdi-format-line-weight"></i>
                        <span class="nav-text">Customer</span>
                      </a>
                    </li>

                    <li class="every-li">
                      <a class="sidenav-item-link" href="{{ route('category.index') }}">
                        <i class="mdi mdi-format-line-weight"></i>
                        <span class="nav-text">Categories</span>
                      </a>
                    </li>

                    <li class="every-li">
                    <a class="sidenav-item-link" href="{{ route('position.index') }}">
                        <i class="mdi mdi-format-line-weight"></i>
                        <span class="nav-text">job Position</span>
                      </a>
                    </li>
                  
                    <li class="every-li">
                      <a class="sidenav-item-link" href="{{ route('posts.index') }}" >
                        <i class="mdi mdi-pencil-box-outline"></i>
                        <span class="nav-text">Blog</span>
                      </a>
                    </li>
                  
                    <li class="every-li">
                      <a class="sidenav-item-link" href="{{ route('review.index') }}" >
                        <i class="mdi mdi-pencil-box-outline"></i>
                        <span class="nav-text">Reviews</span>
                      </a>
                    </li>

                    <li class="every-li">
                      <a class="sidenav-item-link" href="{{ url('auth/resume') }}" >
                        <i class="mdi mdi-pencil-box-outline"></i>
                        <span class="nav-text">Resume</span>
                      </a>
                    </li>

                    <li class="every-li">
                      <a class="sidenav-item-link" href="{{ route('contact.index') }}" >
                        <i class="mdi mdi-account-multiple"></i>
                        <span class="nav-text">Contact</span>
                      </a>
                    </li>

                  
                    <li class="every-li"
                    >
                      <a class="sidenav-item-link" href="{{ route('current_opening.index') }}">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">Current Opening</span>
                      </a>
                    </li>
                  

                    <li  class="has-sub every-li" >
                      <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#users"
                        aria-expanded="false" aria-controls="users">
                        <i class="mdi mdi-account"></i>
                        <span class="nav-text">User</span> <b class="caret"></b>
                      </a>
                      <ul  class="collapse"  id="users"
                        data-parent="#sidebar-menu">
                        <div class="sub-menu">
                          
                              <li >
                                <a class="sidenav-item-link" href="{{route('settings.profile',auth()->user()->id)}}">
                                  <span class="nav-text">User Profile</span>
                                  
                                </a>
                              </li>

                              
                              <li >
                                <a class="sidenav-item-link" href="{{route('change-password')}}">
                                  <span class="nav-text">Reset Password</span>
                                  
                                </a>
                              </li>
                            
                          
                        </div>
                      </ul>
                    </li>
                  

                </ul>

              </div>

              <div class="sidebar-footer">
                <div class="sidebar-footer-content">
                  <ul class="d-flex">
                    <li>
                      <a href="user-account-settings.html" data-toggle="tooltip" title="Profile settings"><i class="mdi mdi-settings"></i></a></li>
                    <li>
                      <a href="#" data-toggle="tooltip" title="No chat messages"><i class="mdi mdi-chat-processing"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </aside>


          <div class="page-wrapper">

            <!-- Header -->
            <header class="main-header" id="header">
            <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
              <!-- Sidebar toggle button -->
              <button id="sidebar-toggler" class="sidebar-toggle">
                <span class="sr-only">Toggle navigation</span>
              </button>

              <span class="page-title">dashboard</span>

              <div class="navbar-right ">

                <!-- search form -->
               

                <ul class="nav navbar-nav">
                  
                  <!-- User Account -->
                  <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">
                    @if(auth()->check() )
                      <img src="images/user/user-xs-01.jpg" class="user-image rounded-circle" alt="" />
                      <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
                      @endif
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li>
                        <a class="dropdown-link-item" href="user-profile.html">
                          <i class="mdi mdi-account-outline"></i>
                          <span class="nav-text">My Profile</span>
                        </a>
                      </li>
                  

                      <li class="dropdown-footer">
                      <a class="auth-text fw-normal m-0" href="{{ url('logout') }}" >Sign out</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </nav>


          </header>

        

        <!-- ====================================
        ——— PAGE WRAPPER
        ===================================== -->
  @yield('content')
            
          </div>
            <!-- Footer -->
            <footer class="footer mt-auto">
              <div class="copyright bg-white">
                <p>
                  &copy; <span id="copy-year"></span>  Dashboard  <a class="text-primary" href="http://www.iamabdus.com/" target="_blank" >Quarec Resource</a>.
                </p>
              </div>
              <script>
                  var d = new Date();
                  var year = d.getFullYear();
                  document.getElementById("copy-year").innerHTML = year;
              </script>
            </footer>

          </div>
      </div>
      
                  



      
                      <script src="{{asset('assets/auth/plugins/jquery/jquery.min.js')}}"></script>
                      <script src="{{asset('assets/auth/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
                      <script src="{{asset('assets/auth/plugins/simplebar/simplebar.min.js')}}"></script>
                      <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

                      
  @yield('scripts')   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
                      
                      <script src="{{asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
                      <script src="{{asset('assets/auth/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}"></script>
                      <script src="{{asset('assets/auth/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}"></script>
                      <script src="{{asset('assets/auth/plugins/jvectormap/jquery-jvectormap-us-aea.js')}}"></script>

                      <script src="{{asset('assets/auth/plugins/daterangepicker/moment.min.js')}}"></script>
                      <script src="{{asset('assets/auth/plugins/daterangepicker/daterangepicker.js')}}"></script>
                
                      <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
                    
                      <script src="{{asset('assets/auth/plugins/toaster/toastr.min.js')}}"></script>

                      <script src="{{asset('assets/auth/js/mono.js')}}"></script>
                      <script src="{{asset('assets/auth/js/chart.js')}}"></script>
                      <script src="{{asset('assets/auth/js/map.js')}}"></script>
                      <script src="{{asset('assets/auth/js/custom.js')}}"></script>

    </body>
  </html>
