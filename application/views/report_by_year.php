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
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <!-- Form Filter -->  
                <form method="get" action="<?= site_url('report-by-year'); ?>" class="mb-4">  
                    <div class="row">  
                        <div class="col-md-3">  
                            <input type="number" name="year" class="form-control" placeholder="Tahun" value="<?= $year; ?>" min="2000" max="<?= date('Y'); ?>" required>  
                        </div>  
                        <div class="col-md-3">  
                            <button type="submit" class="btn btn-primary w-100">Tampilkan</button>  
                        </div>  
                    </div>  
                </form>
            </div>
            <div class="card-body">
                <table class="table table-bordered">  
                    <tbody>  
                        <tr>  
                            <td>Saldo Awal Tahun</td>  
                            <td>Rp <?= number_format($report['opening_balance'], 0, ',', '.'); ?></td>  
                        </tr>  
                        <tr class="bg-success text-white">  
                            <td>Semua Pemasukan</td>  
                            <td>Rp <?= number_format($report['total_income'], 0, ',', '.'); ?> (+)</td>  
                        </tr>  
                        <tr class="bg-danger text-white">  
                            <td>Semua Pengeluaran</td>  
                            <td>Rp <?= number_format($report['total_expense'], 0, ',', '.'); ?> (-)</td>  
                        </tr>  
                        <tr class="fw-bold">  
                            <td>Akumulasi</td>  
                            <td>Rp <?= number_format($report['total_income'] - $report['total_expense'], 0, ',', '.'); ?></td>  
                        </tr>  
                        <tr>  
                            <td>Saldo Akhir Tahun</td>  
                            <td>Rp <?= number_format($report['closing_balance'], 0, ',', '.'); ?></td>  
                        </tr>  
                    </tbody>  
                </table>
            </div>
        </div>
    </section>
    <!-- Pie Chart -->  
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex flex-column align-items-center">
                <h2 class="mt-5">Distribusi Pemasukan Berdasarkan Kategori</h2>
                <div class="chart-container">
                    <canvas id="incomeChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-flex flex-column align-items-center">
                <h2 class="mt-5">Distribusi Pengeluaran Berdasarkan Kategori</h2>  
                <div class="chart-container">
                    <canvas id="expenseChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script>  
        // Income Chart  
        const incomeCtx = document.getElementById('incomeChart').getContext('2d');  
        const incomeChart = new Chart(incomeCtx, {  
            type: 'pie',  
            data: {  
                labels: [  
                    <?php foreach ($income_categories as $category): ?>  
                        '<?= htmlspecialchars($category->category_name); ?>',  
                    <?php endforeach; ?>  
                ],  
                datasets: [{  
                    label: 'Total Pemasukan (Rp)',  
                    data: [  
                        <?php foreach ($income_categories as $category): ?>  
                            <?= $category->total; ?>,  
                        <?php endforeach; ?>  
                    ],  
                    backgroundColor: [  
                        'rgba(75, 192, 192, 0.5)',  
                        'rgba(255, 99, 132, 0.5)',  
                        'rgba(255, 206, 86, 0.5)',  
                        'rgba(54, 162, 235, 0.5)',  
                        'rgba(153, 102, 255, 0.5)',  
                        'rgba(255, 159, 64, 0.5)'  
                    ],  
                    borderColor: [  
                        'rgba(75, 192, 192, 1)',  
                        'rgba(255, 99, 132, 1)',  
                        'rgba(255, 206, 86, 1)',  
                        'rgba(54, 162, 235, 1)',  
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
                        text: 'Distribusi Pemasukan Berdasarkan Kategori'  
                    }  
                }  
            }  
        });  
  
        // Expense Chart  
        const expenseCtx = document.getElementById('expenseChart').getContext('2d');  
        const expenseChart = new Chart(expenseCtx, {  
            type: 'pie',  
            data: {  
                labels: [  
                    <?php foreach ($expense_categories as $category): ?>  
                        '<?= htmlspecialchars($category->category_name); ?>',  
                    <?php endforeach; ?>  
                ],  
                datasets: [{  
                    label: 'Total Pengeluaran (Rp)',  
                    data: [  
                        <?php foreach ($expense_categories as $category): ?>  
                            <?= $category->total; ?>,  
                        <?php endforeach; ?>  
                    ],  
                    backgroundColor: [  
                        'rgba(75, 192, 192, 0.5)',  
                        'rgba(255, 99, 132, 0.5)',  
                        'rgba(255, 206, 86, 0.5)',  
                        'rgba(54, 162, 235, 0.5)',  
                        'rgba(153, 102, 255, 0.5)',  
                        'rgba(255, 159, 64, 0.5)'  
                    ],  
                    borderColor: [  
                        'rgba(75, 192, 192, 1)',  
                        'rgba(255, 99, 132, 1)',  
                        'rgba(255, 206, 86, 1)',  
                        'rgba(54, 162, 235, 1)',  
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
                        text: 'Distribusi Pengeluaran Berdasarkan Kategori'  
                    }  
                }  
            }  
        });  
    </script>
