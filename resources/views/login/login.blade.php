<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body class="d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <h1 class="title_login">Login Page</h1>
                @if (session('error'))
                    <div class="alert alert-danger">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        @endif
                        @if (session('error'))
                            {{ session('error') }}
                        @endif
                    </div>
                @endif
                <br>
                <form action="{{ route('login.submit') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" type="email" id="email" name="email"
                            required>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" type="password" id="password" name="password"
                            required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    <br>
                    <br>
                    <a href="{{ route('register') }}" class="btn btn-secondary">tidak memiliki akun?, regsiter
                        disini!</a>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
