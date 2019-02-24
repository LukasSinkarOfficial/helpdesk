@extends('main')

@section('content')
    <div class="container chat">
        <ul style="list-style: none">
            @if ($messages->count() > 0)
                @foreach ($messages as $message)
                    <li class="left clearfix">
                        <div class="clearfix">
                            <div class="header">
                                <strong>
                                    {{ $message->isEmployee ? $employees[$message->author_id-1]->name : $users[$message->author_id-1]->name }}
                                </strong>
                                <small class="pull-right text-muted">{{ $message->created_at }}</small>
                            </div>
                            <p>{{ $message->body }}</p>
                        </div>
                    </li>
                @endforeach
            @endif

        </ul>
    </div>
    <footer class="footer-chat fixed-bottom">
        <div class="container">
            <form action="{{ route('message.store', ['id' => $id]) }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group row chat-input">
                    <input type="text" name="body" class="form-control col-10" autocomplete="off" placeholder="Message..">
                    <button class="btn btn-primary col-2" type="submit">Send</button>
                </div>
            </form>
        </div>
    </footer>
@endsection

{{-- @if ($messages->count() > 0)
    @foreach ($messages as $message)
        {{ $message->body }}
    @endforeach
@endif --}}