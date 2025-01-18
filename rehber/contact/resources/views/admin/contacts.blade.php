@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4 text-center">@lang('messages.all_contacts')</h1>
        <div class="row">
            @foreach ($contacts as $contact)
                <div class="col-md-4 mb-4">
                        <div class="card h-100 d-flex flex-column">
                            <div class="card-header">
                                <h5 class="card-title text-center" style="font-size:x-large">{{ $contact->name }}</h5>
                            </div>
                            <div class="card-body flex-grow-1 d-flex flex-column">
                                <p class="card-text">@lang('messages.last_name'): {{ $contact->last_name }}</p>
                            </div>
                            <div class="card-body flex-grow-1 d-flex flex-column">
                                <p class="card-text">@lang('messages.phone_number'): {{ $contact->phone_number }}</p>
                            </div>
                            <div class="card-body flex-grow-1 d-flex flex-column">
                                <p class="card-text">@lang('messages.description'): {{ $contact->description }}</p>
                            </div>
                            <div class="card-footer mt-auto">
                                <small class="text-muted">@lang('messages.created_at'): {{$contact->created_at}}</small>
                                @if (auth()->check() && auth()->user()->role === 'admin')
                                    <div>
                                        <a href="{{route('contact.edit', $contact->id)}}" class="btn btn-secondary mt-2"
                                            onmouseover="this.classList.add('btn-warning')"
                                            onmouseout="this.classList.remove('btn-warning')">
                                            @lang('messages.edit')
                                        </a>

                                        <form action="{{route('contact.destroy', $contact->id)}}" method="POST"
                                            onsubmit="return confirm('@lang('messages.are_you_sure_you_want_to_delete_this_user')')"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-secondary mt-2"
                                                onmouseover="this.classList.add('btn-danger')"
                                                onmouseout="this.classList.remove('btn-danger')">@lang('messages.delete')</button>
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
