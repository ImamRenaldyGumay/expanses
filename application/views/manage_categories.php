
<div class="p-6 sm:ml-64 mt-14">
    <button onclick="window.history.back()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
        Kembali
    </button>
    <h1 class="text-2xl font-bold mb-6">Kelola Kategori</h1>

    <!-- Form Tambah Kategori -->
    <form method="post" action="<?= site_url('add-category'); ?>" class="mb-4">
        <div class="flex space-x-4">
            <div class="flex-1">
                <input type="text" name="name" class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2" placeholder="Nama Kategori" required>
            </div>
            <div class="flex-1">
                <select name="type" class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2" required>
                    <option value="" disabled selected>Pilih Jenis</option>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>
            <div class="flex-none">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Tambah Kategori</button>
            </div>
        </div>
    </form>

    <!-- Tabel Kategori -->
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b text-left">#</th>
                <th class="py-2 px-4 border-b text-left">Nama Kategori</th>
                <th class="py-2 px-4 border-b text-left">Jenis</th>
                <th class="py-2 px-4 border-b text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $index => $category): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b"><?= $index + 1; ?></td>
                        <td class="py-2 px-4 border-b"><?= $category->name; ?></td>
                        <td class="py-2 px-4 border-b"><?= ucfirst($category->type); ?></td>
                        <td class="py-2 px-4 border-b">
                            <a href="<?= site_url('categories/delete/' . $category->id); ?>" 
                                class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600 transition duration-200" 
                                onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center py-2">Tidak ada kategori.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>


</div>
