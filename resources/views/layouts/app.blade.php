<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('lang.menu_title') - @yield('title', 'Dashboard')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    
    @stack('styles')
</head>
<body>
    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobileOverlay"></div>
    
    <!-- Dashboard Wrapper -->
    <div class="dashboard-wrapper">
        <!-- Sidebar -->
        <aside class="dashboard-sidebar" id="dashboardSidebar">
            <!-- Brand -->
            <a href="{{ route('post.index') }}" class="sidebar-brand">
                <div class="brand-icon">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>
                <div class="brand-text">
                    <h4>@lang('lang.menu_title')</h4>
                    <small>@lang('lang.menu_subtitle')</small>
                </div>
            </a>
            
            <!-- Language Selector -->
            <div class="language-dropdown">
                <div class="dropdown">
                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-globe me-2"></i>
                        @lang('lang.language')
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('lang', 'fr') }}">
                                <i class="bi bi-flag-fill me-2"></i>
                                @lang('lang.french')
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('lang', 'en') }}">
                                <i class="bi bi-flag me-2"></i>
                                @lang('lang.english')
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Navigation -->
            <nav class="sidebar-nav">
                @auth
                <!-- Section Principale -->
                <div class="nav-section">
                    <div class="nav-section-title">@lang('lang.menu_main_nav')</div>
                    <div class="nav-item">
                        <a href="{{ route('post.index') }}" class="nav-link {{ request()->routeIs('post.index') ? 'active' : '' }}">
                            <i class="bi bi-house-door-fill"></i>
                            @lang('lang.home')
                        </a>
                    </div>
                </div>
                
                <!-- Section Étudiants -->
                <div class="nav-section">
                    <div class="nav-section-title">@lang('lang.menu_manage_students')</div>
                    <div class="nav-item">
                        <a href="{{ route('student.create') }}" class="nav-link {{ request()->routeIs('student.create') ? 'active' : '' }}">
                            <i class="bi bi-person-plus-fill"></i>
                            @lang('lang.new_student')
                        </a>
                    </div>
                    <div class="nav-item">
                        <a href="{{ route('student.index') }}" class="nav-link {{ request()->routeIs('student.index') || request()->routeIs('student.show') ? 'active' : '' }}">
                            <i class="bi bi-people-fill"></i>
                            @lang('lang.list_students')
                        </a>
                    </div>
                </div>
                
                <!-- Section Publications -->
                <div class="nav-section">
                    <div class="nav-section-title">@lang('lang.menu_manage_posts')</div>
                    <div class="nav-item">
                        <a href="{{ route('post.create') }}" class="nav-link {{ request()->routeIs('post.create') ? 'active' : '' }}">
                            <i class="bi bi-journal-plus"></i>
                            @lang('lang.page__name_create_post')
                        </a>
                    </div>
                    
                    <!-- <div class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-journal-text"></i>
                            Mes Publications
                        </a>
                    </div> -->
                </div>
                @endauth
                
                <!-- Section Administration -->
                <div class="nav-section">
                    <div class="nav-section-title">Administration</div>
                    <div class="nav-item">
                        <a href="{{ route('user.create') }}" class="nav-link {{ request()->routeIs('user.create') ? 'active' : '' }}">
                            <i class="bi bi-person-gear"></i>
                            @lang('lang.new_user')
                        </a>
                    </div>
                </div>
                
                <!-- Section Compte -->
                <div class="nav-section">
                    <div class="nav-section-title">@lang('lang.menu_account')</div>
                    @guest
                    <div class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            @lang('lang.login')
                        </a>
                    </div>
                    @else
                    <div class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">
                            <i class="bi bi-box-arrow-right"></i>
                            @lang('lang.logout')
                        </a>
                    </div>
                    @endauth
                </div>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="dashboard-main">
            <!-- Header -->
            <header class="dashboard-header">
                <div class="header-title">
                    <h1>@yield('dashboardPage', 'Dashboard')</h1>
                    <span class="header-subtitle">@yield('dashboardSubtitle')Bienvenue {{ Auth::user() ? Auth::user()->name : '' }}</span>
                </div>  
            </header>
            
            <!-- Content Area -->
            <div class="dashboard-content">
                <!-- Success Messages -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show slide-in-right" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-3" style="font-size: 1.25rem;"></i>
                        <div>
                            <strong>Succès !</strong>
                            {{ session('success') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                <!-- Error Messages -->
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show slide-in-right" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle-fill me-3" style="font-size: 1.25rem;"></i>
                        <div>
                            <strong>Erreur !</strong>
                            {{ session('error') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                <!-- Warning Messages -->
                @if(session('warning'))
                <div class="alert alert-warning alert-dismissible fade show slide-in-right" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-exclamation-circle-fill me-3" style="font-size: 1.25rem;"></i>
                        <div>
                            <strong>Attention !</strong>
                            {{ session('warning') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                <!-- Info Messages -->
                @if(session('info'))
                <div class="alert alert-info alert-dismissible fade show slide-in-right" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-info-circle-fill me-3" style="font-size: 1.25rem;"></i>
                        <div>
                            <strong>Information !</strong>
                            {{ session('info') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                <!-- Main Content -->
                <div class="fade-in-up">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
    
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- Custom JavaScript -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    
    @stack('scripts')
</body>
</html>