<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengeluaran</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Pengeluaran</h1>
        <form action="<?php echo site_url('pengeluaran/edit/'.$pengeluaran['id']); ?>" method="post">
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?php echo $pengeluaran['jumlah']; ?>" required>
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $pengeluaran['kategori']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $pengeluaran['tanggal']; ?>" required>
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"><?php echo $pengeluaran['keterangan']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?php echo site_url('pengeluaran'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>