@extends('adminEnd.adminLayout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12">
            <h2 class="mb-4 text-center">Create Course</h2>

            <form method="POST" action="">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <!-- Module Assign -->
                <div class="mb-3">
                    <label for="module" class="form-label">Module Assign</label>
                    <input type="text" class="form-control" id="module" name="module" required>
                </div>

                <!-- Contact + Course Mode (Same Line) -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="contact" class="form-label">Contact No.</label>
                        <input type="text" class="form-control" id="contact" name="contact" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="course_mode" class="form-label">Course Mode</label>
                        <select class="form-control" id="course_mode" name="course_mode" required>
                            <option value="">Select Mode</option>
                            <option value="online">Online</option>
                            <option value="offline">Offline</option>
                        </select>
                    </div>
                </div>

                <!-- Full Width Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">
                        Create Course
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
