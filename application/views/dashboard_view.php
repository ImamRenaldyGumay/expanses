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
     .card-body {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border: 1px solid #ddd;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Welcome to Dashboard</h1>
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
        <!-- Summary Cards -->
        <div class="row mt-4">
            <!-- Total Income -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Pemasukan</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp <?= number_format($total_income, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>

            <!-- Total Expense -->
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Total Pengeluaran</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp <?= number_format($total_expense, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>

            <!-- Current Balance -->
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Saldo Saat Ini</div>
                    <div class="card-body">
                        <h5 class="card-title">Rp <?= number_format($current_balance, 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Default box -->
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a class="btn btn-success btn-custom" href="<?= base_url('add-income')?>">Catat Pemasukan</a>
                <a class="btn btn-danger btn-custom" href="<?= base_url('add-expense')?>">Catat Pengeluaran</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="transaksiTable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($recent_transactions as $transaction): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= formatTanggal($transaction->transaction_date, 'long') ?></td>
                                <td><?= $transaction->description ?></td>
                                <td><?= ucfirst($transaction->type) ?></td>
                                <td>Rp <?= number_format($transaction->amount, 0, ',', '.') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>