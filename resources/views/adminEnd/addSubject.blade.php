@extends('adminEnd.adminLayout')
@section('content')
    <h1>Welcome to the Add Subject Page</h1>
    <form action="{{ route('admin.storeSubject') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="subject_name">Subject Name</label>
            <input type="text" class="form-control" id="subject_name" name="subject_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Subject</button>
    </form>
@endsection