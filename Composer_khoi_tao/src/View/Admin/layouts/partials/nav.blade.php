<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="{{ url('admin/') }}"><img src="{{asset('assets/admin/img/logo.png')}}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a class="" href="{{ url('admin/') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{asset('assets/admin/img/menu-icon/dashboard.svg') }}" alt>
                </div>
                <span>Trang chủ</span>
            </a>

        </li>
      
        {{-- <li class>
            <a href="Board.html" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{asset('assets/admin/img/menu-icon/5.svg') }}" alt>
                </div>
                <span>Board</span>
            </a>
        </li>
      --}}
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{asset('assets/admin/img/menu-icon/8.svg') }}" alt>
                </div>
                <span>Sản phẩm</span>
            </a>
            <ul>
                <li><a href="{{ url('admin/products') }}">Products</a></li>
                <li><a href="Product_Details.html">Product Details</a></li>
                <li><a href="Cart.html">Cart</a></li>
                <li><a href="Checkout.html">Checkout</a></li>
            </ul>
        </li>

        <li class>
            <a  href="{{ url('admin/users') }}" aria-expanded="false">
                <div class="icon_menu">
                    <img src="{{asset('assets/admin/img/menu-icon/8.svg') }}" alt>
                </div>
                <span>Tài khoản</span>
            </a>
           
        </li>
     
    </ul>
</nav>