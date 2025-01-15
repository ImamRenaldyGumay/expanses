<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title><?= $title ?></title>  
    <!-- Include Bootstrap CSS -->  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <!-- Include jQuery -->  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>  
    <!-- Include Bootstrap Datepicker CSS and JS -->  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>  
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
        <h2>Buat Notikasi</h2>  
        <form action="<?= base_url('SettingCatNot/add_Notification_process') ?>" method="post">  
            <input type="hidden" name="user_id" value="<?= $this->session->userdata('user_id');?>">   
          
            <div class="form-group">    
                <label for="reminder_day">Tanggal Pengingat</label>    
                <select class="form-control" id="reminder_day" name="reminder_day" required>  
                    <option value="">Pilih Tanggal</option>  
                    <?php  
                    for ($d = 1; $d <= 31; $d++) {  
                        echo "<option value='$d'>$d</option>";  
                    }  
                    ?>  
                </select>  
            </div>
    
            <div class="form-group">    
                <label for="treshold_amount">Jumlah Ambang (Threshold Amount)</label>    
                <input type="number" class="form-control" id="treshold_amount" name="treshold_amount" step="0.01" required>    
            </div>    
    
            <div class="form-group">    
                <label for="email">Email</label>    
                <input type="email" class="form-control" id="email" name="email" required>    
            </div>    
    
            <button type="submit" class="btn btn-login btn-block">Simpan</button>
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
        $(document).ready(function() {  
            $('#reminder_date').datepicker({  
                format: 'yyyy-mm-dd', // Adjust format as needed  
                autoclose: true  
            });  
        });  
    </script>  
    <script>  
        document.getElementById('threshold_amount').addEventListener('input', function (e) {  
            // Hanya izinkan angka  
            this.value = this.value.replace(/[^0-9]/g, '');  
        });  

        function submitForm() {  
            const amountInput = document.getElementById('amount');  
            let amount = parseInt(amountInput.value);  

            // Cek apakah nilai minimal 100  
            if (amount < 100) {  
                alert('Jumlah minimal adalah 100.');  
                return;  
            }  

            // Format menjadi satuan uang  
            amountInput.value = formatCurrency(amount);  
            alert('Jumlah yang dimasukkan: ' + amountInput.value);  
        }  

        function formatCurrency(value) {  
            return 'Rp ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");  
        }  
    </script>  
</body>  
</html>  

