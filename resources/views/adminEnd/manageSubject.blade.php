@extends('adminEnd.adminLayout')

@section('content')

<div class="container-fluid py-4">

    {{-- Page Title --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Manage Subjects</h4>
        <p class="text-muted mb-0">View, edit or delete subjects</p>
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
                        <th>Subject Name</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($subjects as $index => $subject)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td class="fw-semibold">
                                {{ $subject->SubjectName }}
                            </td>
                             <td>
                                <span class="badge {{ $subject->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $subject->status == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>


                            <td class="text-end">
                               <a href="{{ route('admin.editSubject', $subject->SubjectId) }}"
                                 class="btn btn-sm btn-outline-primary">
                                 Edit
                            </a>


                                <form action="{{ route('admin.deleteSubject', $subject->SubjectId) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this subject?')">
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
                            <td colspan="4" class="text-center text-muted py-4">
                                No subjects found
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection
