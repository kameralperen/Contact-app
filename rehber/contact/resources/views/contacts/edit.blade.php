@extends(auth()->check() && auth()->user()->theme === 'theme2' ? 'layouts.app2' : 'layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="phone-container shadow-lg">
            <div class="phone-screen">
                <a href="{{ route('home') }}" class="btn btn-outline-dark mb-3">
                    <i class="bi bi-arrow-return-left me-1"></i>
                    @lang('messages.turn_back')
                </a>
                <h2>@lang('messages.edit_contact')</h2>

                <form action="{{ route('contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 text-center">
                        @if ($contact->photo)
                            <img src="{{ asset('uploads/photos/' . $contact->photo) }}" alt="@lang('messages.user_photo')"
                                class="img-thumbnail mb-2" width="150">
                            <br>
                        @endif

                        <label for="photo" class="form-label">@lang('messages.change_photo')</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">@lang('messages.name')</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $contact->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">@lang('messages.last_name')</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="{{ $contact->last_name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">@lang('messages.phone_number')</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            value="{{ $contact->phone_number }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">@lang('messages.description')</label>
                        <input type="text" class="form-control" id="description" name="description"
                            value="{{ $contact->description }}">
                    </div>

                    <button type="submit" class="btn btn-dark">@lang('messages.save')</button>
                </form>

                <form action="{{ route('contacts.delete', $contact->id) }}" method="POST" style="display:inline;"
                    onsubmit="return confirmDelete()">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">@lang('messages.delete')</button>
                </form>

                <script>
                    function confirmDelete() {
                        return confirm("@lang('messages.are_you_sure_you_want_to_delete_this_person')");
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
