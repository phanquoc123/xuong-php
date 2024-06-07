<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style1.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container">
        <h1> Trang Home</h1>
        <div class="row">
            <h1> WELCOME {{ $name }}</h1>
            @if (!isset($_SESSION['user']))
            <a href="{{ url('login') }}"><button type="button" class="btn btn-primary">LOGIN</button></a>
            @endif
            @if (isset($_SESSION['user']))
                 <form action="{{ url('logout') }}" method="post">
               <button type="submit" class="btn btn-danger">LOGOUT</button>
            </form>
            
            @endif
            
           
        </div>
    </div>








</body>

</html>
