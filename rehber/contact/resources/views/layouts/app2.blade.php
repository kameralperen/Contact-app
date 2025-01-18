<!DOCTYPE html>
<html lang="en">

<head>
    <title>@lang('messages.title')</title>
    @include('partials.head2')
</head>

<body>
    @include('partials.navbar2')

    <div class="container">
        @yield('content')
    </div>

   @include('partials.scripts2')
</body>

</html>
