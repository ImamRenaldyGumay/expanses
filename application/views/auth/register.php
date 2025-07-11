<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Financial Management System</title>
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

        .register-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            margin: 20px auto;
        }

        .register-row {
            min-height: 600px;
        }

        .register-form {
            padding: 50px;
        }

        .register-image {
            background: url('https://cdn-icons-png.flaticon.com/512/2382/2382469.png') center/cover;
            position: relative;
        }

        .register-image::before {
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

        .btn-register {
            background: #1e3c72;
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-register:hover {
            background: #2a5298;
            transform: translateY(-2px);
        }

        .btn-register:disabled {
            background: #ccc;
            transform: none;
        }

        .social-register {
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

        .password-toggle {
            cursor: pointer;
            color: #6c757d;
            transition: color 0.3s;
        }

        .password-toggle:hover {
            color: #1e3c72;
        }

        .password-strength {
            height: 5px;
            margin-top: 5px;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .strength-weak {
            background-color: #dc3545;
            width: 25%;
        }

        .strength-medium {
            background-color: #ffc107;
            width: 50%;
        }

        .strength-strong {
            background-color: #28a745;
            width: 100%;
        }

        .form-text {
            font-size: 0.8rem;
            color: #6c757d;
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 1s linear infinite;
            margin-right: 8px;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Responsive Styles */
        @media (max-width: 991.98px) {
            .register-row {
                min-height: auto;
            }

            .register-form {
                padding: 30px;
            }

            .register-container {
                margin: 10px;
            }
        }

        @media (max-width: 767.98px) {
            body {
                padding: 10px 0;
            }

            .register-form {
                padding: 20px;
            }

            .register-container {
                margin: 0;
                border-radius: 15px;
            }

            .btn-register {
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
            .register-form {
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
            .register-container {
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

            .btn-register,
            .form-control,
            .input-group-text {
                min-height: 44px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="register-container">
            <div class="row register-row g-0">
                <div class="col-lg-6">
                    <div class="register-form">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold">Create Account</h2>
                            <p class="text-muted">Join our financial management system</p>
                        </div>

                        <?php echo validation_errors(); ?>

                        <!-- <?php if ($this->session->flashdata('error')): ?>
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: '<?= $this->session->flashdata('error') ?>',
                                });
                            </script>
                        <?php endif; ?> -->
                        <?php if (validation_errors()): ?>
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Validasi Gagal!',
                                    html: `<?= str_replace("\n", '<br>', validation_errors('<div>', '</div>')) ?>`,
                                });
                            </script>
                        <?php endif; ?>
                        <form action="<?= base_url('auth/register') ?>" method="post" id="registerForm">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">First Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-user text-muted"></i>
                                        </span>
                                        <input type="text" name="first_name" class="form-control"
                                            placeholder="Enter first name" required minlength="2" maxlength="50">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Last Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light">
                                            <i class="fas fa-user text-muted"></i>
                                        </span>
                                        <input type="text" name="last_name" class="form-control"
                                            placeholder="Enter last name" required minlength="2" maxlength="50">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-envelope text-muted"></i>
                                    </span>
                                    <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                        required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                </div>
                                <div class="form-text">We'll never share your email with anyone else.</div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" name="password" id="password" class="form-control"
                                        placeholder="Create password" required minlength="8">
                                    <span class="input-group-text bg-light password-toggle"
                                        onclick="togglePassword('password')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <div class="password-strength" id="passwordStrength"></div>
                                <div class="form-text">Password must be at least 8 characters long.</div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="fas fa-lock text-muted"></i>
                                    </span>
                                    <input type="password" name="confirm_password" id="confirmPassword"
                                        class="form-control" placeholder="Confirm password" required>
                                    <span class="input-group-text bg-light password-toggle"
                                        onclick="togglePassword('confirmPassword')">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                    <label class="form-check-label" for="terms">
                                        I agree to the <a href="#" class="text-decoration-none">Terms & Conditions</a>
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-register btn-primary w-100 mb-4" id="submitBtn">
                                <span class="loading-spinner" id="loadingSpinner"></span>
                                Create Account
                            </button>

                            <div class="text-center">
                                <p class="mb-0">Already have an account?
                                    <a href="<?= base_url('auth/login') ?>" class="text-decoration-none">Login</a>
                                </p>
                            </div>

                            <div class="social-register text-center">
                                <p class="text-muted mb-3">Or register with</p>
                                <a href="<?= base_url('auth/google_register') ?>" class="social-btn google">
                                    <i class="fab fa-google"></i>
                                </a>
                                <a href="<?= base_url('auth/facebook_register') ?>" class="social-btn facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="<?= base_url('auth/twitter_register') ?>" class="social-btn twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="register-image h-100">
                        <div
                            class="position-relative h-100 d-flex align-items-center justify-content-center text-white p-5">
                            <div class="text-center">
                                <h3 class="display-6 fw-bold mb-4">Start Your Financial Journey</h3>
                                <p class="lead">Join thousands of users who are already managing their finances
                                    effectively with our comprehensive system.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            const icon = input.nextElementSibling.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // function checkPasswordStrength(password) {
        //     const strengthBar = document.getElementById('passwordStrength');
        //     let strength = 0;

        //     if (password.length >= 8) strength += 1;
        //     if (password.match(/[a-z]+/)) strength += 1;
        //     if (password.match(/[A-Z]+/)) strength += 1;
        //     if (password.match(/[0-9]+/)) strength += 1;
        //     if (password.match(/[^a-zA-Z0-9]+/)) strength += 1;

        //     strengthBar.className = 'password-strength';
        //     if (strength <= 2) {
        //         strengthBar.classList.add('strength-weak');
        //     } else if (strength <= 4) {
        //         strengthBar.classList.add('strength-medium');
        //     } else {
        //         strengthBar.classList.add('strength-strong');
        //     }
        // }

        document.getElementById('password').addEventListener('input', function (e) {
            checkPasswordStrength(e.target.value);
        });

        document.getElementById('registerForm').addEventListener('submit', function (e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const submitBtn = document.getElementById('submitBtn');
            const loadingSpinner = document.getElementById('loadingSpinner');

            if (password !== confirmPassword) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Passwords do not match!',
                });
                return;
            }

            // Simple password validation - just check length
            if (password.length < 8) {
                e.preventDefault();
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Password must be at least 8 characters long.',
                });
                return;
            }

            // Show loading state
            submitBtn.disabled = true;
            loadingSpinner.style.display = 'inline-block';
        });
    </script>
</body>

</html>