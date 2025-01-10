<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Berdasarkan Kategori</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Laporan Berdasarkan Kategori</h1>

        <!-- Filter -->
        <form method="get" action="<?= site_url('reports/by_category'); ?>" class="mb-4">
            <div class="row">
                <div class="col-md-3">
                    <select name="type" class="form-control">
                        <option value="">Semua</option>
                        <option value="income" <?= $type == 'income' ? 'selected' : ''; ?>>Income</option>
                        <option value="expense" <?= $type == 'expense' ? 'selected' : ''; ?>>Expense</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="date" name="start_date" class="form-control" placeholder="Tanggal Mulai">
                </div>
                <div class="col-md-3">
                    <input type="date" name="end_date" class="form-control" placeholder="Tanggal Akhir">
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                </div>
            </div>
        </form>

        <!-- Tabel -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kategori</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($reports)): ?>
                    <?php foreach ($reports as $report): ?>
                        <tr>
                            <td><?= $report->category_name; ?></td>
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
</body>
</html>
