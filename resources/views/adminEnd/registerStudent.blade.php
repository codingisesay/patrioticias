@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <h4 class="fw-bold mb-3">Register Student</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('admin.registerStudent.store') }}" method="POST">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Student Name *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Email *</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Mobile *</label>
                        <input type="text" name="mobile" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Course *</label>
                        <input type="text" name="course" class="form-control" required>
                    </div>

                </div>

                <div class="text-end">
                    <button class="btn btn-primary">
                        Register Student
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
