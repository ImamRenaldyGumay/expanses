
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
                <form method="post" action="<?= base_url('add-expense') ?>">
                    <!-- Input Jumlah -->
                    <div class="mb-3">
                        <label for="amount" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="amount" name="amount" required>
                    </div>
                    
                    <!-- Input Deskripsi -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="description" name="description" required>
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
