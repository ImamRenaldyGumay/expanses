<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Expense Tracker</h1>
        <a href="<?php echo site_url('pengeluaran/tambah'); ?>" class="btn btn-primary mb-3">Tambah Pengeluaran</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pengeluaran as $p): ?>
                <tr>
                    <td><?php echo $p['tanggal']; ?></td>
                    <td>Rp <?php echo number_format($p['jumlah'], 0, ',', '.'); ?></td>
                    <td><?php echo $p['kategori']; ?></td>
                    <td><?php echo $p['keterangan']; ?></td>
                    <td>
                        <a href="<?php echo site_url('pengeluaran/edit/'.$p['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?php echo site_url('pengeluaran/hapus/'.$p['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>