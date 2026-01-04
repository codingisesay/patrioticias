@extends('adminEnd.adminLayout')

@section('content')

<div class="container-fluid py-4">

    {{-- Page Title --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Add Subject</h4>
        <p class="text-muted mb-0">Create a new subject for courses</p>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-6 col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-body">

                    <form method="POST" action="{{ route('admin.storeSubject') }}">
                        @csrf

                        {{-- Subject Name --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Subject Name <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                name="subject_name"
                                class="form-control form-control-lg @error('subject_name') is-invalid @enderror"
                                placeholder="e.g. General Studies"
                                value="{{ old('subject_name') }}"
                            >
                            @error('subject_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Subject Code --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Subject Code
                            </label>
                            <input
                                type="text"
                                name="subject_code"
                                class="form-control"
                                placeholder="e.g. GS-01"
                            >
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">
                                Description
                            </label>
                            <textarea
                                name="description"
                                class="form-control"
                                rows="3"
                                placeholder="Short description about the subject"
                            ></textarea>
                        </div>

                        {{-- Status --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Status <span class="text-danger">*</span>
                            </label>
                            <select name="status" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                        {{-- Buttons --}}
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ url()->previous() }}" class="btn btn-light">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                Save Subject
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection
