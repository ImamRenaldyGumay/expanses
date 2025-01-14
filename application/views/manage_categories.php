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
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Kelola Kategori</h1>
                <div class="card-tools">
                    <!-- Button trigger modal -->
                    <!-- <p type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus"></i>
                        <span> Tambah Kategori</span>
                    </p> -->
                    <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-plus"></i>
                        <span> Tambah Kategori</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <!-- Tabel Kategori -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="transaksiTable">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Jenis</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php if (!empty($categories)): ?>  
                                <?php foreach ($categories as $index => $category): ?>  
                                    <tr>  
                                        <td><?= $index + 1; ?></td>  
                                        <td><?= $category->name; ?></td>  
                                        <td><?= ucfirst($category->type); ?></td>  
                                        <td>  
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#Edit<?= $category->id ?>" onClick="editCategory(<?= $category->id ?>)"><i class="fas fa-pencil-alt"></i>Edit</button>  
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?= $category->id ?>"><i class="fas fa-trash-alt"></i>Delete</button>  
                                        </td>  
                                    </tr>
                                <?php endforeach; ?>  
                            <?php else: ?>  
                                <tr>  
                                    <td colspan="4" class="text-center">Tidak ada kategori.</td>  
                                </tr>  
                            <?php endif; ?>  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Tambah Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Tambah Kategori -->
                <form method="post" action="<?= site_url('add-category'); ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Kategori: </label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Kategori" onkeydown="return isLetter(event)" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">type</label>
                        <select name="type" class="form-control" required>
                            <option value="" disabled selected>Pilih Jenis</option>
                            <option value="income">Income</option>
                            <option value="expense">Expense</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Simpan</button>
                </form>
            </div>
            </div>
        </div>
    </div>
<!-- End Tambah Modal -->

<!-- Edit Modal -->
    <?php foreach($categories as $category): ?>
        <div class="modal fade" id="Edit<?= $category->id?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Tambah Kategori -->
                    <form method="post" action="<?= site_url('edit-category/'.$category->id); ?>">
                        <input type="hidden" name="id" value="<?= $category->id?>">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Kategori: </label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Kategori" onkeydown="return isLetter(event)" autocomplete="off" required value="<?= $category->name; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">type</label>
                            <select name="type" class="form-control" required>
                                <option value="<?= $category->type?>" disabled selected><?= $category->type?></option>
                                <option value="income">Income</option>
                                <option value="expense">Expense</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Simpan</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
    <?php endforeach ?>
<!-- End Edit Modal -->

<!-- Start Delete Modal -->
    <?php foreach($categories as $category): ?>
        <div class="modal fade" data-backdrop="static" id="Delete<?= $category->id?>">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this <strong><?= $category->name?></strong>?
                </div>
                <form action="DeleteRuangan">
                    <div class="modal-footer">
                    <button data-dismiss="modal" type="button" class="btn btn-default">Cancel</button>
                    <a href="<?= base_url('delete-category/'.$category->id) ?>" class="btn btn-danger">Hapus</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    <?php endforeach?>
<!-- End Delete Modal -->
<script>
function isLetter(event) {
    const key = event.key;
    const regex = /^[a-zA-Z\s]$/;
    return regex.test(key) || event.key === 'Backspace';
}
</script>
