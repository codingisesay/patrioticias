@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Add Exam Type</h4>
        <p class="text-muted">Create exam types like UPSC, UPPCS</p>
    </div>

    {{-- CARD --}}
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-body">

            <form action="{{ route('admin.storeExamType') }}" method="POST">
                @csrf

                {{-- Exam Name --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Exam Name *</label>
                    <input type="text" name="exam_name" class="form-control">
                </div>

                {{-- Exam Code --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Exam Code </label>
                    <input type="text" name="exam_code" class="form-control">
                </div>

                {{-- Stages --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Exam Stages </label>
                    <div class="d-flex gap-4">
                        <label><input type="checkbox" name="stages[]" value="Prelims"> Prelims</label>
                        <label><input type="checkbox" name="stages[]" value="Mains"> Mains</label>
                        <label><input type="checkbox" name="stages[]" value="Interview"> Interview</label>
                    </div>
                </div>

                {{-- Medium --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Available Medium</label>
                    <select name="medium" class="form-select">
                        <option value="">Select Medium</option>
                        <option>Hindi</option>
                        <option>English</option>
                        <option>Bilingual</option>
                    </select>
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                {{-- Status --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold">Status </label>
                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                {{-- BUTTONS --}}
                <div class="d-flex justify-content-end gap-2">
                    <a href="#" class="btn btn-light">Cancel</a>
                    <button class="btn btn-primary">Save Exam Type</button>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
