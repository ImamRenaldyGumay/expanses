<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title><?= $title ?></title>  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>  
        // Fungsi untuk memvalidasi input  
        function validateInput(event) {  
            const input = event.target;  
            const value = input.value;  
  
            // Regex untuk hanya huruf dan spasi  
            const regex = /^[A-Za-z\s]*$/;   
            // Cek jika input dimulai dengan spasi  
            const startsWithSpace = /^\s/.test(value);  
  
            if (startsWithSpace) {  
                input.setCustomValidity("Input tidak boleh dimulai dengan spasi.");  
            } else if (!regex.test(value)) {  
                input.setCustomValidity("Hanya huruf dan spasi yang diperbolehkan.");  
            } else {  
                input.setCustomValidity(""); // Reset pesan kesalahan  
            }  
        }  
    </script>
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
        <h2>Buat Kategori</h2>  
        <form action="<?= base_url('SettingCatNot/add_process') ?>" method="post">  
            <input type="text" disabled id="user_id" name="user_id" value="<?= $this->session->userdata('user_id');?>"> 
            <h4>Pendapatan (Income)</h4>  
            <div class="form-group">  
            <label for="income1">Kategori Pendapatan 1</label>  
            <input type="text" class="form-control" id="income1" name="income1" required oninput="validateInput(event)">  
        </div>  
        <div class="form-group">  
            <label for="income2">Kategori Pendapatan 2</label>  
            <input type="text" class="form-control" id="income2" name="income2" required oninput="validateInput(event)">  
        </div>  
  
        <h4>Pengeluaran (Expense)</h4>  
        <div class="form-group">  
            <label for="expense1">Kategori Pengeluaran 1</label>  
            <input type="text" class="form-control" id="expense1" name="expense1" required oninput="validateInput(event)">  
        </div>  
        <div class="form-group">  
            <label for="expense2">Kategori Pengeluaran 2</label>  
            <input type="text" class="form-control" id="expense2" name="expense2" required oninput="validateInput(event)">  
        </div>
            <button type="submit" class="btn btn-login btn-block">Tambah Kategori</button>  

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
    <script>
        function isLetter(event) {
            const key = event.key;
            const regex = /^[a-zA-Z\s]$/;
            return regex.test(key) || event.key === 'Backspace';
        }
    </script>
</body>  
</html>  

