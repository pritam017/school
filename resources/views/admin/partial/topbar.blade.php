<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">




        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>

                    <img src="{{ asset('uploads/user/'. Auth::user()->image) }}" width="50" style="border-radius: 50%" class="img-fluid" alt="">

            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">

                <div class="dropdown-divider"></div>
                <div>

                    <a class="dropdown-item pl-3" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </li>

    </ul>

</nav>
