@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">Manage Lectures</h4>

        {{-- ADD LECTURE BUTTON --}}
        <a href="{{ route('admin.createLecture') }}" class="btn btn-primary">
            + Add Lecture
        </a>
    </div>

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- TABLE CARD --}}
    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th width="50">#</th>
                        <th>Course</th>
                        <th>Subject</th>
                        <th>Lecture Topic</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Video</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($lectures as $index => $lec)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>
                                <strong>{{ $lec->CourseName }}</strong>
                            </td>

                            <td>
                                {{ $lec->SubjectName }}
                            </td>

                            <td>
                                {{ $lec->SubjectLocalName }}
                            </td>

                            <td>
                                {{ date('d M Y, h:i A', strtotime($lec->LectureStartTime)) }}
                            </td>

                            <td>
                                {{ date('d M Y, h:i A', strtotime($lec->LectureEndTime)) }}
                            </td>

                            <td>
                                @if($lec->VideoEmbedCode)
                                    <span class="badge bg-success">Available</span>
                                @else
                                    <span class="badge bg-secondary">N/A</span>
                                @endif
                            </td>

                            {{-- ONLY EDIT --}}
                            <td>
                                <a href="{{ route('admin.editLecture', $lec->LectureId) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                 {{-- ADD HANDOUT --}}
                                 <a href="{{ route('admin.addHandout', $lec->LectureId) }}"
                                 class="btn btn-sm btn-primary">
                                          ADD
                                    </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                No lectures found
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>
@endsection
