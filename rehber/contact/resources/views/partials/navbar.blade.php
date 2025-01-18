<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            @lang('messages.phone_contact')
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        @auth
            <h4 class="mb-0 ms-3">
                {{ auth()->user()->name }} @lang('messages.welcome')
            </h4>
        @endauth

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto d-flex align-items-center mb-2 mb-lg-0">

                @if (auth()->check() && auth()->user()->role === 'admin')
                    <li class="nav-item me-2">
                        <a class="btn btn-dark py-2" href="{{ route('admin.home') }}">
                            @lang('messages.admin_panel')
                        </a>
                    </li>
                @endif

                <li class="nav-item dropdown">
                    <button class="btn btn-dark dropdown-toggle me-2 py-2" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @lang('messages.language')
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('locale/tr') }}"> @lang('messages.turkish')</a></li>
                        <li><a class="dropdown-item" href="{{ url('locale/en') }}"> @lang('messages.english')</a></li>
                    </ul>
                </li>

                @auth
                    <div class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle ms-2 py-2" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            @lang('messages.change_theme')
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('switch.theme', 'theme1') }}" class="dropdown-item">
                                    @lang('messages.theme1')
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('switch.theme', 'theme2') }}" class="dropdown-item">
                                    @lang('messages.theme2')
                                </a>
                            </li>
                        </ul>
                    </div>
                    <li class="nav-item me-2">
                        <form class="bg-light" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-dark py-2">
                                @lang('messages.logout')
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
