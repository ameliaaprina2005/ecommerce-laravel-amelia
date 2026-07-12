<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title', 'Admin Dashboard')</title>

    <link rel="stylesheet" href="{{ asset('assets/templates/admin/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/admin/css/components.css') }}">
</head>

<body>
    @include('sweetalert::alert')

    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('layouts.admin.navbar')
            @include('layouts.admin.sidebar')

            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>

            @include('layouts.admin.footer')

        </div>
    </div>

    @include('layouts.admin.script')

</body>

</html>