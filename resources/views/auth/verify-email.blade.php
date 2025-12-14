@extends('layout')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="bg-light rounded p-4">
                <h3>Email Verification</h3>
                <p>Please verify your email address. We have sent a verification link to your email.</p>

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button class="btn btn-primary">Resend Verification Email</button>
                </form>

                <form method="POST" action="{{ route('logout') }}" class="mt-3">
                    @csrf
                    <button class="btn btn-secondary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
