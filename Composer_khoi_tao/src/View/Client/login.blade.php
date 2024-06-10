<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <div class="container mt-3">
    <h2 class="m-auto">Login Site</h2>

    @if (!empty($_SESSION['error']))
    <div class="alert alert-warning">
      {{ $_SESSION['error'] }}
    </div>

    @php
    unset($_SESSION['error']);
    @endphp
    @endif
    <section>
      <div class="container mt-5 pt-5">
        <div class="row">
          <div class="col-12 col-sm-8 col-md-6 m-auto">
            <div class="card border-0 shadow">
              <div class="card-body">
                <svg class ="mx-auto" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>

                <form action="{{ url('handle-login') }}" method="POST">
                  <input type="email" class="form-control my-3 py-2" id="email" placeholder="Enter your Email">
                  <input type="password" class="form-control my-3 py-2" id="pwd" placeholder="Enter your Password">
                  <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>

</body>

</html>
<!-- <form action="{{ url('handle-login') }}" method="POST">
  <div class="mb-3 mt-3">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
  </div>
  <div class="mb-3">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->