@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <h4 class="fw-bold mb-3">Edit Subject</h4>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form method="POST"
                  action="{{ route('admin.updateSubject', $subject->SubjectId) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Subject Name</label>
                    <input type="text"
                           name="subject_name"
                           class="form-control"
                           value="{{ $subject->SubjectName }}"
                           required>
                </div>

                      <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                <div class="text-end">
                    <a href="{{ route('admin.manageSubject') }}"
                       class="btn btn-secondary">
                        Cancel
                    </a>
                    <button class="btn btn-primary">
                        Update Subject
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
