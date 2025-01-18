@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">@lang('messages.users_on_site')</h1>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 d-flex flex-column">
                        <div class="card-header">
                            <h5 class="card-title text-center" style="font-size:x-large">{{ $user->name }}</h5>
                        </div>
                        <div class="card-body flex-grow-1 d-flex flex-column">
                            <p class="card-text">@lang('messages.user_email'): {{ $user->email }}</p>
                        </div>
                        <div class="card-body flex-grow-1 d-flex flex-column">
                            <p class="card-text">@lang('messages.user_role'): {{ $user->role }}</p>
                        </div>
                        <div class="card-footer mt-auto">
                            <small class="text-muted">@lang('messages.created_at'): {{ $user->created_at }}</small>
                            @if (auth()->check() && auth()->user()->role === 'admin')
                                <div>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-secondary mt-2"
                                        onmouseover="this.classList.add('btn-warning')"
                                        onmouseout="this.classList.remove('btn-warning')">
                                        @lang('messages.edit')
                                    </a>


                                    @if ($user->name !== 'Admin')
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('@lang('messages.are_you_sure_you_want_to_delete_this_user')')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-secondary mt-2"
                                                onmouseover="this.classList.add('btn-danger')"
                                                onmouseout="this.classList.remove('btn-danger')">
                                                @lang('messages.delete')
                                            </button>
                                        </form>
                                    @endif
                            @endif

                            @if (auth()->check() && auth()->user()->name == 'Admin')
                                <form action="{{ route('admin.makeAdmin', $user->id) }}" method="POST"
                                    onsubmit="return confirm('@lang('messages.are_you_sure_you_want_to_make_an_admin_this_user')')" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-secondary mt-2"
                                        onmouseover="this.classList.add('btn-success')"
                                        onmouseout="this.classList.remove('btn-success')">@lang('messages.make_admin')</button>
                                </form>
                            @endif

                        </div>

                    </div>
                </div>
                </a>
        </div>
        @endforeach
    </div>
@endsection
