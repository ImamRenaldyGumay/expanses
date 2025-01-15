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
                    <h1 class="mb-4">Laporan Berdasarkan Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <!-- Default box -->
        <!-- Filter -->  
        <form method="get" action="<?= site_url('reports/by_category'); ?>" class="mb-4">  
            <div class="row">  
                <div class="col-md-3">  
                    <select name="type" class="form-control">  
                        <option value="">Semua</option>  
                        <option value="income" <?= isset($type) && $type == 'income' ? 'selected' : ''; ?>>Income</option>  
                        <option value="expense" <?= isset($type) && $type == 'expense' ? 'selected' : ''; ?>>Expense</option>  
                    </select>  
                </div>  
                <div class="col-md-3">  
                    <input type="date" name="start_date" class="form-control" placeholder="Tanggal Mulai" value="<?= isset($start_date) ? $start_date : ''; ?>">  
                </div>  
                <div class="col-md-3">  
                    <input type="date" name="end_date" class="form-control" placeholder="Tanggal Akhir" value="<?= isset($end_date) ? $end_date : ''; ?>">  
                </div>  
                <div class="col-md-3">  
                    <button type="submit" class="btn btn-primary w-100">Tampilkan</button>  
                </div>  
            </div>  
        </form>
        <!-- Card untuk Tabel Transaksi -->  
        <div class="card">  
            <div class="card-body">  
                <h2 class="h5 card-title mb-4">Detail Transaksi</h2>  
                <table class="table table-bordered" id="transactionsTable">  
                    <thead class="table-light">  
                        <tr>  
                            <th>Kategori</th>  
                            <th>Total</th>  
                        </tr>  
                    </thead>  
                    <tbody>  
                        <?php if (!empty($reports)): ?>  
                            <?php foreach ($reports as $report): ?>  
                                <tr>  
                                    <td><?= htmlspecialchars($report->category_name); ?></td>  
                                    <td>Rp <?= number_format($report->total, 0, ',', '.'); ?></td>  
                                </tr>  
                            <?php endforeach; ?>  
                        <?php else: ?>  
                            <tr>  
                                <td colspan="2" class="text-center">Tidak ada data.</td>  
                            </tr>  
                        <?php endif; ?>  
                    </tbody>  
                </table>  
            </div>  
        </div>
        <!-- Pie Chart -->  
        <h2 class="mt-5">Distribusi Berdasarkan Kategori</h2>  
        <canvas id="categoryChart" width="400" height="400"></canvas>
    </section>
</div>
<script>  
    const ctx = document.getElementById('categoryChart').getContext('2d');  
    const categoryChart = new Chart(ctx, {  
        type: 'pie',  
        data: {  
            labels: [  
                <?php foreach ($reports as $report): ?>  
                    '<?= htmlspecialchars($report->category_name); ?>',  
                <?php endforeach; ?>  
            ],  
            datasets: [{  
                label: 'Total',  
                data: [  
                    <?php foreach ($reports as $report): ?>  
                        <?= $report->total; ?>,  
                    <?php endforeach; ?>  
                ],  
                backgroundColor: [  
                    'rgba(255, 99, 132, 0.2)',  
                    'rgba(54, 162, 235, 0.2)',  
                    'rgba(255, 206, 86, 0.2)',  
                    'rgba(75, 192, 192, 0.2)',  
                    'rgba(153, 102, 255, 0.2)',  
                    'rgba(255, 159, 64, 0.2)'  
                ],  
                borderColor: [  
                    'rgba(255, 99, 132, 1)',  
                    'rgba(54, 162, 235, 1)',  
                    'rgba(255, 206, 86, 1)',  
                    'rgba(75, 192, 192, 1)',  
                    'rgba(153, 102, 255, 1)',  
                    'rgba(255, 159, 64, 1)'  
                ],  
                borderWidth: 1  
            }]  
        },  
        options: {  
            responsive: true,  
            plugins: {  
                legend: {  
                    position: 'top',  
                },  
                title: {  
                    display: true,  
                    text: 'Distribusi Berdasarkan Kategori'  
                }  
            }  
        }  
    });  
</script>  
