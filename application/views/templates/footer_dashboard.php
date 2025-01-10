    <script>
        // Sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });

        // Dropdown functionality
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', () => {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown if clicked outside
        document.addEventListener('click', (event) => {
            const isClickInside = dropdownButton.contains(event.target) || dropdownMenu.contains(event.target);
            if (!isClickInside) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function() {
            $('#transactionsTable').DataTable({
                // Opsi DataTables dapat ditambahkan di sini
                "language": {
                    "emptyTable": "Tidak ada transaksi."
                }
            });
        });
    </script>
</body>
</html>