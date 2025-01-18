@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">@lang('messages.edit_user_info')</h1>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="role" class="form-label">@lang('messages.user_role')</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="admin" {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role', $user->role) === 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="name" class="form-label">@lang('messages.user_name')</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">@lang('messages.user_email')</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="created_at" class="form-label">@lang('messages.created_at')</label>
                <input type="text" class="form-control" id="created_at" value="{{ $user->created_at }}" readonly>
            </div>

            <div class="mb-3">
                <label for="updated_at" class="form-label">@lang('messages.updated_at')</label>
                <input type="text" class="form-control" id="updated_at" value="{{ $user->updated_at }}" readonly>
            </div>

            <button type="submit" class="btn btn-success">@lang('messages.update')</button>
        </form>
    </div>
@endsection
