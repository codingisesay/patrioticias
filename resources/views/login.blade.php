@extends('layout')

@section('content')
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="bg-light rounded p-5">
                    <h1 class="text-center mb-4">Login</h1>

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Email address</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Enter email"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Password"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="remember">
                            Remember Me
                            <a href="{{ route('password.request') }}" class="float-right">Forgot Password?</a>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-4">
                            Login
                        </button>
                    </form>

                    {{-- ERROR DISPLAY --}}
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            {{ $errors->first() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
