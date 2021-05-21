<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="">{{ $namePage }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
                <div class="input-group no-border">
                    <input name="search" type="text" value="" class="form-control" placeholder="Search...">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="now-ui-icons ui-1_zoom-bold"></i>
                        </div>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" target="__blank" href="{{ route('web.index') }}">
                        <i class="now-ui-icons business_globe"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Web') }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="now-ui-icons media-2_sound-wave"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Stats') }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="now-ui-icons ui-1_bell-53"></i>

                        @if (empty($messages))

                        @elseif(!empty(($messages)))
                            <span class="badge" style="background-color: #FF3636; width:20px; height:20px;">
                                <p style="color:white; font-size:9px;font-weight: bold;">
                                    {{ count($messages) }}
                                </p>
                            </span>
                        @endif
                        </p>
                        </span>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('messages.Notifications') }}</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"
                        style="min-width:300px; max-width:300px;">
                        <div class="card-title" style="margin-left: 15px; margin-top: 2.5px; margin-bottom: -5px">
                            {{ __('messages.Notifications') }}
                            <a class="btn btn-info  btn-sm " style="margin-left:22px; font-size:10px;margin-top: 8px"
                                href="{{ route('messages.index') }}">{{ __('messages.All Notifications') }}</a>
                        </div>
                        @foreach ($messages as $message)
                            <hr>
                            <div style=" margin-left:15px; ">
                                <a href="" style="color: black;font-size:12px;">{{ $message->message }}
                                </a>
                            </div>
                            <br>
                            <a class="dropdown-item" href=""
                                style="margin-top: -8.5px">{{ __($message->user->first_name) }}
                                {{ __($message->user->last_name) }}</a>
                            <a class="dropdown-item" href=""
                                style="margin-top: -8.5px">{{ __($message->user->phone) }}&nbsp;|&nbsp;{{ __($message->user->email) }}
                            </a>
                            <a class="dropdown-item" href=""
                                style="margin-top: -8.5px">{{ __($message->created_at->diffForHumans()) }}</a>
                            <a class="btn btn-warning  btn-sm "
                                style="margin-left:22px; font-size:10px;margin-top: -4px"
                                href="{{ route('messages.update2', $message->id) }}">{{ __('messages.Mark as read') }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="now-ui-icons location_world"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('messages.Language') }}</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('set_language', 'es') }}"><img
                                style="width: 40px;  height:28px; "
                                src="https://res.cloudinary.com/alemelgarejo/image/upload/v1621524586/idiomas/espanita_wvcutz.png"
                                alt="espanita">&nbsp;&nbsp;&nbsp;&nbsp;{{ __('messages.Español') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('set_language', 'en') }}"><img
                                style="width: 40px; height:28px; "
                                src="https://res.cloudinary.com/alemelgarejo/image/upload/v1621524589/idiomas/reinounido_wokjfz.png"
                                alt="reinounido">&nbsp;&nbsp;&nbsp;&nbsp;{{ __('messages.Inglés') }}</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="now-ui-icons users_single-02"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('messages.Account') }}</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item"
                            href="{{ route('profile.edit') }}">{{ __('messages.My profile') }}</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
