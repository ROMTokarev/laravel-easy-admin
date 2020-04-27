<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/easy-admin">
        <img src="{{ asset('raysirsharp/LaravelEasyAdmin/img/easy-admin.ico') }}" alt="Laravel Easy Admin">
        {{ env('EASY_ADMIN_APP_NAME', 'Laravel Easy Admin') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
            @if(count($nav_items) > 0)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-compass"></i> Navigation
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach($nav_items as $link => $nav_title)
                            <a class="dropdown-item" href="/easy-admin/{{ $link }}/index"><i class="fas fa-external-link-alt"></i> {{ $nav_title }}</a>
                        @endforeach
                    </div>
                </li>
            @endif
            <li class="nav-item">
                <div class="nav-link">
                    <small><i class="fas fa-user"></i> rya88cla@hotmail.com</small>
                </div>
            </li>
            <li class="nav-item">
                <form action="/easy-admin/logout" method="post">
                    <button type="button" class="btn btn-link px-0">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>
<div class="w-100 text-white p-3" style="background-color: rgb(230,231,231)!important;">
    <div class="row">
        <div class="col-md-6">
            <span class="text-secondary">
                ADMIN /
                @if(Request::is('easy-admin/*/index*'))
                    <a href="/easy-admin">HOME</a>
                @elseif(Request::is('easy-admin/*/create*'))
                    <a href="/easy-admin">HOME</a> / <a href="/easy-admin/{{ $url_model }}/index">{{ strtoupper($model) }} - INDEX</a>
                @elseif(Request::is('easy-admin/*/*/edit'))
                    <a href="/easy-admin">HOME</a> / <a href="/easy-admin/{{ $url_model }}/index">{{ strtoupper($model) }} - INDEX</a>
                @endif
            </span>
            <h1 class="text-dark">
                @if(isset($model))
                    {{ $model }}
                @else
                    {{ $title }}
                @endif
            </h1>
        </div>
        @if(Request::is('easy-admin/*/index*') and in_array('create', $allowed))
            <div class="col-md-6 text-right mt-auto">
                <a href="/easy-admin/{{$url_model}}/create" class="btn btn-primary" role="button" aria-pressed="true">
                    <i class="fas fa-folder-plus"></i> Create {{ $model }}
                </a>
            </div>
        @endif
    </div>
</div>
@include('easy-admin::partials.messages')