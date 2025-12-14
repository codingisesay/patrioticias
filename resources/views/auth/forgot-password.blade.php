@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="bg-light rounded p-4">
                <h3>Forgot Password</h3>

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <button class="btn btn-primary mt-3">Send Reset Link</button>
                </form>

                <a href="{{ route('loginPage') }}" class="d-block mt-3">Back to Login</a>
            </div>
        </div>
    </div>
</div>
@endsection
