@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <div class="mb-4">
        <h4 class="fw-bold mb-1">Edit Exam Type</h4>
        <p class="text-muted">Update exam type details</p>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="{{ route('admin.updateExamType', $exam->ExamTypeId) }}"
                  method="POST">
                @csrf
                @method('PUT')

                {{-- Exam Name --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Exam Name <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           name="exam_name"
                           value="{{ old('exam_name', $exam->ExamTypeName) }}"
                           class="form-control"
                           required>
                </div>

                {{-- Status --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Status</label>
                    <select name="status" class="form-select">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                {{-- Buttons --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.manageExamType') }}"
                       class="btn btn-light">
                        Cancel
                    </a>
                    <button class="btn btn-primary">
                        Update Exam Type
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
