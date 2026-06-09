<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Riwayat Panen - Kumbung IoT</title>
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
                            <a class="hover:text-primary transition-colors" href="/">Dashboard</a>
                            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
                            <span aria-current="page" class="text-primary font-semibold">Riwayat Panen</span>
                        </nav>
                        <!-- Page Title -->
                        <h2 class="font-headline-xl text-headline-xl text-on-surface">Riwayat Panen</h2>
                    </div>
                    <!-- Primary Action -->
                    <button
                        class="bg-primary text-on-primary font-body-md text-body-md px-6 py-3 rounded-xl shadow-sm hover:bg-primary/90 transition-all active:scale-95 flex items-center justify-center gap-2"
                        onclick="openAddModal()">
                        <span class="material-symbols-outlined text-[20px]">add</span>
                        Catat Panen
                    </button>
                </header>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Total Panen -->
                    <div
                        class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-card-padding relative overflow-hidden group hover:border-secondary/30 transition-colors">
                        <div
                            class="absolute -right-4 -top-4 w-24 h-24 bg-secondary-container/20 rounded-full blur-2xl group-hover:bg-secondary-container/40 transition-all">
                        </div>
                        <span class="font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider block mb-3">Total Panen</span>
                        <div class="flex items-baseline gap-2">
                            <span class="font-data-display text-[36px] font-semibold text-primary leading-none" id="statTotalPanen">—</span>
                            <span class="font-body-md text-on-surface-variant font-semibold">Kg</span>
                        </div>
                    </div>
                    <!-- Jumlah Record -->
                    <div
                        class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-card-padding relative overflow-hidden group hover:border-secondary/30 transition-colors">
                        <div
                            class="absolute -right-4 -top-4 w-24 h-24 bg-primary-fixed/20 rounded-full blur-2xl group-hover:bg-primary-fixed/40 transition-all">
                        </div>
                        <span class="font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider block mb-3">Jumlah Record</span>
                        <div class="flex items-baseline gap-2">
                            <span class="font-data-display text-[36px] font-semibold text-on-surface leading-none" id="statTotalRecord">—</span>
                            <span class="font-body-md text-on-surface-variant font-semibold">kali panen</span>
                        </div>
                    </div>
                    <!-- Rata-rata -->
                    <div
                        class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm p-card-padding relative overflow-hidden group hover:border-secondary/30 transition-colors">
                        <div
                            class="absolute -right-4 -top-4 w-24 h-24 bg-tertiary-fixed/20 rounded-full blur-2xl group-hover:bg-tertiary-fixed/40 transition-all">
                        </div>
                        <span class="font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider block mb-3">Rata-rata / Panen</span>
                        <div class="flex items-baseline gap-2">
                            <span class="font-data-display text-[36px] font-semibold text-tertiary leading-none" id="statAvgPanen">—</span>
                            <span class="font-body-md text-on-surface-variant font-semibold">Kg</span>
                        </div>
                    </div>
                </div>

                <!-- Data Table Card -->
                <div
                    class="bg-surface-container-lowest rounded-xl border border-outline-variant/30 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead class="bg-surface-container-low border-b border-outline-variant/30">
                                <tr>
                                    <th
                                        class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider">
                                        Tanggal Panen</th>
                                    <th
                                        class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider">
                                        ID Siklus</th>
                                    <th
                                        class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider text-right">
                                        Jumlah (Kg)</th>
                                    <th
                                        class="px-6 py-4 font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider text-right">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-outline-variant/20" id="panenTableBody">
                                <tr>
                                    <td colspan="4" class="px-6 py-5 text-center text-on-surface-variant">Memuat data...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <div class="bg-surface-container-lowest border-t border-outline-variant/30 px-6 py-4 flex items-center justify-between">
                        <span class="font-body-md text-sm text-on-surface-variant" id="paginationInfo">Menampilkan 0 dari 0 data</span>
                        <div class="flex gap-2" id="paginationControls">
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal: Tambah Panen -->
    <div aria-labelledby="add-modal-title" aria-modal="true"
        class="fixed inset-0 z-50 flex items-center justify-center bg-on-surface/40 backdrop-blur-sm hidden"
        id="addPanenModal" role="dialog">
        <div class="absolute inset-0" onclick="document.getElementById('addPanenModal').classList.add('hidden')"></div>
        <div
            class="relative bg-surface-container-lowest rounded-xl shadow-[0_8px_30px_rgb(45,106,79,0.12)] border border-outline-variant/20 w-full max-w-md p-6 transform transition-all">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-headline-md text-headline-md text-on-surface" id="add-modal-title">Catat Panen Baru</h3>
                <button
                    class="text-on-surface-variant hover:bg-error-container hover:text-on-error-container rounded-full p-1 transition-colors"
                    onclick="document.getElementById('addPanenModal').classList.add('hidden')" title="Tutup">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form class="space-y-5" onsubmit="submitAddForm(event)" id="addPanenForm">
                <!-- Siklus Dropdown -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2"
                        for="addSiklusId">Siklus Tanam</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">potted_plant</span>
                        </span>
                        <select
                            class="w-full bg-surface border border-outline-variant/60 rounded-lg pl-10 pr-4 py-3 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all hover:border-outline appearance-none"
                            id="addSiklusId" required="">
                            <option value="">Memuat siklus...</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[20px]">expand_more</span>
                    </div>
                </div>
                <!-- Date Input -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2"
                        for="addTanggalPanen">Tanggal Panen</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                        </span>
                        <input
                            class="w-full bg-surface border border-outline-variant/60 rounded-lg pl-10 pr-4 py-3 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all hover:border-outline"
                            id="addTanggalPanen" required="" type="date" />
                    </div>
                </div>
                <!-- Amount Input -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2"
                        for="addJumlahPanen">Jumlah Panen (Kg)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">scale</span>
                        </span>
                        <input
                            class="w-full bg-surface border border-outline-variant/60 rounded-lg pl-10 pr-4 py-3 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all hover:border-outline"
                            id="addJumlahPanen" min="1" placeholder="Contoh: 50"
                            required="" type="number" />
                    </div>
                    <p class="mt-1 font-body-md text-[12px] text-on-surface-variant">Masukkan hasil panen dalam kilogram.</p>
                </div>
                <!-- Actions -->
                <div class="mt-8 flex justify-end gap-3 pt-4 border-t border-outline-variant/20">
                    <button
                        class="px-5 py-2.5 rounded-xl font-body-md text-body-md text-on-surface-variant border border-outline-variant hover:bg-surface-container-low hover:text-on-surface transition-colors"
                        onclick="document.getElementById('addPanenModal').classList.add('hidden')" type="button">
                        Batal
                    </button>
                    <button
                        class="px-5 py-2.5 rounded-xl font-body-md text-body-md bg-primary text-on-primary hover:bg-primary/90 shadow-sm transition-all active:scale-95"
                        type="submit">
                        Simpan Panen
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: Edit Panen -->
    <div aria-labelledby="edit-modal-title" aria-modal="true"
        class="fixed inset-0 z-50 flex items-center justify-center bg-on-surface/40 backdrop-blur-sm hidden"
        id="editPanenModal" role="dialog">
        <div class="absolute inset-0" onclick="document.getElementById('editPanenModal').classList.add('hidden')"></div>
        <div
            class="relative bg-surface-container-lowest rounded-xl shadow-[0_8px_30px_rgb(45,106,79,0.12)] border border-outline-variant/20 w-full max-w-md p-6 transform transition-all">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-headline-md text-headline-md text-on-surface" id="edit-modal-title">Edit Data Panen</h3>
                <button
                    class="text-on-surface-variant hover:bg-error-container hover:text-on-error-container rounded-full p-1 transition-colors"
                    onclick="document.getElementById('editPanenModal').classList.add('hidden')" title="Tutup">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form class="space-y-5" onsubmit="submitEditForm(event)" id="editPanenForm">
                <input type="hidden" id="editPanenId" />
                <!-- Siklus Dropdown -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2"
                        for="editSiklusId">Siklus Tanam</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">potted_plant</span>
                        </span>
                        <select
                            class="w-full bg-surface border border-outline-variant/60 rounded-lg pl-10 pr-4 py-3 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all hover:border-outline appearance-none"
                            id="editSiklusId" required="">
                            <option value="">Memuat siklus...</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none text-[20px]">expand_more</span>
                    </div>
                </div>
                <!-- Date Input -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2"
                        for="editTanggalPanen">Tanggal Panen</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                        </span>
                        <input
                            class="w-full bg-surface border border-outline-variant/60 rounded-lg pl-10 pr-4 py-3 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all hover:border-outline"
                            id="editTanggalPanen" required="" type="date" />
                    </div>
                </div>
                <!-- Amount Input -->
                <div>
                    <label class="block font-label-caps text-label-caps text-on-surface-variant mb-2"
                        for="editJumlahPanen">Jumlah Panen (Kg)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-on-surface-variant">
                            <span class="material-symbols-outlined text-[20px]">scale</span>
                        </span>
                        <input
                            class="w-full bg-surface border border-outline-variant/60 rounded-lg pl-10 pr-4 py-3 font-body-md text-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all hover:border-outline"
                            id="editJumlahPanen" min="1" placeholder="Contoh: 50"
                            required="" type="number" />
                    </div>
                </div>
                <!-- Actions -->
                <div class="mt-8 flex justify-end gap-3 pt-4 border-t border-outline-variant/20">
                    <button
                        class="px-5 py-2.5 rounded-xl font-body-md text-body-md text-on-surface-variant border border-outline-variant hover:bg-surface-container-low hover:text-on-surface transition-colors"
                        onclick="document.getElementById('editPanenModal').classList.add('hidden')" type="button">
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

    <!-- Modal: Konfirmasi Hapus Panen -->
    <div aria-labelledby="delete-modal-title" aria-modal="true"
        class="fixed inset-0 z-50 flex items-center justify-center bg-on-surface/40 backdrop-blur-sm hidden"
        id="deletePanenModal" role="dialog">
        <div class="absolute inset-0" onclick="document.getElementById('deletePanenModal').classList.add('hidden')"></div>
        <div
            class="relative bg-surface-container-lowest rounded-xl shadow-[0_8px_30px_rgb(186,26,26,0.12)] border border-error/20 w-full max-w-sm p-6 transform transition-all">
            <div class="flex flex-col items-center text-center gap-4">
                <div class="w-14 h-14 rounded-full bg-error-container flex items-center justify-center">
                    <span class="material-symbols-outlined text-[28px] text-on-error-container">warning</span>
                </div>
                <div>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-2" id="delete-modal-title">Hapus Data Panen?</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">Data panen pada tanggal <strong id="deletePanenLabel" class="text-on-surface"></strong> akan dihapus permanen.</p>
                </div>
                <input type="hidden" id="deletePanenId" />
                <div class="flex gap-3 w-full pt-2">
                    <button
                        class="flex-1 px-5 py-2.5 rounded-xl font-body-md text-body-md text-on-surface-variant border border-outline-variant hover:bg-surface-container-low hover:text-on-surface transition-colors"
                        onclick="document.getElementById('deletePanenModal').classList.add('hidden')" type="button">
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
        let allPanenData = []; // cache for stats calculation

        document.addEventListener('DOMContentLoaded', () => {
            fetchPanen();
            loadSiklusOptions('addSiklusId');
            loadSiklusOptions('editSiklusId');
        });

        // ─── Fetch Siklus for Dropdown ────────────────────────────────────────
        async function loadSiklusOptions(selectId) {
            try {
                const response = await fetch('/api/siklus?page=1');
                const res = await response.json();

                if (res.status) {
                    const items = res.data.data;
                    const select = document.getElementById(selectId);
                    select.innerHTML = '<option value="">-- Pilih Siklus --</option>';

                    items.forEach(item => {
                        const opt = document.createElement('option');
                        opt.value = item.id;
                        const date = new Date(item.tanggal_mulai).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
                        opt.textContent = `CYC-00${item.id} — ${date} (${Number(item.jumlah_backlog).toLocaleString('id-ID')} baglog)`;
                        select.appendChild(opt);
                    });
                }
            } catch (error) {
                console.error('Error loading siklus options:', error);
            }
        }

        // ─── 1. Fetch Panen Data ──────────────────────────────────────────────
        async function fetchPanen(page = 1) {
            currentPage = page;
            try {
                const response = await fetch(`/api/panen?page=${page}`);
                const res = await response.json();

                if (res.status) {
                    const items = res.data.data;
                    allPanenData = items;
                    renderTable(items);
                    renderPagination(res.data.meta);
                    updateStats(items, res.data.meta);
                } else {
                    console.error('Gagal mengambil data:', res.message);
                }
            } catch (error) {
                console.error('Error fetching panen:', error);
            }
        }

        // ─── 2. Render Table ──────────────────────────────────────────────────
        function renderTable(data) {
            const tbody = document.getElementById('panenTableBody');
            tbody.innerHTML = '';

            if (!data || data.length === 0) {
                tbody.innerHTML = `<tr><td colspan="4" class="px-6 py-5 text-center text-on-surface-variant">Belum ada data panen.</td></tr>`;
                return;
            }

            data.forEach(item => {
                const row = document.createElement('tr');
                row.className = "hover:bg-surface-container-low/50 transition-colors group";

                const dateFormatted = new Date(item.tanggal_panen).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
                const siklusLabel = item.siklus ? `CYC-00${item.siklus.id}` : `CYC-00${item.siklus_id}`;

                row.innerHTML = `
                    <td class="px-6 py-5 font-body-md text-body-md text-on-surface font-semibold">${dateFormatted}</td>
                    <td class="px-6 py-5 font-body-md text-body-md text-on-surface-variant">${siklusLabel}</td>
                    <td class="px-6 py-5 font-data-display text-[20px] text-primary text-right font-semibold">${Number(item.jumlah_panen).toLocaleString('id-ID')}</td>
                    <td class="px-6 py-5 text-right">
                        <div class="flex justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-on-surface-variant hover:text-primary transition-colors p-1 rounded-md hover:bg-surface-container-high" title="Edit Panen" onclick="openEditModal(${JSON.stringify(item).replace(/"/g, '&quot;')})">
                                <span class="material-symbols-outlined text-[20px]">edit</span>
                            </button>
                            <button class="text-on-surface-variant hover:text-error transition-colors p-1 rounded-md hover:bg-error-container" title="Hapus Panen" onclick="openDeleteModal(${item.id}, '${dateFormatted}')">
                                <span class="material-symbols-outlined text-[20px]">delete</span>
                            </button>
                        </div>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }

        // ─── 3. Render Pagination ─────────────────────────────────────────────
        function renderPagination(meta) {
            if (!meta) return;

            const { current_page, last_page, total, from, to } = meta;

            document.getElementById('paginationInfo').innerText = `Menampilkan ${from || 0}-${to || 0} dari ${total || 0} data`;

            const controls = document.getElementById('paginationControls');
            controls.innerHTML = `
                <button onclick="fetchPanen(${current_page - 1})" ${current_page <= 1 ? 'disabled' : ''} class="p-2 rounded-lg border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low disabled:opacity-50 transition-colors">
                    <span class="material-symbols-outlined text-[20px]">chevron_left</span>
                </button>
                <button onclick="fetchPanen(${current_page + 1})" ${current_page >= last_page ? 'disabled' : ''} class="p-2 rounded-lg border border-outline-variant/50 text-on-surface-variant hover:bg-surface-container-low disabled:opacity-50 transition-colors">
                    <span class="material-symbols-outlined text-[20px]">chevron_right</span>
                </button>
            `;
        }

        // ─── 4. Update Stats Cards ────────────────────────────────────────────
        function updateStats(data, meta) {
            const total = meta ? meta.total : data.length;
            const totalPanen = data.reduce((sum, item) => sum + (item.jumlah_panen || 0), 0);
            const avg = data.length > 0 ? Math.round(totalPanen / data.length) : 0;

            document.getElementById('statTotalPanen').innerText = Number(totalPanen).toLocaleString('id-ID');
            document.getElementById('statTotalRecord').innerText = total;
            document.getElementById('statAvgPanen').innerText = Number(avg).toLocaleString('id-ID');
        }

        // ─── 5. Open Add Modal ────────────────────────────────────────────────
        function openAddModal() {
            document.getElementById('addPanenForm').reset();
            document.getElementById('addPanenModal').classList.remove('hidden');
        }

        // ─── 6. Submit Add Form (POST) ────────────────────────────────────────
        async function submitAddForm(e) {
            e.preventDefault();

            const siklusId = document.getElementById('addSiklusId').value;
            const tanggalPanen = document.getElementById('addTanggalPanen').value;
            const jumlahPanen = document.getElementById('addJumlahPanen').value;
            const submitBtn = e.target.querySelector('button[type="submit"]');

            const payload = {
                siklus_id: parseInt(siklusId, 10),
                tanggal_panen: tanggalPanen,
                jumlah_panen: parseInt(jumlahPanen, 10)
            };

            try {
                submitBtn.innerText = 'Mengirim...';
                submitBtn.disabled = true;

                const response = await fetch('/api/panen', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const res = await response.json();

                if (response.ok && res.status) {
                    document.getElementById('addPanenModal').classList.add('hidden');
                    document.getElementById('addPanenForm').reset();
                    fetchPanen(1);
                } else {
                    alert('Gagal: ' + (res.message || 'Harap periksa input Anda.'));
                }
            } catch (error) {
                console.error('Error creating panen:', error);
                alert('Terjadi kesalahan pada server.');
            } finally {
                submitBtn.innerText = 'Simpan Panen';
                submitBtn.disabled = false;
            }
        }

        // ─── 7. Open Edit Modal ───────────────────────────────────────────────
        function openEditModal(item) {
            document.getElementById('editPanenId').value = item.id;
            document.getElementById('editSiklusId').value = item.siklus_id;
            document.getElementById('editTanggalPanen').value = item.tanggal_panen;
            document.getElementById('editJumlahPanen').value = item.jumlah_panen;
            document.getElementById('editPanenModal').classList.remove('hidden');
        }

        // ─── 8. Submit Edit Form (PUT) ────────────────────────────────────────
        async function submitEditForm(e) {
            e.preventDefault();

            const id = document.getElementById('editPanenId').value;
            const siklusId = document.getElementById('editSiklusId').value;
            const tanggalPanen = document.getElementById('editTanggalPanen').value;
            const jumlahPanen = document.getElementById('editJumlahPanen').value;
            const submitBtn = e.target.querySelector('button[type="submit"]');

            const payload = {
                siklus_id: parseInt(siklusId, 10),
                tanggal_panen: tanggalPanen,
                jumlah_panen: parseInt(jumlahPanen, 10)
            };

            try {
                submitBtn.innerText = 'Menyimpan...';
                submitBtn.disabled = true;

                const response = await fetch(`/api/panen/${id}`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(payload)
                });

                const res = await response.json();

                if (response.ok && res.status) {
                    document.getElementById('editPanenModal').classList.add('hidden');
                    fetchPanen(currentPage);
                } else {
                    alert('Gagal: ' + (res.message || 'Harap periksa input Anda.'));
                }
            } catch (error) {
                console.error('Error updating panen:', error);
                alert('Terjadi kesalahan pada server.');
            } finally {
                submitBtn.innerText = 'Simpan Perubahan';
                submitBtn.disabled = false;
            }
        }

        // ─── 9. Open Delete Modal ─────────────────────────────────────────────
        function openDeleteModal(id, label) {
            document.getElementById('deletePanenId').value = id;
            document.getElementById('deletePanenLabel').innerText = label;
            document.getElementById('deletePanenModal').classList.remove('hidden');
        }

        // ─── 10. Confirm Delete (DELETE) ──────────────────────────────────────
        async function confirmDelete() {
            const id = document.getElementById('deletePanenId').value;
            const deleteBtn = document.getElementById('deleteConfirmBtn');

            try {
                deleteBtn.innerText = 'Menghapus...';
                deleteBtn.disabled = true;

                const response = await fetch(`/api/panen/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                const res = await response.json();

                if (response.ok && res.status) {
                    document.getElementById('deletePanenModal').classList.add('hidden');
                    fetchPanen(currentPage);
                } else {
                    alert('Gagal: ' + (res.message || 'Tidak dapat menghapus data.'));
                }
            } catch (error) {
                console.error('Error deleting panen:', error);
                alert('Terjadi kesalahan pada server.');
            } finally {
                deleteBtn.innerText = 'Hapus';
                deleteBtn.disabled = false;
            }
        }
    </script>
</body>

</html>
