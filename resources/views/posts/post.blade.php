@extends('main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h3 class="card-header">{{ $post->title }}
                        <div style="float: right">{{ $post->isClosed ? 'Closed' : 'Open' }}</div>
                    </h3>
                    <div class="card-body">
                        <h4 class="card-title" style="float: left">{{ $post->category }}</h4>
                        <small class="text-muted" style="float: right">{{ $post->created_at }}</small>
                        <p class="card-text" style="clear: both">{{ $post->body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- {{ $post->file }} --}}