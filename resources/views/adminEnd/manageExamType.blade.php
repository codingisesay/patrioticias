@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Manage Exam Types</h4>
        <p class="text-muted">View, edit or delete exam types</p>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <table class="table align-middle table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Exam Name</th>
                        <th>Code</th>
                        <th>Stages</th>
                        <th>Medium</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($examTypes as $index => $exam)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td class="fw-semibold">
                                {{ $exam->ExamTypeName }}
                            </td>

                            <td>{{ $exam->exam_code ?? '-' }}</td>

                            <td>{{ $exam->stages ?? '-' }}</td>

                            <td>{{ $exam->medium ?? '-' }}</td>

                            <td>
                                @if(($exam->status ?? 1) == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>

                            <td class="text-end">
                                {{-- Edit (next step) --}}
                               <a href="{{ route('admin.editExamType', $exam->ExamTypeId) }}"
                                  class="btn btn-sm btn-outline-primary">
                                              Edit
                               </a>


                                {{-- Delete --}}
                                <form action="{{ route('admin.deleteExamType', $exam->ExamTypeId) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                No exam types found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
