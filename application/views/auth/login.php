<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Financial Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px 0;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            margin: 20px auto;
        }

        .login-row {
            min-height: 600px;
        }

        .login-form {
            padding: 50px;
        }

        .login-image {
            background: url('https://cdn-icons-png.flaticon.com/512/2382/2382469.png') center/cover;
            position: relative;
        }

        .login-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(30, 60, 114, 0.8);
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #e0e0e0;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #1e3c72;
        }

        .btn-login {
            background: #1e3c72;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: #2a5298;
            transform: translateY(-2px);
        }

        .social-login {
            border-top: 1px solid #e0e0e0;
            padding-top: 20px;
            margin-top: 20px;
        }

        .social-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0 5px;
            color: white;
            transition: all 0.3s;
        }

        .social-btn:hover {
            transform: translateY(-3px);
        }

        .google {
            background: #DB4437;
        }

        .facebook {
            background: #4267B2;
        }

        .twitter {
            background: #1DA1F2;
        }

        /* Responsive Styles */
        @media (max-width: 991.98px) {
            .login-row {
                min-height: auto;
            }

            .login-form {
                padding: 30px;
            }

            .login-container {
                margin: 10px;
            }
        }

        @media (max-width: 767.98px) {
            body {
                padding: 10px 0;
            }

            .login-form {
                padding: 20px;
            }

            .login-container {
                margin: 0;
                border-radius: 15px;
            }

            .btn-login {
                padding: 10px;
            }

            .form-control {
                padding: 10px;
            }

            .input-group-text {
                padding: 10px;
            }
        }

        @media (max-width: 575.98px) {
            .login-form {
                padding: 15px;
            }

            .text-center h2 {
                font-size: 1.5rem;
            }

            .text-center p {
                font-size: 0.9rem;
            }

            .form-label {
                font-size: 0.9rem;
            }

            .social-btn {
                width: 35px;
                height: 35px;
            }

            .social-btn i {
                font-size: 0.9rem;
            }
        }

        /* Animation for mobile */
        @media (max-width: 991.98px) {
            .login-container {
                animation: slideUp 0.5s ease-out;
            }

            @keyframes slideUp {
                from {
                    transform: translateY(20px);
                    opacity: 0;
                }

                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }
        }

        /* Improved touch targets for mobile */
        @media (max-width: 767.98px) {

            .form-check-label,
            .text-decoration-none {
                padding: 5px 0;
                display: inline-block;
            }

            .btn-login,
            .form-control,
            .input-group-text {
                min-height: 44px;
                /* Better touch target size */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <div class="row login-row g-0">
                <div class="col-lg-6">
                    <div class="login-form">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold">Welcome Back!</h2>
                            <p class="text-muted">Please login to your account</p>
                        </div>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= $this->session->flashdata('error') ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('auth/login') ?>" method="post">
                            <div class="mb-4">
                                <label class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                        required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" name="password" class="form-control"
                                        placeholder="Enter your password" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <a href="<?= base_url('auth/forgot_password') ?>" class="text-decoration-none">Forgot
                                    Password?</a>
                            </div>

                            <button type="submit" class="btn btn-login btn-primary w-100 mb-4">Login</button>

                            <div class="text-center">
                                <p class="mb-0">Don't have an account?
                                    <a href="<?= base_url('auth/register') ?>" class="text-decoration-none">Sign Up</a>
                                </p>
                            </div>

                            <div class="social-login text-center">
                                <p class="text-muted mb-3">Or login with</p>
                                <a href="<?= base_url('auth/google_login') ?>" class="social-btn google">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a href="<?= base_url('auth/facebook_login') ?>" class="social-btn facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="<?= base_url('auth/twitter_login') ?>" class="social-btn twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="login-image h-100">
                        <div
                            class="position-relative h-100 d-flex align-items-center justify-content-center text-white p-5">
                            <div class="text-center">
                                <h3 class="display-6 fw-bold mb-4">Financial Management System</h3>
                                <p class="lead">Take control of your finances and achieve your financial goals with our
                                    comprehensive management system.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>