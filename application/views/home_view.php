<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            color: white;
            padding: 100px 0;
        }

        .feature-card {
            border: none;
            border-radius: 15px;
            transition: transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #1e3c72;
        }

        .cta-section {
            background-color: #f8f9fa;
            padding: 80px 0;
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Take Control of Your Finances</h1>
                    <p class="lead mb-4">Manage your expenses, track your budget, and achieve your financial goals with
                        our comprehensive financial management system.</p>
                    <a href="<?= base_url('auth/login') ?>" class="btn btn-light btn-lg px-4 me-2">Get Started</a>
                    <a href="<?= base_url('auth/register') ?>" class="btn btn-outline-light btn-lg px-4">Sign Up</a>
                </div>
                <div class="col-lg-6">
                    <img src="https://cdn-icons-png.flaticon.com/512/2382/2382469.png" alt="Financial Management"
                        class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Key Features</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card h-100 p-4">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line feature-icon"></i>
                            <h3 class="h5 mb-3">Expense Tracking</h3>
                            <p class="text-muted">Monitor your daily expenses and income with detailed categorization
                                and analytics.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100 p-4">
                        <div class="card-body text-center">
                            <i class="fas fa-wallet feature-icon"></i>
                            <h3 class="h5 mb-3">Budget Planning</h3>
                            <p class="text-muted">Create and manage budgets for different categories to stay on track
                                with your financial goals.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100 p-4">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-pie feature-icon"></i>
                            <h3 class="h5 mb-3">Financial Reports</h3>
                            <p class="text-muted">Generate comprehensive reports and visualizations to understand your
                                spending patterns.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container text-center">
            <h2 class="mb-4">Ready to Take Control of Your Finances?</h2>
            <p class="lead mb-4">Join thousands of users who are already managing their finances effectively.</p>
            <a href="<?= base_url('auth/register') ?>" class="btn btn-primary btn-lg px-5">Start Free Trial</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; <?= date('Y') ?> Financial Management System. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>