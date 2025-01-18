@extends(auth()->check() && auth()->user()->theme === 'theme2' ? 'layouts.app2' : 'layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="phone-container shadow-lg">
            <div class="phone-screen">
                @auth
                    <h2 class="d-flex justify-content-between align-items-center">
                        @lang('messages.contacts')
                        @auth
                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('contacts.create') }}" class="add-contact-btn ms-auto">+</a>
                            @endif
                        @endauth
                    </h2>
                    <form action="{{ route('search') }}" method="GET" class="d-flex">
                        <input type="text" name="query" class="form-control" placeholder="@lang('messages.search_placeholder')"
                            value="{{ request()->query('query') }}">
                        <button type="submit" class="btn btn-dark ms-2">@lang('messages.search')</button>
                    </form>

                    <div class="contact-list">
                        <ul class="list-unstyled px-2">
                            @foreach ($contacts as $contact)
                                <li class="contact-item">
                                    @if (auth()->user()->role === 'admin')
                                        <a href="{{ route('contacts.edit', $contact->id) }}"
                                            style="text-decoration: none; color:black;" class="px-3">
                                            {{ $contact->name }} {{ $contact->last_name }}
                                        </a>
                                    @else
                                        <a href="{{ route('contacts.show', $contact->id) }}"
                                            style="text-decoration: none; color:black;" class="px-3">
                                            {{ $contact->name }} {{ $contact->last_name }}
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <form method="POST" action="{{ route('login') }}" class="p-4 bg-white border rounded-3 shadow-sm">
                        @csrf

                        <div class="mb-3">
                            <x-input-label for="email" :value="__('messages.email')" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                                required autofocus autocomplete="username" />
                        </div>

                        <div class="mb-3">
                            <x-input-label for="password" :value="__('messages.password')" />
                            <x-text-input id="password" class="form-control" type="password" name="password" required
                                autocomplete="current-password" />
                        </div>

                        <div class="form-check mb-3">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label for="remember_me"
                                class="form-check-label text-sm text-gray-600">{{ __('messages.remember_me') }}</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('messages.forgot_password') }}
                                </a>
                            @endif

                            <x-primary-button class="btn btn-dark">
                                {{ __('messages.login') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <button class="btn-register mt-2 btn btn-dark" onclick="toggleRegisterForm()">@lang('messages.register')</button>

                    <div id="registerForm" style="display: none;" class="mt-2">
                        <form method="POST" action="{{ route('register') }}" class="p-4 bg-white border rounded-3 shadow-sm">
                            @csrf

                            <div class="mb-3">
                                <x-input-label for="name" :value="__('messages.name_label')" />
                                <x-text-input id="name" class="form-control" type="text" name="name"
                                    :value="old('name')" required />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="email" :value="__('messages.email')" />
                                <x-text-input id="email" class="form-control" type="email" name="email"
                                    :value="old('email')" required />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="password" :value="__('messages.password')" />
                                <x-text-input id="password" class="form-control" type="password" name="password" required />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="password_confirmation" :value="__('messages.confirm_password')" />
                                <x-text-input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <x-primary-button class="btn btn-dark">
                                    {{ __('messages.register_button') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>

                    <script>
                        function toggleRegisterForm() {
                            const form = document.getElementById('registerForm');
                            form.style.display = form.style.display === 'none' ? 'block' : 'none';
                        }
                    </script>
                @endauth
            </div>
        </div>
    </div>
@endsection
