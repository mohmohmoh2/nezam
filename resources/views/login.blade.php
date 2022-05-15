

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Login | </title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assist/assists/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assist/assists/css/signin.css') }}" rel="stylesheet">
  </head>
  <body class="text-center">
    <main class="form-signin">
      @include('err')
      <form action="{{ route('admin.login') }}" method="post" class="form">
        @csrf
        <img class="mb-4" src="{{ asset('assist/assists/img/contact.svg') }}" alt="" width="100" height="100">
        <h1 class="h5 mb-3 fw-normal">Login To </h1>
        <div class="form-floating">
          <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary my-3" name="login" type="submit">Sign in</button>
        <h6>If you Haven't Account Please <a href="{{ route('front.signUp') }}">Sign UP</a></h6>

        <h6>If you Forget Password <a href="../login/reset.php" id="reset">Reset</a></h6>

      </form>
    </main>


    <script src="script.js"></script>
    <script src="../assists/bootstrap/bootstrap.bundle.min.js"></script>
  </body>
</html>
