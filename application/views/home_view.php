<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FinTrack - Smart Financial Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
        }

        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Navbar Styles */
        .navbar {
            padding: 1rem 0;
            transition: all 0.3s ease;
            background: transparent;
        }

        .navbar.scrolled {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white;
            transition: all 0.3s ease;
        }

        .navbar.scrolled .navbar-brand {
            color: var(--primary-color);
        }

        .nav-link {
            color: white !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
            position: relative;
        }

        .navbar.scrolled .nav-link {
            color: var(--primary-color) !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: white;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar.scrolled .nav-link::after {
            background-color: var(--primary-color);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            background-image: none;
            position: relative;
            width: 24px;
            height: 2px;
            background-color: white;
            transition: all 0.3s ease;
        }

        .navbar.scrolled .navbar-toggler-icon {
            background-color: var(--primary-color);
        }

        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background-color: inherit;
            transition: all 0.3s ease;
        }

        .navbar-toggler-icon::before {
            transform: translateY(-8px);
        }

        .navbar-toggler-icon::after {
            transform: translateY(8px);
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
            background-color: transparent;
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon::before {
            transform: rotate(45deg);
        }

        .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon::after {
            transform: rotate(-45deg);
        }

        .nav-button {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid white;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .nav-button:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .navbar.scrolled .nav-button {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white !important;
        }

        .navbar.scrolled .nav-button:hover {
            background: var(--secondary-color);
            border-color: var(--secondary-color);
            color: white !important;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 120px 0 80px;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><rect width="1" height="1" fill="rgba(255,255,255,0.1)"/></svg>');
            opacity: 0.1;
        }

        .hero-image {
            max-width: 100%;
            height: auto;
            animation: float 6s ease-in-out infinite;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.1));
            transform-origin: center;
        }

        @keyframes float {
            0% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(2deg);
            }

            100% {
                transform: translateY(0px) rotate(0deg);
            }
        }

        /* Features Section */
        .feature-card {
            border: none;
            border-radius: 20px;
            transition: all 0.3s ease;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Stats Section */
        .stats-section {
            background: white;
            padding: 80px 0;
        }

        .stat-card {
            text-align: center;
            padding: 30px;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        /* Testimonials Section */
        .testimonial-section {
            background: #f8fafc;
            padding: 100px 0;
        }

        .testimonial-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            margin: 20px 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .testimonial-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            padding: 100px 0;
            position: relative;
        }

        /* Footer */
        .footer {
            background: #1e293b;
            color: white;
            padding: 60px 0 30px;
            position: relative;
            width: 100%;
            margin-top: 0;
            min-height: 300px;
            /* Ensure minimum height */
        }

        .footer-link {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-link:hover {
            color: white;
        }

        /* Responsive Styles */
        @media (max-width: 991.98px) {
            .hero-section {
                padding: 100px 0 60px;
                text-align: center;
            }

            .hero-image {
                margin-top: 40px;
                max-width: 80%;
            }

            .navbar-collapse {
                background: white;
                padding: 1rem;
                border-radius: 10px;
                margin-top: 1rem;
            }

            .navbar-collapse .nav-link {
                color: var(--primary-color) !important;
            }

            .navbar-collapse .nav-link::after {
                background-color: var(--primary-color);
            }

            .navbar-collapse .nav-button {
                background: var(--primary-color);
                border-color: var(--primary-color);
                color: white !important;
                margin: 0.5rem 0;
            }

            .feature-card {
                margin-bottom: 30px;
            }

            .testimonial-card {
                margin: 10px 0;
            }

            .footer {
                padding: 40px 0 20px;
            }

            .footer .col-sm-3 {
                padding-left: 15px;
                padding-right: 15px;
            }

            .footer h6 {
                font-size: 1rem;
            }

            .footer-link {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 767.98px) {
            .hero-section {
                padding: 80px 0 40px;
            }

            .display-4 {
                font-size: 2.5rem;
            }

            .lead {
                font-size: 1.1rem;
            }

            .stat-number {
                font-size: 2rem;
            }

            .feature-icon {
                font-size: 2rem;
            }

            .testimonial-section {
                padding: 60px 0;
            }

            .cta-section {
                padding: 60px 0;
            }

            .footer {
                padding: 40px 0 20px;
            }

            .footer .col-6 {
                padding-left: 15px;
                padding-right: 15px;
            }
        }

        @media (max-width: 575.98px) {
            .hero-section {
                padding: 60px 0 30px;
            }

            .display-4 {
                font-size: 2rem;
            }

            .btn-lg {
                padding: 0.5rem 1.5rem;
                font-size: 1rem;
            }

            .hero-image {
                max-width: 100%;
            }

            .stat-card {
                padding: 20px;
            }

            .testimonial-card {
                padding: 20px;
            }

            .footer {
                padding: 30px 0 15px;
            }

            .footer .col-6 {
                padding-left: 10px;
                padding-right: 10px;
            }
        }

        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Add padding to sections to account for fixed navbar */
        section {
            scroll-margin-top: 80px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">FinTrack</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#stats">Statistics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cta">Get Started</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link nav-button" href="<?= base_url('auth/login') ?>">Login</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <a class="nav-link nav-button" href="<?= base_url('auth/register') ?>">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="display-4 fw-bold mb-4">Smart Financial Management for Your Future</h1>
                    <p class="lead mb-4">Take control of your finances with our intelligent expense tracking, budgeting,
                        and financial planning tools. Start your journey to financial freedom today.</p>
                    <div class="d-flex gap-3 justify-content-lg-start justify-content-center">
                        <a href="<?= base_url('auth/login') ?>" class="btn btn-light btn-lg">Get Started</a>
                        <a href="<?= base_url('auth/register') ?>" class="btn btn-outline-light btn-lg">Sign Up Free</a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/personal-finance-3678634-3098746.png"
                        alt="Personal Finance Illustration" class="hero-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section id="stats" class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-card">
                        <div class="stat-number">10K+</div>
                        <p class="text-muted">Active Users</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-card">
                        <div class="stat-number">$2M+</div>
                        <p class="text-muted">Transactions Tracked</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-card">
                        <div class="stat-number">98%</div>
                        <p class="text-muted">User Satisfaction</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Powerful Features for Smart Finance</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card feature-card h-100 p-4">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line feature-icon"></i>
                            <h3 class="h5 mb-3">Smart Expense Tracking</h3>
                            <p class="text-muted">Automatically categorize and track your expenses with AI-powered
                                insights and real-time updates.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card feature-card h-100 p-4">
                        <div class="card-body text-center">
                            <i class="fas fa-wallet feature-icon"></i>
                            <h3 class="h5 mb-3">Intelligent Budgeting</h3>
                            <p class="text-muted">Create personalized budgets with smart recommendations and automated
                                savings goals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card feature-card h-100 p-4">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-pie feature-icon"></i>
                            <h3 class="h5 mb-3">Advanced Analytics</h3>
                            <p class="text-muted">Get detailed insights and visualizations to understand your spending
                                patterns and optimize your finances.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonial-section">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">What Our Users Say</h2>
            <div class="row">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card">
                        <img src="https://randomuser.me/api/portraits/women/1.jpg" alt="User"
                            class="testimonial-avatar">
                        <h4 class="h5 mb-3">Sarah Johnson</h4>
                        <p class="text-muted">"This app has completely transformed how I manage my finances. The
                            insights are incredibly helpful!"</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card">
                        <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="User" class="testimonial-avatar">
                        <h4 class="h5 mb-3">Michael Chen</h4>
                        <p class="text-muted">"The budgeting features are amazing. I've saved more money in the last
                            month than I ever thought possible."</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card">
                        <img src="https://randomuser.me/api/portraits/women/2.jpg" alt="User"
                            class="testimonial-avatar">
                        <h4 class="h5 mb-3">Emily Rodriguez</h4>
                        <p class="text-muted">"The interface is so intuitive and the reports are exactly what I needed
                            to get my finances in order."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="cta" class="cta-section">
        <div class="container text-center">
            <h2 class="mb-4" data-aos="fade-up">Ready to Transform Your Financial Future?</h2>
            <p class="lead mb-4" data-aos="fade-up" data-aos-delay="100">Join thousands of users who are already
                managing their finances effectively.</p>
            <a href="<?= base_url('auth/register') ?>" class="btn btn-primary btn-lg px-5" data-aos="fade-up"
                data-aos-delay="200">Start Your Free Trial</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <h5 class="mb-3">FinTrack</h5>
                    <p class="text-muted">Smart financial management for everyone. Take control of your finances today.
                    </p>
                </div>
                <div class="col-6 col-sm-3 col-md-2 mb-4">
                    <h6 class="mb-3">Product</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">Features</a></li>
                        <li><a href="#" class="footer-link">Pricing</a></li>
                        <li><a href="#" class="footer-link">Security</a></li>
                    </ul>
                </div>
                <div class="col-6 col-sm-3 col-md-2 mb-4">
                    <h6 class="mb-3">Company</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">About</a></li>
                        <li><a href="#" class="footer-link">Blog</a></li>
                        <li><a href="#" class="footer-link">Careers</a></li>
                    </ul>
                </div>
                <div class="col-6 col-sm-3 col-md-2 mb-4">
                    <h6 class="mb-3">Support</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="footer-link">Help Center</a></li>
                        <li><a href="#" class="footer-link">Contact</a></li>
                        <li><a href="#" class="footer-link">Privacy</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="text-center">
                <p class="mb-0">&copy; <?= date('Y') ?> FinTrack. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function () {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Close mobile menu when clicking on a nav link
        document.querySelectorAll('.navbar-nav .nav-link').forEach(link => {
            link.addEventListener('click', () => {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                }
            });
        });
    </script>
</body>

</html>