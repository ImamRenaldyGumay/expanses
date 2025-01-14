<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title; ?></title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      height: 100vh;
    }

    .container-fluid {
      height: 100vh;
    }

    .form-section {
      background-color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px;
    }

    .form-section .logo {
      font-weight: bold;
      display: flex;
      align-items: center;
      margin-bottom: 30px;
    }

    .form-section .logo img {
      width: 50px;
      height: 50px;
      margin-right: 10px;
    }

    .form-section h2 {
      font-size: 30px;
      margin-bottom: 20px;
    }

    .form-control:focus {
      border-color: #ffc107;
      box-shadow: none;
    }

    .btn-primary {
      background-color: #ffc107;
      border-color: #ffc107;
    }

    .btn-primary:hover {
      background-color: #e0a800;
      border-color: #e0a800;
    }

    .image-section {
      background: url('https://placehold.co/100') no-repeat center center;
      background-size: cover; /* Gambar menyesuaikan tanpa meregang */
      height: 100vh; /* Tinggi penuh layar */
      position: relative;
    }

    .image-section::after {
      content: 'Free Bootstrap dashboard templates from Bootstrapdash';
      position: absolute;
      bottom: 10px;
      left: 10px;
      color: #fff;
      font-size: 12px;
    }

    .link {
      font-size: 14px;
    }

    .link a {
      color: #007bff;
      text-decoration: none;
    }

    .link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row h-100">
      <!-- Form Section -->
      <div class="col-md-6 form-section">
        <div>
          <div class="logo">
            <img src="https://placehold.co/50" alt="Logo">
            <span>Logo</span>
          </div>
          <h2>Register</h2>
          <form action="<?= base_url('Auth/proses_login')?>" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </form>
          <p class="link mt-3">
            Already have an account? <a href="#">Login</a>
          </p>
        </div>
      </div>
      <!-- Image Section -->
      <div class="col-md-6 image-section">
        <!-- Background Image Placeholder -->
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
