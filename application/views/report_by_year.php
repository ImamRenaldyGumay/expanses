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
        <h1>Laporan Berdasarkan Tahun</h1>

        <!-- Laporan Tahunan -->
        <div class="container mt-5">
            <h1>Laporan Tahunan</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reports as $report): ?>
                        <tr>
                            <td><?= $report->year; ?></td>
                            <td>Rp <?= number_format($report->total, 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </div>
</body>
</html>
