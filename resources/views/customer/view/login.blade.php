<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/customer/style.css">
    <link rel="stylesheet" type="text/css" href="/css/customer/bootstrap.min.css">
    <link rel="stylesheet" src="">
    <title>Login</title>
</head>
<body>

<div>
    <section class="vh-100" style="background-color: white;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <form action="{{route('processLogin')}}" method="post">
                            @csrf
                            <div class="card-body p-5 text-center">

                                <h3 class="mb-5">Sign in</h3>

                                <div class="d-flex flex-row align-items-center mb-1">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="emailAddress">Email</label>
                                        <input name="email"type="email" id="emailAddress" class="form-control form-control-lg" />
                                    </div>

                                </div>
                                @if (isset($errors) && $errors->has('email'))
                                    <span class="text-danger"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                                <div class="d-flex flex-row align-items-center mb-1">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="typePasswordX-2">Password</label>
                                        <input name="password"type="password" id="typePasswordX-2" class="form-control form-control-lg" />

                                    </div>
                                </div>

                                @if (isset($errors) && $errors->has('password'))
                                    <span class="text-danger"><strong>{{ $errors->first('password') }}</strong></span>
                                @endif
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                                <div class="text-center">
                                    <p>Don't have account? <a  href="{{route('registration')}}">sign up</a></p>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


</body>
</html>
