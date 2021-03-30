@extends('layout.app')

@section('content')

<div id="app" class="page">
    <section class="section ">
        <div class="container">
            <div class="">

                <!--single-page open-->
                <div class="single-page">
                    <div class="">
                        <div class="wrapper wrapper2">
                            <form id="login" class="card-body" tabindex="500" action="{{route('login_action')}}"
                                method="post">
                                @csrf
                                @if ($errors->first('error'))
                                <div class="alert alert-danger text-center">
                                    <strong>{{$errors->first('error')}}</strong>
                                </div>
                                @endif
                                <h3 class="text-dark">Login</h3>
                                <div class="mail">
                                    <input type="email"
                                        class="form-control {{ $errors->first('email') ? 'is-invalid' : ''}}"
                                        id="exampleInputEmail1" placeholder="Enter email"
                                        value="{{ $errors->first('email') }}" name="email" required>
                                    <span class="invalid-feedback">{{($errors->first('user.email'))}}</span>

                                </div>
                                <div class="passwd">
                                    <input type="password"
                                        class="form-control {{ $errors->first('user.password') ? 'is-invalid' : ''}}"
                                        id="exampleInputPassword1" placeholder="Password" name="password" required>
                                    <span class="invalid-feedback">{{($errors->first('user.password'))}}</span>

                                </div>
                                <p class="mb-3 text-right"><a href="forgot.html">Forgot Password</a></p>
                                <div class="submit">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                                <div class="signup mb-0">
                                    <p class="text-dark mb-0">Don't have account?<a href="register.html"
                                            class="text-primary ml-1">Sign UP</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--single-page closed-->

            </div>
        </div>
    </section>
</div>
@endsection
