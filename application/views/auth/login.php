<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title><?= $title ?></title>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>  
        body {  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            height: 100vh;  
            background-color: #4caf50; /* Warna hijau 300 */  
        }  
        .login-container {  
            width: 400px;  
            padding: 30px;  
            background-color: white; /* Latar belakang putih untuk form */  
            border-radius: 10px;  
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  
            text-align: center;  
        }  
        .profile-image {  
            width: 80px;  
            height: 80px;  
            border-radius: 50%;  
            margin-bottom: 20px;  
        }  
        .login-container h2 {  
            margin: 20px 0;  
        }  
        .form-group {  
            margin-bottom: 20px;  
            text-align: left; /* Rata kiri untuk label */  
        }  
        .form-control {  
            border: 1px solid #ced4da; /* Border abu-abu */  
            border-radius: 0;  
        }  
        .form-control:focus {  
            border-color: #4caf50; /* Warna hijau saat fokus */  
            box-shadow: none;  
        }  
        .btn-login {  
            background-color: #4caf50; /* Warna hijau */  
            color: white;  
        }  
        .btn-login:hover {  
            background-color: #43a047; /* Warna hijau lebih gelap saat hover */  
        }  
        .footer-text {  
            margin-top: 20px;  
        }  
    </style>  
</head>  
<body>  
  
    <div class="login-container">  
        <img src="https://placehold.co/400" alt="Profile Image" class="profile-image">  
        <h2>LOGIN</h2>  
        <form action="<?= base_url('Login') ?>" method="post">  
            <div class="form-group">  
                <label for="email">Email</label>  
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">  
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>  
            <div class="form-group">  
                <label for="password">Password</label>  
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">  
                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
            </div>  
            <button type="submit" class="btn btn-login btn-block">Login</button>  
            <div class="footer-text">  
                <span>Don't have an account? <a href="<?= base_url('Register') ?>">REGISTER</a></span>  
            </div>  
        </form>  
    </div>   
    
    
    <?php if ($this->session->flashdata('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= $this->session->flashdata('success') ?>',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '<?= $this->session->flashdata('error') ?>',
            });
        </script>
    <?php endif; ?>
  
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>  
</body>  
</html>  

