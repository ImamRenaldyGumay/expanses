<!-- Main Content -->
<div class="p-6 sm:ml-64 mt-14">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">Welcome to Dashboard</h1>

    <!-- Action Buttons -->
    <!-- <div class="mb-6 flex flex-wrap gap-4">
        <a href="<?= base_url('add-income')?>" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow">Add Income</a>
        <a href="<?= base_url('add-expense')?>" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded shadow">Add Expense</a>
        <a href="<?= base_url('view-transactions')?>" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded shadow">View Transactions</a>
        <a href="<?= base_url('Category')?>" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded shadow">Manage Categories</a>
        <a href="<?= base_url('report')?>" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 px-4 rounded shadow">Transaction Report</a>
    </div> -->

    <!-- Summary Cards -->
    <div class="grid mt-4 grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Income -->
        <div class="bg-green-500 text-white p-6 rounded-lg shadow">
            <h5 class="text-lg font-semibold">Total Pemasukan</h5>
            <p class="text-xl font-bold mt-2">Rp <?= number_format($total_income, 0, ',', '.') ?></p>
        </div>

        <!-- Total Expense -->
        <div class="bg-red-500 text-white p-6 rounded-lg shadow">
            <h5 class="text-lg font-semibold">Total Pengeluaran</h5>
            <p class="text-xl font-bold mt-2">Rp <?= number_format($total_expense, 0, ',', '.') ?></p>
        </div>

        <!-- Current Balance -->
        <div class="bg-blue-500 text-white p-6 rounded-lg shadow">
            <h5 class="text-lg font-semibold">Saldo Saat Ini</h5>
            <p class="text-xl font-bold mt-2">Rp <?= number_format($current_balance, 0, ',', '.') ?></p>
        </div>
    </div>

    <!-- Recent Transactions -->
    <div class="bg-white rounded-lg shadow mt-8 overflow-hidden">
        <div class="bg-gray-100 px-4 py-2 text-lg font-semibold text-gray-800">Transaksi Terbaru</div>
        <div class="p-4">
            <table class="table-auto w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-200 px-4 py-2 text-left text-gray-800">Tanggal</th>
                        <th class="border border-gray-200 px-4 py-2 text-left text-gray-800">Deskripsi</th>
                        <th class="border border-gray-200 px-4 py-2 text-left text-gray-800">Jenis</th>
                        <th class="border border-gray-200 px-4 py-2 text-left text-gray-800">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($recent_transactions as $transaction): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-200 px-4 py-2"><?= formatTanggal($transaction->transaction_date, 'long') ?></td>
                            <td class="border border-gray-200 px-4 py-2"><?= $transaction->description ?></td>
                            <td class="border border-gray-200 px-4 py-2"><?= ucfirst($transaction->type) ?></td>
                            <td class="border border-gray-200 px-4 py-2">Rp <?= number_format($transaction->amount, 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

