  <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b></b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">Dashboard</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Welcome:  
                                  <span class="hidden-xs">&nbsp;&nbsp;{{ucfirst(Auth::user()->name)}}</span>
                                </a>
                                <ul class="dropdown-menu" style="width:100px!important">
                                    <div>
                                      <a href="{{ route('logout') }}" class="btn btn-primary" style=width:100%>Sign out</a>
                                    </div>
                                </ul>
                            </li>
                         <!-- Control Sidebar Toggle Button -->
                        </ul>
                    </div>
                </nav>
            </header>