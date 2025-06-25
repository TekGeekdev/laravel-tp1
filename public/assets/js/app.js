document.addEventListener('DOMContentLoaded', function() {
    // Éléments du DOM
    const sidebar = document.getElementById('dashboardSidebar');
    const mobileToggle = document.getElementById('mobileMenuToggle');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const navLinks = document.querySelectorAll('.nav-link');
    const body = document.body;

    // Configuration
    const MOBILE_BREAKPOINT = 768;
    
    // État du menu mobile
    let isMobileMenuOpen = false;

    // Initialisation
    init();

    function init() {
        setupMobileMenu();
        setupNavigation();
        