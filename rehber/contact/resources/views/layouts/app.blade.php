<!DOCTYPE html>
<html lang="en">

<head>
    <title>@lang('messages.title')</title>
    @include('partials.head')
</head>

<body>
    @include('partials.navbar')

    <div class="container">
        @yield('content')
    </div>

   @include('partials.scripts')
</body>

</html>
