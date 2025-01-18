@extends(auth()->check() && auth()->user()->theme === 'theme2' ? 'layouts.app2' : 'layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="phone-container shadow-lg">
            <div class="phone-screen">
                <a href="{{ route('home') }}" class="btn btn-outline-dark mb-3">
                    <i class="bi bi-arrow-return-left me-1"></i>
                    @lang('messages.turn_back')
                </a>
                <h2 class="text-center">@lang('messages.search_results')</h2>

                <div class="contact-list">
                    <ul class="list-unstyled">
                        @if (count($contacts) > 0)
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
                        @else
                            <li class="contact-item">@lang('messages.no_results_were_found')</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
