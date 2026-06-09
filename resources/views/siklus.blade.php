<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Manajemen Siklus - Kumbung IoT</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600&amp;family=Manrope:wght@400;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Tailwind Theme Config -->
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary-container": "#ffd0b3",
                        "on-secondary-fixed-variant": "#0c5136",
                        "surface-tint": "#2c694e",
                        "on-tertiary-fixed": "#301401",
                        "surface-container-highest": "#e1e3e4",
                        "on-secondary-container": "#327053",
                        "tertiary": "#643e24",
                        "surface-bright": "#f8f9fa",
                        "on-secondary": "#ffffff",
                        "secondary": "#2b694d",
                        "inverse-on-surface": "#f0f1f2",
                        "surface": "#f8f9fa",
                        "outline": "#707973",
                        "on-tertiary": "#ffffff",
                        "secondary-container": "#b0f1cc",
                        "on-tertiary-fixed-variant": "#643e24",
                        "surface-container": "#edeeef",
                        "tertiary-fixed": "#ffdcc7",
                        "outline-variant": "#bfc9c1",
                        "error": "#ba1a1a",
                        "on-error-container": "#93000a",
                        "surface-container-lowest": "#ffffff",
                        "secondary-fixed": "#b0f1cc",
                        "tertiary-container": "#7f5539",
                        "on-surface": "#191c1d",
                        "primary": "#0f5238",
                        "error-container": "#ffdad6",
                        "on-error": "#ffffff",
                        "inverse-surface": "#2e3132",
                        "on-surface-variant": "#404943",
                        "on-primary-fixed": "#002114",
                        "secondary-fixed-dim": "#94d4b1",
                        "primary-fixed": "#b1f0ce",
                        "tertiary-fixed-dim": "#f2bb98",
                        "on-primary-fixed-variant": "#0e5138",
                        "background": "#f8f9fa",
                        "surface-container-high": "#e7e8e9",
                        "on-background": "#191c1d",
                        "primary-fixed-dim": "#95d4b3",
                        "surface-variant": "#e1e3e4",
                        "on-primary": "#ffffff",
                        "on-secondary-fixed": "#002113",
                        "primary-container": "#2d6a4f",
                        "on-primary-container": "#a8e7c5",
                        "surface-container-low": "#f3f4f5",
                        "inverse-primary": "#95d4b3",
                        "surface-dim": "#d9dadb"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "base": "8px",
                        "gutter": "20px",
                        "section-gap": "40px",
                        "container-margin": "24px",
                        "card-padding": "24px"
                    },
                    "fontFamily": {
                        "body-md": ["Manrope"],
                        "body-lg": ["Manrope"],
                        "headline-lg-mobile": ["Manrope"],
                        "headline-lg": ["Manrope"],
                        "label-caps": ["JetBrains Mono"],
                        "data-display": ["JetBrains Mono"],
                        "headline-md": ["Manrope"],
                        "headline-xl": ["Manrope"]
                    },
                    "fontSize": {
                        "body-md": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }],
                        "body-lg": ["18px", {
                            "lineHeight": "28px",
                            "fontWeight": "400"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "700"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "40px",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "700"
                        }],
                        "label-caps": ["12px", {
                            "lineHeight": "16px",
                            "letterSpacing": "0.05em",
                            "fontWeight": "600"
                        }],
                        "data-display": ["28px", {
                            "lineHeight": "32px",
                            "fontWeight": "500"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "600"
                        }],
                        "headline-xl": ["40px", {
                            "lineHeight": "48px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "800"
                        }]
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom scrollbar for webkit */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: theme('colors.surface-container-lowest');
        }

        ::-webkit-scrollbar-thumb {
            background: theme('colors.outline-variant');
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: theme('colors.outline');
        }
    </style>
</head>

<body class="bg-surface text-on-surface font-body-md antialiased selection:bg-primary/20 selection:text-primary">
    <div class="flex h-screen overflow-hidden">
        <!-- SideNavBar (Shared Component) -->
        <x-sidebar />
        <!-- Main Content Area -->
        <main class="md:ml-64 w-full flex-1 h-screen overflow-y-auto bg-surface p-container-margin">
            <div class="max-w-6xl mx-auto">
                <!-- Header Section -->
                <header class="flex flex-col md:flex-row md:justify-between md:items-end mb-section-gap gap-4">
                    <div>
                        <!-- Breadcrumbs -->
                        <nav aria-label="Breadcrumb"
                            class="flex items-center gap-2 text-on-surface-variant font-body-md text-body-md mb-2">
                            <a class="hover:text-primary transition-colors" href="#">Dashboard</a>
                            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                            <span aria-current="page" class="text-primary font-semibold">Siklus Tanam</span>
                        </nav>
                        <!-- Page Title -->
                        <h2 class="font-headline-xl text-headline-xl text-on-surface">Manajemen Siklus</h2>
                    </div>
                    <!-- Primary Action -->
                    <button
                        class="bg-primary text-on-primary font-body-md text-body-md px-6 py-3 rounded-xl shadow-sm hover:bg-primary/90 transition-all active:scale-95 flex items-center justify-center gap-2"
                        onclick="document.getElementById('addCycleModal').classList.remove('hidden')">
                        <span class="material-symbols-outlined text-[20px]">add</span>
                        Tambah Siklus
                    </button>
                </header>
                <!-- Data Table Card (Bento Style approach for list) -->
                <div
                    class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-surface-container-low border-b border-outline-variant/30">
                                <tr>
                                    <th
                                        class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider">
                                        ID Siklus</th>
                                    <th
                                        class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider">
                                        Blok Tanam</th>
                                    <th
                                        class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider">
                                        Tanggal Mulai</th>
                                    <th
                                        class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider">
                                        Jumlah Baglog</th>
                                    <th
                                        class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider">
                                        Estimasi Panen</th>
                                    <th
                                        class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider">
                                        Durasi Tanam</th>
                                    <th
                                        class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider">
                                        Total Panen (kg)</th>
                                    <th
                                        class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider text-right">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/20" id="siklusTableBody">
                                <!-- Data akan dimuat dengan JavaScript -->
                                <tr>
                                    <td colspan="9" class="px-6 py-5 text-center text-on-surface-variant">Memuat data...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="bg-surface-container-lowest border-t border-outline-variant/30 px-6 py-4 flex items-center justify-between">
                        <span class="font-body-md text-sm text-on-surface-variant" id="paginationInfo">Menampilkan 0 dari 0 siklus</span>
                        <div class="flex gap-2" id="paginationControls">
                            <!-- Pagination Buttons di generate lewat JS -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- Modal: Tambah Siklus -->
    <div aria-labelledby="modal-title" aria-modal="true"
        class="fixed inset-0 z-50 flex items-center justify-center bg-on-surface/40 backdrop-blur-sm hidden"
        id="addCycleModal" role="dialog">
        <!-- Modal Backdrop click to close -->
        <div class="absolute inset-0" onclick="document.getElementById('addCycleModal').classList.add('hidden')">
        </div>
        <!-- Modal Content -->
        <div
            class="relative bg-surface-container-lowest rounded-xl shadow-[0_8px_30px_rgb(45,106,79,0.12)] border border-outline-variant/20 w-full max-w-md p-6 transform transition-all">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-headline-md text-headline-md text-on-surface" id="modal-title">Tambah Siklus Baru</h3>
                <button
                    class="text-on-surface-variant hover:bg-error-container hover:text-on-error-container rounded-full p-1 transition-colors"
                    onclick="document.getElementById('addCycleModal').classList.add('hidden')" title="Tutup">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form class="space-y-5" onsubmit="submitForm(event)" id="addCycleForm">
                <!-- Date Input -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2"
                        for="startDate">Tanggal Mulai</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                        </span>
                        <input
                            class="w-full bg-surface border border-outline-variant/60 rounded-lg pl-10 pr-4 py-3 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all hover:border-outline"
                            id="startDate" name="startDate" required="" type="date" />
                    </div>
                </div>
                <!-- Blok Tanam Input -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2"
                        for="blokTanam">Blok Tanam</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">location_on</span>
                        </span>
                        <input
                            class="w-full bg-surface border border-outline-variant/60 rounded-lg pl-10 pr-4 py-3 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all hover:border-outline"
                            id="blokTanam" name="blokTanam" placeholder="Contoh: Blok A"
                            required="" type="text" />
                    </div>
                </div>
                <!-- Number Input -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2"
                        for="baglogCount">Jumlah Baglog (Unit)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">inventory_2</span>
                        </span>
                        <input
                            class="w-full bg-surface border border-outline-variant/60 rounded-lg pl-10 pr-4 py-3 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all hover:border-outline"
                            id="baglogCount" min="1" name="baglogCount" placeholder="Contoh: 1000"
                            required="" type="number" />
                    </div>
                    <p class="mt-1 font-body-md text-[12px] text-on-surface-variant">Masukkan total baglog yang
                        dimasukkan ke kumbung.</p>
                </div>
                <!-- Actions -->
                <div class="mt-8 flex justify-end gap-3 pt-4 border-t border-outline-variant/20">
                    <button
                        class="px-5 py-2.5 rounded-xl font-body-md text-body-md text-on-surface-variant border border-outline-variant hover:bg-surface-container-low hover:text-on-surface transition-colors"
                        onclick="document.getElementById('addCycleModal').classList.add('hidden')" type="button">
                        Batal
                    </button>
                    <button
                        class="px-5 py-2.5 rounded-xl font-body-md text-body-md bg-primary text-on-primary hover:bg-primary/90 shadow-sm transition-all active:scale-95"
                        type="submit">
                        Simpan Siklus
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: Edit Siklus -->
    <div aria-labelledby="edit-modal-title" aria-modal="true"
        class="fixed inset-0 z-50 flex items-center justify-center bg-on-surface/40 backdrop-blur-sm hidden"
        id="editCycleModal" role="dialog">
        <!-- Modal Backdrop click to close -->
        <div class="absolute inset-0" onclick="document.getElementById('editCycleModal').classList.add('hidden')"></div>
        <!-- Modal Content -->
        <div
            class="relative bg-surface-container-lowest rounded-xl shadow-[0_8px_30px_rgb(45,106,79,0.12)] border border-outline-variant/20 w-full max-w-md p-6 transform transition-all">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-headline-md text-headline-md text-on-surface" id="edit-modal-title">Edit Siklus</h3>
                <button
                    class="text-on-surface-variant hover:bg-error-container hover:text-on-error-container rounded-full p-1 transition-colors"
                    onclick="document.getElementById('editCycleModal').classList.add('hidden')" title="Tutup">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form class="space-y-5" onsubmit="submitEditForm(event)" id="editCycleForm">
                <input type="hidden" id="editSiklusId" />
                <!-- Date Input -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2"
                        for="editStartDate">Tanggal Mulai</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                        </span>
                        <input
                            class="w-full bg-surface border border-outline-variant/60 rounded-lg pl-10 pr-4 py-3 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all hover:border-outline"
                            id="editStartDate" name="editStartDate" required="" type="date" />
                    </div>
                </div>
                <!-- Blok Tanam Input -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2"
                        for="editBlokTanam">Blok Tanam</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">location_on</span>
                        </span>
                        <input
                            class="w-full bg-surface border border-outline-variant/60 rounded-lg pl-10 pr-4 py-3 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all hover:border-outline"
                            id="editBlokTanam" name="editBlokTanam" placeholder="Contoh: Blok A"
                            required="" type="text" />
                    </div>
                </div>
                <!-- Number Input -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2"
                        for="editBaglogCount">Jumlah Baglog (Unit)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">inventory_2</span>
                        </span>
                        <input
                            class="w-full bg-surface border border-outline-variant/60 rounded-lg pl-10 pr-4 py-3 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all hover:border-outline"
                            id="editBaglogCount" min="1" name="editBaglogCount" placeholder="Contoh: 1000"
                            required="" type="number" />
                    </div>
                    <p class="mt-1 font-body-md text-[12px] text-on-surface-variant">Masukkan total baglog yang
                        dimasukkan ke kumbung.</p>
                </div>
                <!-- Actions -->
                <div class="mt-8 flex justify-end gap-3 pt-4 border-t border-outline-variant/20">
                    <button
                        class="px-5 py-2.5 rounded-xl font-body-md text-body-md text-on-surface-variant border border-outline-variant hover:bg-surface-container-low hover:text-on-surface transition-colors"
                        onclick="document.getElementById('editCycleModal').classList.add('hidden')" type="button">
                        Batal
                    </button>
                    <button
                        class="px-5 py-2.5 rounded-xl font-body-md text-body-md bg-primary text-on-primary hover:bg-primary/90 shadow-sm transition-all active:scale-95"
                        type="submit">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: Konfirmasi Hapus Siklus -->
    <div aria-labelledby="delete-modal-title" aria-modal="true"
        class="fixed inset-0 z-50 flex items-center justify-center bg-on-surface/40 backdrop-blur-sm hidden"
        id="deleteCycleModal" role="dialog">
        <!-- Modal Backdrop click to close -->
        <div class="absolute inset-0" onclick="document.getElementById('deleteCycleModal').classList.add('hidden')"></div>
        <!-- Modal Content -->
        <div
            class="relative bg-surface-container-lowest rounded-xl shadow-[0_8px_30px_rgb(186,26,26,0.12)] border border-error/20 w-full max-w-sm p-6 transform transition-all">
            <div class="flex flex-col items-center text-center gap-4">
                <div class="w-14 h-14 rounded-full bg-error-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-[28px] text-on-error-container">warning</span>
                </div>
                <div>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-2" id="delete-modal-title">Hapus Siklus?</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Siklus <strong id="deleteSiklusLabel" class="text-on-surface"></strong> beserta semua data panen terkait akan dihapus permanen.</p>
                </div>
                <input type="hidden" id="deleteSiklusId" />
                <div class="flex gap-3 w-full pt-2">
                    <button
                        class="flex-1 px-5 py-2.5 rounded-xl font-body-md text-body-md text-on-surface-variant border border-outline-variant hover:bg-surface-container-low hover:text-on-surface transition-colors"
                        onclick="document.getElementById('deleteCycleModal').classList.add('hidden')" type="button">
                        Batal
                    </button>
                    <button
                        class="flex-1 px-5 py-2.5 rounded-xl font-body-md text-body-md bg-error text-on-error hover:bg-error/90 shadow-sm transition-all active:scale-95"
                        onclick="confirmDelete()" id="deleteConfirmBtn" type="button">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Script Integrasi Data Backend -->
    <script>
        let currentPage = 1;

        document.addEventListener('DOMContentLoaded', () => {
            fetchSiklus();
        });

        // 1. Fetch data dari /api/siklus
        async function fetchSiklus(page = 1) {
            currentPage = page;
            try {
                const response = await fetch(`/api/siklus?page=${page}`);
                const res = await response.json();
                
                if (res.status) {
                    renderTable(res.data.data);
                    renderPagination(res.data.meta);
                } else {
                    console.error('Gagal mengambil data:', res.message);
                }
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }

        // 2. Render Tabel Data
        function renderTable(data) {
            const tbody = document.getElementById('siklusTableBody');
            tbody.innerHTML = '';
            
            if (data.length === 0) {
                tbody.innerHTML = `<tr><td colspan="9" class="px-6 py-5 text-center text-on-surface-variant">Belum ada data siklus.</td></tr>`;
                return;
            }

            data.forEach((item, index) => {
                const row = document.createElement('tr');
                row.className = "hover:bg-surface-container-low/50 transition-colors group";
                
                const dateParts = new Date(item.tanggal_mulai).toLocaleDateString('id-ID', {day: '2-digit', month: 'short', year: 'numeric'});
                const estimasiFormatted = item.estimasi_panen ? new Date(item.estimasi_panen).toLocaleDateString('id-ID', {day: '2-digit', month: 'short', year: 'numeric'}) : '-';
                const durasi = item.durasi_tanam || 0;
                const durasiPersen = Math.min(Math.round((durasi / 40) * 100), 100);
                const durasiColor = durasi >= 40 ? 'bg-error' : durasi >= 30 ? 'bg-tertiary' : 'bg-secondary';
                
                // Status: durasi >= 40 hari = Selesai, else = Berjalan
                const isBerjalan = durasi < 40;
                const statusHtml = isBerjalan 
                    ? `<span class="inline-flex items-center gap-1.5 bg-secondary-container/50 border border-secondary/20 text-on-secondary-container px-3 py-1 rounded-full font-label-caps text-label-caps"><span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span> Berjalan</span>`
                    : `<span class="inline-flex items-center gap-1.5 bg-surface-container-high text-on-surface-variant px-3 py-1 rounded-full font-label-caps text-label-caps"><span class="material-symbols-outlined text-[14px]">check_circle</span> Selesai</span>`;

                row.innerHTML = `
                    <td class="px-6 py-5">
                        <div class="font-data-display text-[18px] ${isBerjalan ? 'text-primary font-semibold' : 'text-on-surface-variant'}">CYC-00${item.id}</div>
                    </td>
                    <td class="px-6 py-5 font-body-md text-body-md ${isBerjalan ? 'text-on-surface' : 'text-on-surface-variant'}">
                        <span class="inline-flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px]">location_on</span>${item.blok_tanam || '-'}</span>
                    </td>
                    <td class="px-6 py-5 font-body-md text-body-md ${isBerjalan ? 'text-on-surface' : 'text-on-surface-variant'}">${dateParts}</td>
                    <td class="px-6 py-5 font-body-md text-body-md ${isBerjalan ? 'text-on-surface' : 'text-on-surface-variant'}">${Number(item.jumlah_backlog).toLocaleString('id-ID')}</td>
                    <td class="px-6 py-5 font-body-md text-body-md ${isBerjalan ? 'text-on-surface' : 'text-on-surface-variant'}">${estimasiFormatted}</td>
                    <td class="px-6 py-5">
                        <div class="flex flex-col gap-1">
                            <span class="font-label-caps text-[11px] ${isBerjalan ? 'text-on-surface' : 'text-on-surface-variant'}">${durasi} / 40 hari</span>
                            <div class="w-full bg-surface-container-high rounded-full h-1.5 overflow-hidden">
                                <div class="${durasiColor} h-full rounded-full transition-all" style="width: ${durasiPersen}%"></div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-5 font-body-md text-body-md ${isBerjalan ? 'text-on-surface' : 'text-on-surface-variant'}">${item.total_panen || 0} <span class="text-sm border-none">kg</span></td>
                    <td class="px-6 py-5">${statusHtml}</td>
                    <td class="px-6 py-5 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-on-surface-variant hover:text-primary transition-colors p-1 rounded-md hover:bg-surface-container-high" title="Edit Siklus" onclick="openEditModal(${JSON.stringify(item).replace(/"/g, '&quot;')})">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                            </button>
                            <button class="text-on-surface-variant hover:text-error transition-colors p-1 rounded-md hover:bg-error-container" title="Hapus Siklus" onclick="openDeleteModal(${item.id}, 'CYC-00${item.id}')">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                        </div>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }

        // 3. Render Pagination
        function renderPagination(meta) {
            if(!meta) return;

            const { current_page, last_page, total, from, to } = meta;
            
            document.getElementById('paginationInfo').innerText = `Menampilkan ${from || 0}-${to || 0} dari ${total || 0} siklus`;
            
            const controls = document.getElementById('paginationControls');
            controls.innerHTML = `
                <button onclick="fetchSiklus(${current_page - 1})" ${current_page <= 1 ? 'disabled' : ''} class="p-2 rounded-lg border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low disabled:opacity-50 transition-colors">
                    <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                </button>
                <button onclick="fetchSiklus(${current_page + 1})" ${current_page >= last_page ? 'disabled' : ''} class="p-2 rounded-lg border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low disabled:opacity-50 transition-colors">
                    <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                </button>
            `;
        }

        // 4. Submit Form POST (Tambah Siklus)
        async function submitForm(e) {
            e.preventDefault();
            
            const startDate = document.getElementById('startDate').value;
            const baglogCount = document.getElementById('baglogCount').value;
            const blokTanam = document.getElementById('blokTanam').value;
            const submitBtn = e.target.querySelector('button[type="submit"]');

            const payload = {
                tanggal_mulai: startDate,
                jumlah_backlog: parseInt(baglogCount, 10),
                blok_tanam: blokTanam
            };

            try {
                submitBtn.innerText = 'Mengirim...';
                submitBtn.disabled = true;

                const response = await fetch('/api/siklus', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const res = await response.json();

                if(response.ok && res.status) {
                    // Berhasil simpan
                    document.getElementById('addCycleModal').classList.add('hidden');
                    document.getElementById('addCycleForm').reset();
                    fetchSiklus(1); // Refresh ke halaman 1
                } else {
                    alert('Gagal: ' + (res.message || 'Harap periksa input Anda.'));
                }
            } catch (error) {
                console.error('Error submitting form:', error);
                alert('Terjadi kesalahan pada server.');
            } finally {
                submitBtn.innerText = 'Simpan Siklus';
                submitBtn.disabled = false;
            }
        }

        // 5. Open Edit Modal (pre-fill form)
        function openEditModal(item) {
            document.getElementById('editSiklusId').value = item.id;
            document.getElementById('editStartDate').value = item.tanggal_mulai;
            document.getElementById('editBlokTanam').value = item.blok_tanam || '';
            document.getElementById('editBaglogCount').value = item.jumlah_backlog;
            document.getElementById('editCycleModal').classList.remove('hidden');
        }

        // 6. Submit Edit Form PUT
        async function submitEditForm(e) {
            e.preventDefault();

            const id = document.getElementById('editSiklusId').value;
            const startDate = document.getElementById('editStartDate').value;
            const blokTanam = document.getElementById('editBlokTanam').value;
            const baglogCount = document.getElementById('editBaglogCount').value;
            const submitBtn = e.target.querySelector('button[type="submit"]');

            const payload = {
                tanggal_mulai: startDate,
                jumlah_backlog: parseInt(baglogCount, 10),
                blok_tanam: blokTanam
            };

            try {
                submitBtn.innerText = 'Menyimpan...';
                submitBtn.disabled = true;

                const response = await fetch(`/api/siklus/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const res = await response.json();

                if (response.ok && res.status) {
                    document.getElementById('editCycleModal').classList.add('hidden');
                    fetchSiklus(currentPage); // Refresh halaman saat ini
                } else {
                    alert('Gagal: ' + (res.message || 'Harap periksa input Anda.'));
                }
            } catch (error) {
                console.error('Error updating siklus:', error);
                alert('Terjadi kesalahan pada server.');
            } finally {
                submitBtn.innerText = 'Simpan Perubahan';
                submitBtn.disabled = false;
            }
        }

        // 7. Open Delete Confirmation Modal
        function openDeleteModal(id, label) {
            document.getElementById('deleteSiklusId').value = id;
            document.getElementById('deleteSiklusLabel').innerText = label;
            document.getElementById('deleteCycleModal').classList.remove('hidden');
        }

        // 8. Confirm Delete (DELETE request)
        async function confirmDelete() {
            const id = document.getElementById('deleteSiklusId').value;
            const deleteBtn = document.getElementById('deleteConfirmBtn');

            try {
                deleteBtn.innerText = 'Menghapus...';
                deleteBtn.disabled = true;

                const response = await fetch(`/api/siklus/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                const res = await response.json();

                if (response.ok && res.status) {
                    document.getElementById('deleteCycleModal').classList.add('hidden');
                    fetchSiklus(currentPage); // Refresh halaman saat ini
                } else {
                    alert('Gagal: ' + (res.message || 'Tidak dapat menghapus siklus.'));
                }
            } catch (error) {
                console.error('Error deleting siklus:', error);
                alert('Terjadi kesalahan pada server.');
            } finally {
                deleteBtn.innerText = 'Hapus';
                deleteBtn.disabled = false;
            }
        }
    </script>
</body>

</html>
