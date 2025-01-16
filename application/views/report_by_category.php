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
    /* .chart-container {
        width: 300px;
        height: 300px;
        margin: 0 auto;
    } */
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mb-4"><?= $title; ?></h1>
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
        <!-- Filter -->  
        <form method="get" action="<?= site_url('reports/by_category'); ?>" class="mb-4">  
            <div class="row">
                <div class="col-md-4">  
                    <input type="date" name="start_date" class="form-control" placeholder="Tanggal Mulai" value="<?= isset($start_date) ? $start_date : ''; ?>">  
                </div>  
                <div class="col-md-4">  
                    <input type="date" name="end_date" class="form-control" placeholder="Tanggal Akhir" value="<?= isset($end_date) ? $end_date : ''; ?>">  
                </div>  
                <div class="col-md-4">  
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
    </section>
    <!-- Pie Chart -->  
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Income Chart</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="incomeChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2>Expense Chart</h2>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="expenseChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Data untuk Income
    const incomeLabels = <?php echo json_encode(array_column($income_reports, 'category')); ?>;
    const incomeData = <?php echo json_encode(array_column($income_reports, 'total')); ?>;

    // Data untuk Expense
    const expenseLabels = <?php echo json_encode(array_column($expense_reports, 'category')); ?>;
    const expenseData = <?php echo json_encode(array_column($expense_reports, 'total')); ?>;

    // Chart Income
    const incomeCtx = document.getElementById('incomeChart').getContext('2d');
    new Chart(incomeCtx, {
        type: 'pie',
        data: {
            labels: incomeLabels,
            datasets: [{
                label: 'Income',
                data: incomeData,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Chart Expense
    const expenseCtx = document.getElementById('expenseChart').getContext('2d');
    new Chart(expenseCtx, {
        type: 'pie',
        data: {
            labels: expenseLabels,
            datasets: [{
                label: 'Expense',
                data: expenseData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>
