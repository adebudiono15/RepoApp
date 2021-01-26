<!-- Sidebar -->
<div class="sidebar sidebar-style-2" >			
<div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
        {{--  <div class="user">
            <div class="avatar-sm float-left mr-2">
                <img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        {{ Auth::user()->name }} Nama
                        <span class="user-level">
                            Role User
                            {{ Auth::user()->nip }}
                        </span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <span class="link-collapse">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>  --}}

        <ul class="nav nav-primary">
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="flaticon-home"></i>
                    <p>Home</p>
                </a>
            </li>
            
            <li class="nav-item {{ Request::is('upload') ? 'active' : '' }}">
                <a href="{{ route('upload') }}">
                    <i class="flaticon-desk"></i>
                    <p>Upload</p>
                </a>
            </li>

            <li class="nav-item {{ Request::is('edit-password') ? 'active' : '' }}">
                <a href="{{ route('edit-password') }}">
                    <i class="flaticon-user-5"></i>
                    <p>Akun</p>
                </a>
            </li>
            <li class="nav-item {{ Request::is('setting') ? 'active' : '' }}">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="flaticon-next"></i>
                    <p>Logout</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
</div>