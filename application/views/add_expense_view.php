
<style>
    body {
        background-color: #f8f9fa;
    }
    .content-wrapper{
        padding: 10px 60px;
    }
    /* .header {
        background-color: #ffffff;
        padding: 20px;
        border-bottom: 1px solid #dee2e6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    } */

    table.dataTable {
        border: 1px solid #ccc;
    }
    table.dataTable thead th {
        background-color: #f2f2f2;
        color: #333;
    }
    table.dataTable tbody tr:hover {
        background-color: #e0e0e0;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <button class="btn btn-danger" onclick="window.history.back()">Back</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Tambah Pengeluaran</h1>
            </div>
            <div class="card-body">
                <!-- Form -->
                <form method="post" action="<?= base_url('Transactions/expanse_process') ?>">
                    <!-- Input Jumlah -->
                    <div class="mb-3">
                        <label for="amount" class="form-label">Nominal (niminal 100)</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                        <small class="form-text text-muted">Hanya angka, minimal 100.</small>
                    </div>
                    
                    <!-- Input Deskripsi -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="4" maxlength="100" oninput="updateCharCount(this)" placeholder="Masukkan deskripsi..."></textarea>  
                        <div class="char-count" id="charCount">100 karakter tersisa</div>
                    </div>
                    
                    <!-- Pilihan Kategori -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Kategori</label>
                        <select class="form-control" id="category_id" name="category_id" required>
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <!-- Input Tanggal -->
                    <div class="mb-3">
                        <label for="datepicker" class="form-label">Pilih Tanggal</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="datepicker" placeholder="Pilih Tanggal" id="transaction_date" name="transaction_date" required>
                            <span class="input-group-text">
                                <i class="bi bi-calendar"></i>
                            </span>
                        </div>
                    </div>
                    
                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-success w-100">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>
<script>  
    document.getElementById('amount').addEventListener('input', function (e) {  
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
<script>  
    function updateCharCount(textarea) {  
        const maxLength = textarea.getAttribute('maxlength');  
        const currentLength = textarea.value.length;  
        const remainingChars = maxLength - currentLength;  
        document.getElementById('charCount').innerText = remainingChars + ' karakter tersisa';  
    }  

    function submitForm() {  
        const description = document.getElementById('description').value;  
        alert('Deskripsi yang dimasukkan: ' + description);  
    }  
</script>  
