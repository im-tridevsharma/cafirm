<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin | Login</title>
</head>

<body>
    <div class="fluid">
        <div class="d-flex align-items-center justify-content-center" style="height: 100vh;background-color:#f4f3ef;">
            <div class="col-md-3 col-sm-12 p-5 rounded border" style="background-color: #fff;">
                <div class="d-flex align-items-center justify-content-center flex-column">
                    <div class="rounded-circle overflow-hidden" style="width: 50px;height:50px;">
                        <img src="/images/admin-login-user.png" alt="admin-login" style="object-fit:contain; height:50px;" />
                    </div>
                    <h4 class="lead">Admin Login</h4>
                </div>
                @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endforeach
                @endif
                <form class="mt-4" method="POST" action="{{ route('admin.authenticate') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Email/Username</label>
                        <input type="text" name="email_or_username" class="form-control" value="{{ old('email_or_username') }}" />
                    </div>
                    <div class="form-group mt-2">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" />
                    </div>
                    <div class="mt-3 d-grid">
                        <button class="btn btn-warning" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>