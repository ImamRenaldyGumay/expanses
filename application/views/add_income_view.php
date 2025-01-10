
<div class="p-6 sm:ml-64 mt-14">
    <button onclick="window.history.back()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
    Kembali
</button>
    <h1 class="text-2xl font-bold mb-6">Tambah Pemasukan</h1>
    <form method="post" action="<?= base_url('add-income') ?>" class="space-y-4">
        <div>
            <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah</label>
            <input type="number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" id="amount" name="amount" required>
        </div>
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" id="description" name="description" required>
        </div>
        <div>
            <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
            <select class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" id="category_id" name="category_id" required>
                <option value="">Pilih Kategori</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->id ?>"><?= $category->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="transaction_date" class="block text-sm font-medium text-gray-700">Tanggal</label>
            <input type="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500" id="transaction_date" name="transaction_date" required>
        </div>
        <button type="submit" class="w-full bg-green-500 text-white py-2 rounded-md hover:bg-green-600 transition duration-200">Simpan</button>
    </form>

</div>
