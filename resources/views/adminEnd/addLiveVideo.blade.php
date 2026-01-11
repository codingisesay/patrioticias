@extends('adminEnd.adminLayout')

@section('content')
<div class="container-fluid py-4">

    <h4 class="fw-bold mb-3">Add Live / Latest Session Video</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.storeLiveVideo') }}">
                @csrf

                {{-- English Embed --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        YouTube Embed Code (English) <span class="text-danger">*</span>
                    </label>
                    <textarea name="VideoEmbedCodeEnglish"
                              class="form-control"
                              rows="3"
                              placeholder="<iframe ...></iframe>"
                              required></textarea>
                </div>

                {{-- Hindi Embed --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        YouTube Embed Code (Hindi) <span class="text-danger">*</span>
                    </label>
                    <textarea name="VideoEmbedCodeHindi"
                              class="form-control"
                              rows="3"
                              placeholder="<iframe ...></iframe>"
                              required></textarea>
                </div>

                <div class="text-end">
                    <button class="btn btn-primary">Save Video</button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
