@extends('main')

@section('content')
    <div class="container">
        @if (session('alert'))
            <div class="alert alert-success">
                {{ session('alert') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if ($posts->count() > 0)
            <div class="responsive-table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Status</th>
                            <th scope="col">Category</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created</th>
                            <th scope="col">View</th>
                            <th scope="col">test</th>
                            <th scope="col">test</th>
                            <th scope="col">test</th>
                            <th scope="col">test</th>
                            <th scope="col">test</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->isClosed ? 'Closed' : 'Open' }}</td>
                                <td>{{ $post->category }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('post', ['id' => $post->id]) }}" class="btn btn-outline-primary btn-sm" role="button" aria-pressed="true">View</a>
                                        <a href="{{ route('messages', ['id' => $post->id]) }}" class="btn btn-outline-secondary btn-sm" role="button" aria-pressed="true">Messages</a>
                                    </div>  
                                </td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                                <td>test</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        @else 
            No posts
        @endif
    </div>
@endsection