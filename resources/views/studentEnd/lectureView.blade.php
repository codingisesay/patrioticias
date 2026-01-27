@extends('studentEnd.studentLayout')

@section('content')

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#video">
            VIDEO
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#handout">
            HANDOUTS / NOTES
        </a>
    </li>
</ul>

<div class="tab-content mt-3">

<div class="tab-pane fade show active" id="video">
    {!! $lecture->VideoEmbedCode !!}
</div>

<div class="tab-pane fade" id="handout">
    @forelse($handouts as $h)
        <div class="card mb-2">
            <div class="card-body">
                {!! $h->Content !!}
            </div>
        </div>
    @empty
        <p>No handouts available.</p>
    @endforelse
</div>

</div>
@endsection
