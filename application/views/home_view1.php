<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Uang</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow w-full fixed">
        <div class="container mx-auto px-24 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-xl font-bold text-gray-800">Manajemen Uang</a>
                </div>
                <div class="hidden md:flex space-x-4">
                  <a href="#features" class="text-gray-600 hover:text-blue-600">Fitur</a>
                  <a href="#testimonials" class="text-gray-600 hover:text-blue-600">Testimoni</a>
                  <a href="#" class="text-gray-600 hover:text-blue-600">Tentang</a>
                </div>
                <div class="hidden md:flex space-x-4">
                    <button type="button" class="rounded-lg border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-medium rounded-lg text-sm px-4 py-2"><a href="<?= base_url('Login') ?>">Login</a></button>
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-900 font-medium rounded-lg text-sm px-4 py-2"><a href="<?= base_url('Register')?>">Daftar</a></button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" x-data="{ isOpen: false }">
            <div class="px-6 py-4 bg-gray-800 text-white flex justify-between items-center">
                <a href="#" class="text-xl font-bold">Manajemen Uang</a>
                <button @click="isOpen = !isOpen" class="focus:outline-none">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                    </svg>
                </button>
            </div>
            <div x-show="isOpen" class="px-2 pt-2 pb-4 space-y-1">
                <a href="#features" class="block px-3 py-2 rounded-md text-base font-medium text-white bg-gray-900">Fitur</a>
                <a href="#testimonials" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Testimoni</a>
                <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">Tentang</a>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-blue-600 text-white">
      <div class="container mx-auto px-24 py-4 w-full h-screen flex items-center justify-between">
        <div>
          <h1 class="text-3xl font-bold">Manajemen Uang yang Mudah</h1>
          <p class="mt-2">Kelola keuangan Anda dengan lebih baik dan capai tujuan finansial Anda.</p>
          <a href="#features" class="mt-4 inline-block bg-white text-blue-600 px-4 py-2 rounded">Pelajari Lebih Lanjut</a>
        </div>
        <img src="https://placehold.co/600x400" alt="img-logo">
      </div>
    </header>

    <!-- Fitur -->
    <section id="features" class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold text-center">Fitur Kami</h2>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold">Penganggaran</h3>
                    <p class="mt-2 text-gray-600">Buat anggaran yang sesuai dengan kebutuhan dan tujuan Anda.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold">Pelacakan Pengeluaran</h3>
                    <p class="mt-2 text-gray-600">Lacak pengeluaran Anda dengan mudah dan efisien.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold">Analisis Keuangan</h3>
                    <p class="mt-2 text-gray-600">Dapatkan wawasan mendalam tentang kebiasaan pengeluaran Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial -->
    <section class="bg-gray-200 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold text-center">Apa Kata Mereka</h2>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-600">"Aplikasi ini telah membantu saya mengelola keuangan dengan lebih baik!"</p>
                    <p class="mt-4 font-semibold">- Andi</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-600">"Saya bisa melihat dengan jelas di mana uang saya pergi!"</p>
                    <p class="mt-4 font-semibold">- Budi</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <p class="text-gray-600">"Fitur analisisnya sangat membantu dalam merencanakan masa depan!"</p>
                    <p class="mt-4 font-semibold">- Citra</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Manajemen Uang. Semua hak dilindungi.</p>
        </div>
    </footer>

</body>
</html>
