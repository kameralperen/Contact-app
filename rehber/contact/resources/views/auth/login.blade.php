@extends(auth()->check() && auth()->user()->theme === 'theme2' ? 'layouts.app2' : 'layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="phone-container shadow-lg">
            <div class="phone-screen">
                @auth
                    <h2 class="d-flex justify-content-between align-items-center">
                        Kişiler
                        @auth
                            @if (auth()->user()->role === 'admin')
                                <!-- Admin rolü kontrolü -->
                                <a href="{{ route('contacts.create') }}" class="add-contact-btn ms-auto">+</a>
                            @endif
                        @endauth
                    </h2>
                    <!-- Giriş yaptıysanız kişileri göster -->
                    <input type="text" class="form-control mb-3" placeholder="Arama yap..." id="searchInput">
                    <div class="contact-list">
                        <ul class="list-unstyled">
                            @foreach ($contacts as $contact)
                                <li class="contact-item">
                                    <a href="{{ route('contacts.edit', $contact->id) }}">{{ $contact->name }}
                                        {{ $contact->last_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <!-- Eğer giriş yapılmamışsa, giriş formu gösterilecek -->
                    <form method="POST" action="{{ route('login') }}" class="p-4 bg-white border rounded-3 shadow-sm">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                                required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="form-control" type="password" name="password" required
                                autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="form-check mb-3">
                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                            <label for="remember_me"
                                class="form-check-label text-sm text-gray-600">{{ __('Remember me') }}</label>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            @if (Route::has('password.request'))
                                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <x-primary-button class="btn btn-dark">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- Kayıt ol butonu -->
                    <button class="btn-register mt-2 btn btn-dark" onclick="toggleRegisterForm()">Kayıt Ol</button>

                    <!-- Kayıt ol formu (başlangıçta gizli) -->
                    <div id="registerForm" style="display: none;" class="mt-2">
                        <form method="POST" action="{{ route('register') }}" class="p-4 bg-white border rounded-3 shadow-sm">
                            @csrf

                            <!-- Name -->
                            <div class="mb-3">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="form-control" type="text" name="name"
                                    :value="old('name')" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mb-3">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="form-control" type="email" name="email"
                                    :value="old('email')" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="form-control" type="password" name="password" required />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="mb-3">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                <x-text-input id="password_confirmation" class="form-control" type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <x-primary-button class="btn btn-dark">
                                    {{ __('Register') }}
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
