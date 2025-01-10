<div class="p-6 sm:ml-64 mt-14">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Daftar Transaksi</h1>
    <button onclick="window.history.back()" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
    Kembali
</button>
    <div class="bg-white rounded-lg shadow mt-8 overflow-hidden">
        <div class="bg-gray-100 px-4 py-2 text-lg font-semibold text-gray-800">Transaksi Terbaru</div>
        <table class="table-auto w-full border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-200 px-4 py-2 text-left text-gray-800">#</th>
                    <th class="border border-gray-200 px-4 py-2 text-left text-gray-800">Jenis Transaksi</th>
                    <th class="border border-gray-200 px-4 py-2 text-left text-gray-800">Jumlah</th>
                    <th class="border border-gray-200 px-4 py-2 text-left text-gray-800">Kategori</th>
                    <th class="border border-gray-200 px-4 py-2 text-left text-gray-800">Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($transactions)): ?>
                    <?php foreach ($transactions as $index => $transaction): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-200 px-4 py-2"><?= $index + 1; ?></td>
                            <td class="border border-gray-200 px-4 py-2"><?= ucfirst($transaction->type); ?></td>
                            <td class="border border-gray-200 px-4 py-2"><?= number_format($transaction->amount, 0, ',', '.'); ?></td>
                            <td class="border border-gray-200 px-4 py-2"><?= $transaction->category_name; ?></td>
                            <td class="border border-gray-200 px-4 py-2"><?= formatTanggal($transaction->transaction_date, 'long'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada transaksi.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
