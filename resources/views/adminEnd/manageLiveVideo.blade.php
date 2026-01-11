@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <div class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="fw-bold mb-1">Manage Live / Latest Videos</h4>
            <p class="text-muted mb-0">View & manage latest session videos</p>
        </div>

        <a href="{{ route('admin.addLiveVideo') }}" class="btn btn-primary">
            + Add Video
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>English Video</th>
                        <th>Hindi Video</th>
                        <th>Created</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>

                @forelse($videos as $index => $video)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>
                            @if($video->VideoEmbedCodeEnglish)
                                <span class="badge bg-success">Available</span>
                            @else
                                <span class="badge bg-secondary">N/A</span>
                            @endif
                        </td>

                        <td>
                            @if($video->VideoEmbedCodeHindi)
                                <span class="badge bg-success">Available</span>
                            @else
                                <span class="badge bg-secondary">N/A</span>
                            @endif
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($video->created_at)->format('d M Y') }}
                        </td>

                        <td class="text-end">
                            <form method="POST"
                                  action="{{ route('admin.deleteLiveVideo', $video->VideoId) }}"
                                  onsubmit="return confirm('Are you sure?')"
                                  class="d-inline">
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
                        <td colspan="5" class="text-center text-muted py-4">
                            No videos found
                        </td>
                    </tr>
                @endforelse

                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection
