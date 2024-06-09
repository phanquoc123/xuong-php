{{-- <nav> --}}
<div class="sidebar">
    <a href="{{ url('admin/') }}" class="logo">
        <i class='bx bx-code-alt'></i>
        <div class="logo-name"><span>Asmr</span>Prog</div>
    </a>
    <ul class="side-menu">
        <li><a href="{{ url('admin/') }}"><i class='bx bxs-dashboard'></i>Dashboard</a></li>
        <li><a href="{{ url('admin/products') }}"><i class='bx bx-store-alt'></i>Shop</a></li>
        {{-- <li class=""><a href="#"><i class='bx bx-analyse'></i>Analytics</a></li> --}}
        <li><a href="{{ url('admin/categories') }}"><i class='bx bx-message-square-dots'></i>Catergoriess</a></li>
        <li><a href="{{ url('admin/users') }}"><i class='bx bx-group'></i>Users</a></li>
        {{-- <li><a href="#"><i class='bx bx-cog'></i>Settings</a></li> --}}
    </ul>
    <ul class="side-menu">
        <li>
            <a href="#" class="logout">
                <i class='bx bx-log-out-circle'></i>
                Logout
            </a>
        </li>
    </ul>
</div>
{{-- </nav> --}}
