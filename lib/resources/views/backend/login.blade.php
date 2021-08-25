<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('public/asset/backend/css/login.css')}}">
</head>
<body class="d-flex flex-column">
  <main class="m-auto">
    <div class="container-fluid">
      <div class="card login-card">
        <div class="card-body">
          <h2 class="login-card-title">Sign in</h2>
            <form role="form" method="post">
				<fieldset>
				@include('errors.note')
					<div class="form-group">
						<label for="username" class="sr-only">E-mail</label>
						<input class="form-control" id="username" placeholder="E-mail" name="email" type="email" autofocus="" value="{{old('email')}}">
					</div>
					<div class="form-group">
						<label for="password" class="sr-only">Password</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Password">
					</div>
					<div class="form-options-wrapper">
						<div class="custom-control custom-checkbox login-card-check-box">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" for="customCheck1" style="cursor: pointer;">Remember Me</label>
						</div>              
					</div>
					<input name="submit" id="login" class="btn login-btn" type="submit" value="Login">
				</fieldset>
				{{csrf_field()}}
			</form>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

