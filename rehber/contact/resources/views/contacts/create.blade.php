@extends(auth()->check() && auth()->user()->theme === 'theme2' ? 'layouts.app2' : 'layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="phone-container shadow-lg">
            <div class="phone-screen">
                <a href="{{ route('home') }}" class="btn btn-outline-dark mb-3">
                    <i class="bi bi-arrow-return-left me-1"></i>
                    @lang('messages.turn_back')
                </a>
                <h2>@lang('messages.add_contact')</h2>

                <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3 text-center">
                        <label for="photo" class="form-label">@lang('messages.ur_photo')</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo"
                            name="photo">
                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">@lang('messages.name')</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">@lang('messages.last_name')</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ old('last_name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">@lang('messages.phone_number')</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            value="{{ old('phone_number') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">@lang('messages.description')</label>
                        <input type="text" class="form-control" id="description" name="description"
                            value="{{ old('description') }}">
                    </div>

                    <button type="submit" class="btn btn-dark">@lang('messages.save')</button>
                </form>
            </div>
        </div>
    </div>
@endsection
