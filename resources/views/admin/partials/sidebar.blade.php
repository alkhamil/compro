<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        @if (Auth::user()->role == 'ADMIN')
        <li class="nav-item">
            <a class="nav-link @if (!request()->is('admin/dashboard')) collapsed @endif"
                href="{{ url('admin/dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (!request()->is('admin/user')) collapsed @endif" href="{{ url('admin/user') }}">
                <i class="bi bi-people"></i>
                <span>User</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if (!request()->is('admin/banner')) collapsed @endif" href="{{ url('admin/banner') }}">
                <i class="bi bi-card-heading"></i>
                <span>Banner</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if (!request()->is('admin/blog')) collapsed @endif"
                href="{{ url('admin/blog') }}">
                <i class="bi bi-newspaper"></i>
                <span>Blog</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if (!request()->is('admin/teacher')) collapsed @endif"
                href="{{ url('admin/teacher') }}">
                <i class="bi bi-person-badge"></i>
                <span>Teacher</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if (!request()->is('admin/calendar')) collapsed @endif"
                href="{{ url('admin/calendar') }}">
                <i class="bi bi-calendar"></i>
                <span>Calendar</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link @if (!request()->is('admin/setting')) collapsed @endif"
                href="{{ url('admin/setting/view') }}">
                <i class="bi bi-gear"></i>
                <span>Setting & Information</span>
            </a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link @if (!request()->is('admin/dashboard')) collapsed @endif"
                href="{{ url('admin/dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if (!request()->is('admin/blog')) collapsed @endif"
                href="{{ url('admin/blog') }}">
                <i class="bi bi-newspaper"></i>
                <span>Blog</span>
            </a>
        </li>
        @endif
            
        



    </ul>

</aside><!-- End Sidebar-->