<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 sticky-top">
    <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
        aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @if (Auth::guard('web')->check())
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('posts/create') ? 'active' : '' }}" href="{{ route('post.create') }}">Create Post</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('posts/my') ? 'active' : '' }}" href="{{ route('user.posts') }}">My Posts</a>
                </li>
            @elseif (Auth::guard('employee')->check()) 
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('posts') ? 'active' : '' }}" href="{{ route('posts') }}">Posts</a>
                </li>
            @endif
        </ul>
        <ul class="navbar-nav ml-auto">
            @if (Auth::guard('web')->check() || Auth::guard('employee')->check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @if (Auth::guard('employee')->check())
                            {{ Auth::Guard('employee')->user()->name }}
                        @else
                            {{ Auth::user()->name }}
                        @endif  
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/logout" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('employee.login.form') }}">Employee Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            @endif
        </ul>
    </div>
</nav>