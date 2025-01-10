
<div class="p-6 sm:ml-64 mt-14">
    <button onclick="window.history.back()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
        Kembali
    </button>
    <h1 class="text-2xl font-bold mb-6">Laporan Transaksi</h1>

    <!-- Form Filter -->
    <form method="get" action="<?= site_url('report'); ?>" class="mb-4">
        <div class="flex space-x-4">
            <div class="flex-1">
                <select name="type" class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2">
                    <option value="">Semua Jenis</option>
                    <option value="income">Income</option>
                    <option value="expense">Expense</option>
                </select>
            </div>
            <div class="flex-1">
                <input type="date" name="start_date" class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2" placeholder="Tanggal Mulai">
            </div>
            <div class="flex-1">
                <input type="date" name="end_date" class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500 focus:border-blue-500 p-2" placeholder="Tanggal Akhir">
            </div>
            <div class="flex-none">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200">Tampilkan</button>
            </div>
        </div>
    </form>

    <!-- Ringkasan -->
    <div class="flex mb-4 space-x-4">
        <div class="flex-1">
            <div class="bg-green-100 text-green-800 p-4 rounded-md">Total Income: Rp <?= number_format($total_income, 0, ',', '.'); ?></div>
        </div>
        <div class="flex-1">
            <div class="bg-red-100 text-red-800 p-4 rounded-md">Total Expense: Rp <?= number_format($total_expense, 0, ',', '.'); ?></div>
        </div>
    </div>

    <!-- Card untuk Tabel Transaksi -->
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Detail Transaksi</h2>
        <table id="transactionsTable" class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border-b text-left">#</th>
                    <th class="py-2 px-4 border-b text-left">Jenis</th>
                    <th class="py-2 px-4 border-b text-left">Kategori</th>
                    <th class="py-2 px-4 border-b text-left">Jumlah</th>
                    <th class="py-2 px-4 border-b text-left">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($transactions)): ?>
                    <?php foreach ($transactions as $index => $transaction): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b"><?= $index + 1; ?></td>
                            <td class="py-2 px-4 border-b"><?= ucfirst($transaction->type); ?></td>
                            <td class="py-2 px-4 border-b"><?= $transaction->category_name; ?></td>
                            <td class="py-2 px-4 border-b">Rp <?= number_format($transaction->amount, 0, ',', '.'); ?></td>
                            <td class="py-2 px-4 border-b"><?= formatTanggal($transaction->transaction_date, 'long') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center py-2">Tidak ada transaksi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
