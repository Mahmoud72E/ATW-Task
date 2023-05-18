<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        /* Add your custom styles here */

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">{{ trans('dashboard.dashboard') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('profile.edit')}}">{{ trans('dashboard.profile') }}</a>
                </li>
                <li class="nav-item">
                    <div class="btn-group mb-1">
                        <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          @if (App::getLocale() == 'ar')
                          {{ LaravelLocalization::getCurrentLocaleName() }}
                          @else
                          {{ LaravelLocalization::getCurrentLocaleName() }}
                          @endif
                          </button>
                        <div class="dropdown-menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                            @endforeach
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    {{-- <a class="nav-link" href="#">Logout</a> --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ trans('dashboard.logout') }}</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group" id="menu-list">
                    {{-- <a href="#" class="list-group-item list-group-item-action active">Dashboard</a> --}}
                    <a href="#" class="list-group-item list-group-item-action active" onclick="showContent('dashboard-content')">{{ trans('dashboard.dashboard') }}</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="showContent('companies-content')">{{ trans('dashboard.companies') }}</a>
                    <a href="#" class="list-group-item list-group-item-action" onclick="showContent('employees-content')">{{ trans('dashboard.employees') }}</a>
                </div>
            </div>
            <div class="col-md-9">
                <div id="dashboard-content" class="content-section">
                    <div class="card">
                        <div class="card-header">
                            Dashboard
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ trans('dashboard.welcome') }}{{ trans('dashboard.dashboard') }}!</h5>
                            <p class="card-text">{{ trans('dashboard.desc_dashboard') }}</p>
                        </div>
                    </div>
                </div>

                <div id="companies-content" class="content-section" style="display: none;">
                    <div class="card">
                        <div class="card-header">
                            {{ trans('dashboard.companies') }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ trans('dashboard.welcome') }}{{ trans('dashboard.companies') }}!</h5>
                            <p class="card-text">To Show All Companies <a href="{{route('companies.index')}}">click here</a>.
                                <br> To Create New Company <a href="{{route('companies.create')}}">click here</a>. <br>
                            </p>
                        </div>
                    </div>
                </div>

                <div id="employees-content" class="content-section" style="display: none;">
                    <div class="card">
                        <div class="card-header">
                            {{ trans('dashboard.employees') }}
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ trans('dashboard.welcome') }}{{ trans('dashboard.employees') }}!</h5>
                            <p class="card-text">To Show All Employees <a href="{{route('employees.index')}}">click here</a>.
                                <br> To Create New Employe <a href="{{route('employees.create')}}">click here</a>. <br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>

    <script>
        function showContent(contentId) {
            $('.content-section').hide();
            $('#' + contentId).show();
        }
        // Add active class to the clicked list group item
        $(document).ready(function() {
            $('#menu-list a').on('click', function() {
                $('#menu-list a').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
</body>
</html>

