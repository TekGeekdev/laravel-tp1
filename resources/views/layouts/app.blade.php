<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP01 - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/public/assets/css/nav.css">


</head>
<body>
    <div class="container-fluid">
        <div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Langue
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('lang', 'en') }}">English</a></li>
                        <li><a class="dropdown-item" href="{{ route('lang', 'fr') }}">Français</a></li>
                    </ul>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('student.index') }}">
                            <i class="bi bi-house-door me-2"></i>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('student.create') }}">
                            <i class="bi bi-people me-2"></i>
                            New student
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">@yield('dashboardPage')</h1>
                <button id="sidebarToggle" class="btn btn-primary d-md-none">
                        <i class="bi bi-list"></i> Toggle Sidebar
                    </button>
            </div>
            @if(session('success'))
    <div class="mt-4 alert alert-info alert-dismissible fade show" role="alert">
        <strong> {{ session('success')}} </strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
            @yield('content')
        </main>
    </div>
</div>
    </div>

    <footer>

    </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">

<script>
    document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const body = document.body;

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('sidebar-hidden');
            });

            // Close sidebar when clicking outside on mobile
            body.addEventListener('click', function(event) {
                if (window.innerWidth <= 767.98 && !sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
                    sidebar.classList.add('sidebar-hidden');
                }
            });

            // Update sidebar visibility on window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 767.98) {
                    sidebar.classList.remove('sidebar-hidden');
                }
            });

            // Highlight active nav item
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
</script>
</html>