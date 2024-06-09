<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Responsive Dashboard Design #2 | AsmrProg</title>

    @include('layouts.partials.head')
</head>

<body>

    <!-- Sidebar -->
    @include('layouts.partials.sidebar')

    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        @include('layouts.partials.nav')

        <!-- End of Navbar -->


        <main>
            @yield('content')
          

        </main>

    </div>

    @include('layouts.partials.script')
</body>

</html>
