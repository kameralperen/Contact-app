@extends(auth()->check() && auth()->user()->theme === 'theme2' ? 'layouts.app2' : 'layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="phone-container shadow-lg">
            <div class="phone-screen">
                <a href="{{ route('home') }}" class="btn btn-outline-dark mb-3">
                    <i class="bi bi-arrow-return-left me-1"></i>
                    @lang('messages.turn_back')
                </a>
                <h2>@lang('messages.contact_details')</h2>

                <div class="card-body">
                    <div class="mb-3 text-center">
                        @if ($contact->photo)
                            <img src="{{ asset('uploads/photos/' . $contact->photo) }}" alt="@lang('messages.user_photo')"
                                class="img-thumbnail mb-2" width="150">
                        @endif
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>@lang('messages.name'):</strong> {{ $contact->name }}
                        </li>
                        <li class="list-group-item">
                            <strong>@lang('messages.last_name'):</strong> {{ $contact->last_name }}
                        </li>
                        <li class="list-group-item">
                            <strong>@lang('messages.phone_number'):</strong> {{ $contact->phone_number }}
                        </li>
                        <li class="list-group-item">
                            <strong>@lang('messages.description'):</strong> {{ $contact->description }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endsection
