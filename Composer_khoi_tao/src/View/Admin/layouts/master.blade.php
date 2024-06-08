<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from demo.dashboardpack.com/sales-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 07:23:13 GMT -->

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title> @yield('title')</title>


  @include('layouts.partials.head')
</head>

<body class="crm_body_bg">


    @include('layouts.partials.nav')

    <section class="main_content dashboard_part large_header_bg">

        @include('layouts.partials.topbav')

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">

              @yield('content')
            </div>
        </div>

        @include('layouts.partials.footer')
    </section>


    @include('layouts.components.chat')

    @include('layouts.partials.script')
    
  @include('layouts.partials.head')
</body>

<!-- Mirrored from demo.dashboardpack.com/sales-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 24 May 2024 07:24:00 GMT -->

</html>
