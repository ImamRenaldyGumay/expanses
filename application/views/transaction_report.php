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
                    <h1>Laporan Transaksi</h1>
                </div>
                <div class="col-sm-6">
                    <!-- <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol> -->
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <!-- Default box -->
        <!-- Form Filter -->  
        <form method="get" action="<?= site_url('report'); ?>" class="mb-4">  
            <div class="row mb-3">  
                <div class="col">
                    <div class="form-group">
                        <select name="type" class="form-control">  
                            <option value="">Semua Jenis</option>  
                            <option value="income">Income</option>  
                            <option value="expense">Expense</option>  
                        </select> 
                    </div>
                </div>  
                <div class="col">  
                    <input type="date" name="start_date" class="form-control" placeholder="Tanggal Mulai"> 
                    <small>Tanggal Mulai</small>
                </div>  
                <div class="col">  
                    <input type="date" name="end_date" class="form-control" placeholder="Tanggal Akhir"> 
                    <small>Tanggal Akhir</small> 
                </div>  
                <div class="col-auto">  
                    <button type="submit" class="btn btn-primary">Tampilkan</button>  
                </div>  
            </div>  
        </form>
        <!-- Ringkasan -->  
        <div class="row mb-4">  
            <div class="col">  
                <div class="alert alert-success" role="alert">  
                    Total Income: Rp <?= number_format($total_income, 0, ',', '.'); ?>  
                </div>  
            </div>  
            <div class="col">  
                <div class="alert alert-danger" role="alert">  
                    Total Expense: Rp <?= number_format($total_expense, 0, ',', '.'); ?>  
                </div>  
            </div>  
        </div>
        <!-- Card untuk Tabel Transaksi -->  
        <div class="card">  
            <div class="card-body">  
                <h2 class="h5 card-title mb-4">Detail Transaksi</h2>  
                <table id="transactionsTable" class="table table-bordered">  
                    <thead class="table-light">  
                        <tr>  
                            <th>#</th>  
                            <th>Jenis</th>  
                            <th>Kategori</th>  
                            <th>Jumlah</th>  
                            <th>Tanggal</th>  
                        </tr>  
                    </thead>  
                    <tbody>  
                        <?php if (!empty($transactions)): ?>  
                            <?php foreach ($transactions as $index => $transaction): ?>  
                                <tr>  
                                    <td><?= $index + 1; ?></td>  
                                    <td><?= ucfirst($transaction->type); ?></td>  
                                    <td><?= $transaction->category_name; ?></td>  
                                    <td>Rp <?= number_format($transaction->amount, 0, ',', '.'); ?></td>  
                                    <td><?= formatTanggal($transaction->transaction_date, 'long') ?></td>  
                                </tr>  
                            <?php endforeach; ?>  
                        <?php else: ?>  
                            <tr>  
                                <td colspan="5" class="text-center">Tidak ada transaksi.</td>  
                            </tr>  
                        <?php endif; ?>  
                    </tbody>  
                </table>  
            </div>  
        </div>
    </section>
</div>
