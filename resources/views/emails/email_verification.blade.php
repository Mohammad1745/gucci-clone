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
    <title>Verification</title>
</head>
<body>

<div>
    <section class="vh-100" style="background-color: white;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <form action="{{route('verification')}}" method="post">
                            @csrf
                            <div class="card-body p-5 text-center">

                                <h3 class="mb-5">Verification</h3>


                                        <input name="email"type="hidden" id="emailAddress" class="form-control form-control-lg" value="{{$email}}"/>



                                @if (isset($errors) && $errors->has('email'))
                                    <span class="text-danger"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                                <div class="d-flex flex-row align-items-center mb-1">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" for="Verification Code">Verification Code</label>
                                        <input name="verification_code"type="text" id="emailAddress" class="form-control form-control-lg" />
                                    </div>

                                </div>
                                @if (isset($errors) && $errors->has('verification_code'))
                                    <span class="text-danger"><strong>{{ $errors->first('verification_code') }}</strong></span>
                                @endif
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Submit</button>
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
