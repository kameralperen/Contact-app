@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">@lang('messages.edit_contact_user')</h1>

        <form action="{{ route('contact.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">@lang('messages.contact_name')</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $contact->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">@lang('messages.contact_last_name')</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                    value="{{ old('last_name', $contact->last_name) }}" required>
            </div>

            <div class="mb-3">
                <label for="phone_number" class="form-label">@lang('messages.phone_number')</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number"
                    value="{{ old('phone_number', $contact->phone_number) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">@lang('messages.description')</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ old('description', $contact->description) }}" required>
            </div>

            <div class="mb-3">
                <label for="created_at" class="form-label">@lang('messages.created_at')</label>
                <input type="text" class="form-control" id="created_at" value="{{ $contact->created_at }}" readonly>
            </div>

            <div class="mb-3">
                <label for="updated_at" class="form-label">@lang('messages.updated_at')</label>
                <input type="text" class="form-control" id="updated_at" value="{{ $contact->updated_at }}" readonly>
            </div>

            <button type="submit" class="btn btn-success">@lang('messages.update')</button>
        </form>
    </div>
@endsection
