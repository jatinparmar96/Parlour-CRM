<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @include('components.styles')
</head>

<body>
    <div class="register-container full-height sm-p-t-30">
        <div class="d-flex justify-content-center flex-column full-height ">

            <h3>Register Here For Demo</h3>


            @if(count($errors)!=0)
            <pre> {{ var_dump($errors->default) }}</pre>
            @error('password')
            <pre> {{ var_dump($message) }}</pre>
            @enderror
            <div class="danger">
                <ul>

                    @foreach ($errors as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>

            </div>

            @endif

            <form id="form-register" class="p-t-15" role="form" action="{{ route('register') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @error('name')has-error @enderror">
                            <label>Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <label id="name-error" class="error" for="name">{{$message}}</label>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @error('email')has-error @enderror">
                            <label>Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        </div>
                        @error('email')
                        <label id="email-error" class="error" for="email">{{$message}}</label>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group @error('password')has-error @enderror">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        </div>
                        @error('password')
                        <label id="password-error" class="error" for="password">{{$message}}</label>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group ">
                            <label>Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                    </div>
                </div>
                <div class="row m-t-10">
                    <div class="col-lg-6">
                        <p><small>I agree to the <a href="#" class="text-info">Pages Terms</a> and <a href="#" class="text-info">Privacy</a>.</small></p>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="#" class="text-info small">Help? Contact Support</a>
                    </div>
                </div>
                <button aria-label="" class="btn btn-primary btn-cons m-t-10" type="submit">Create a new
                    account</button>
            </form>
        </div>
    </div>
    @include('components.scripts')
</body>

</html>
