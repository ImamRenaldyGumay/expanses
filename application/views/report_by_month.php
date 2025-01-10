<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Bulanan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Laporan Bulanan</h1>

        <!-- Form Filter -->
        <form method="get" action="<?= site_url('report-by-month'); ?>" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <input type="number" name="year" class="form-control" placeholder="Tahun" value="<?= $year; ?>" min="2000" max="<?= date('Y'); ?>">
                </div>
                <div class="col-md-3">
                    <select name="month" class="form-control">
                        <?php for ($i = 1; $i <= 12; $i++): ?>
                            <option value="<?= $i; ?>" <?= $i == $month ? 'selected' : ''; ?>>
                                <?= date('F', mktime(0, 0, 0, $i, 1)); ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </div>
            </div>
        </form>

        <!-- Summary Table -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>Saldo Awal Bulan</td>
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
                    <td>Saldo Akhir Bulan</td>
                    <td>Rp <?= number_format($report['closing_balance'], 0, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>

        <!-- Chart -->
        <div class="mt-5">
            <canvas id="incomeExpenseChart"></canvas>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('incomeExpenseChart').getContext('2d');
        const incomeExpenseChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Pemasukan', 'Pengeluaran'],
                datasets: [{
                    label: 'Jumlah (Rp)',
                    data: [<?= $report['total_income']; ?>, <?= $report['total_expense']; ?>],
                    backgroundColor: ['rgba(75, 192, 192, 0.5)', 'rgba(255, 99, 132, 0.5)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        enabled: true
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
