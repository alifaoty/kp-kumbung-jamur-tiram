<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Mushroom Monitor Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600&amp;family=Manrope:wght@400;600;700;800&amp;display=swap"
        rel="stylesheet" />
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
                        "body-md": [
                            "Manrope"
                        ],
                        "body-lg": [
                            "Manrope"
                        ],
                        "headline-lg-mobile": [
                            "Manrope"
                        ],
                        "headline-lg": [
                            "Manrope"
                        ],
                        "label-caps": [
                            "JetBrains Mono"
                        ],
                        "data-display": [
                            "JetBrains Mono"
                        ],
                        "headline-md": [
                            "Manrope"
                        ],
                        "headline-xl": [
                            "Manrope"
                        ]
                    },
                    "fontSize": {
                        "body-md": [
                            "16px",
                            {
                                "lineHeight": "24px",
                                "fontWeight": "400"
                            }
                        ],
                        "body-lg": [
                            "18px",
                            {
                                "lineHeight": "28px",
                                "fontWeight": "400"
                            }
                        ],
                        "headline-lg-mobile": [
                            "24px",
                            {
                                "lineHeight": "32px",
                                "fontWeight": "700"
                            }
                        ],
                        "headline-lg": [
                            "32px",
                            {
                                "lineHeight": "40px",
                                "letterSpacing": "-0.01em",
                                "fontWeight": "700"
                            }
                        ],
                        "label-caps": [
                            "12px",
                            {
                                "lineHeight": "16px",
                                "letterSpacing": "0.05em",
                                "fontWeight": "600"
                            }
                        ],
                        "data-display": [
                            "28px",
                            {
                                "lineHeight": "32px",
                                "fontWeight": "500"
                            }
                        ],
                        "headline-md": [
                            "24px",
                            {
                                "lineHeight": "32px",
                                "fontWeight": "600"
                            }
                        ],
                        "headline-xl": [
                            "40px",
                            {
                                "lineHeight": "48px",
                                "letterSpacing": "-0.02em",
                                "fontWeight": "800"
                            }
                        ]
                    }
                },
            },
        }
    </script>
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        .soft-shadow {
            box-shadow: 0px 4px 20px rgba(45, 106, 79, 0.05);
        }

        .pulse-ring {
            animation: pulse-ring 2s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(0.8);
                opacity: 1;
            }

            100% {
                transform: scale(2.5);
                opacity: 0;
            }
        }
    </style>
</head>

<body
    class="bg-surface text-on-surface font-body-md h-screen overflow-hidden flex selection:bg-primary-container selection:text-on-primary-container">
    <!-- SideNavBar -->
    <x-sidebar />
    <!-- TopNavBar (Mobile Only) -->
    <header
        class="flex md:hidden justify-between items-center px-4 py-3 w-full sticky top-0 z-50 bg-surface text-primary font-body-md text-body-md shadow-sm border-b-0 border-transparent bg-surface-container-low">
        <div class="font-headline-md text-headline-md font-bold text-primary">Mushroom Monitor</div>
        <div class="flex items-center gap-4">
            <button
                class="text-on-surface-variant hover:bg-surface-container-high p-2 rounded-full transition-colors active:scale-95">
                <span class="material-symbols-outlined">notifications</span>
            </button>
            <button
                class="text-on-surface-variant hover:bg-surface-container-high p-2 rounded-full transition-colors active:scale-95">
                <span class="material-symbols-outlined">account_circle</span>
            </button>
        </div>
    </header>
    <!-- Main Content Area -->
    <main class="flex-grow md:ml-64 h-full overflow-y-auto bg-background relative pt-4 md:pt-0">
        <!-- Ambient Background Glows -->
        <div
            class="absolute top-0 left-1/4 w-[500px] h-[500px] bg-secondary-container/20 rounded-full blur-[100px] pointer-events-none">
        </div>
        <div
            class="absolute bottom-0 right-1/4 w-[400px] h-[400px] bg-tertiary-container/10 rounded-full blur-[80px] pointer-events-none">
        </div>
        <div class="max-w-[1400px] mx-auto px-4 md:px-container-margin py-6 relative z-10">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-section-gap gap-4">
                <div>
                    <nav aria-label="Breadcrumb" class="flex text-sm text-on-surface-variant mb-2">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a class="inline-flex items-center hover:text-primary transition-colors"
                                    href="/">Home</a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <span class="material-symbols-outlined text-sm mx-1">chevron_right</span>
                                    <span class="text-on-surface">Dashboard</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    <h2 class="font-headline-xl text-headline-xl text-on-surface">Overview</h2>
                </div>
                <!-- Quick Actions / Filters -->
                <div class="flex items-center gap-3">
                    <span
                        class="px-3 py-1.5 rounded-full bg-secondary text-on-secondary font-label-caps text-label-caps shadow-sm">Oyster</span>
                    <span
                        class="px-3 py-1.5 rounded-full bg-surface-container text-on-surface-variant font-label-caps text-label-caps hover:bg-surface-container-high cursor-pointer transition-colors">Ear
                        Mushroom</span>
                </div>
            </div>
            <!-- Bento Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-gutter mb-section-gap">
                <!-- Temperature Card (DYNAMIC) -->
                <div
                    class="md:col-span-3 bg-surface-container-lowest rounded-xl p-card-padding soft-shadow hover:shadow-md transition-shadow relative overflow-hidden group cursor-pointer border border-transparent hover:border-secondary">
                    <div class="flex justify-between items-start mb-4">
                        <span
                            class="font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider">Temperature</span>
                        <div
                            class="w-8 h-8 rounded-full bg-secondary-container flex items-center justify-center text-on-secondary-container group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-sm">thermostat</span>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="font-data-display text-data-display text-on-surface" id="sensorSuhu">—</span>
                        <span class="font-body-lg text-body-lg text-on-surface-variant">°C</span>
                    </div>
                    <!-- Decorative Sparkline Placeholder -->
                    <div class="absolute bottom-0 left-0 w-full h-12 opacity-30">
                        <svg class="w-full h-full stroke-primary fill-none stroke-2" preserveaspectratio="none"
                            viewbox="0 0 100 30">
                            <path d="M0,20 Q10,15 20,22 T40,18 T60,25 T80,15 T100,20"></path>
                        </svg>
                    </div>
                </div>
                <!-- Humidity Card (DYNAMIC) -->
                <div
                    class="md:col-span-3 bg-surface-container-lowest rounded-xl p-card-padding soft-shadow hover:shadow-md transition-shadow relative overflow-hidden group cursor-pointer border border-transparent hover:border-secondary">
                    <div class="flex justify-between items-start mb-4">
                        <span
                            class="font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider">Humidity</span>
                        <div
                            class="w-8 h-8 rounded-full bg-primary-container flex items-center justify-center text-on-primary-container group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-sm">humidity_mid</span>
                        </div>
                    </div>
                    <div class="flex items-baseline gap-2">
                        <span class="font-data-display text-data-display text-on-surface" id="sensorKelembapan">—</span>
                        <span class="font-body-lg text-body-lg text-on-surface-variant">%</span>
                    </div>
                    <!-- Decorative Sparkline Placeholder -->
                    <div class="absolute bottom-0 left-0 w-full h-12 opacity-30">
                        <svg class="w-full h-full stroke-secondary fill-none stroke-2" preserveaspectratio="none"
                            viewbox="0 0 100 30">
                            <path d="M0,10 Q20,25 40,15 T70,20 T100,5"></path>
                        </svg>
                    </div>
                </div>
                <!-- Actuator Status (DYNAMIC) -->
                <div
                    class="md:col-span-6 bg-surface-container-lowest rounded-xl p-card-padding soft-shadow relative overflow-hidden flex items-center justify-between border-l-4"
                    id="actuatorCard">
                    <div class="z-10">
                        <span
                            class="font-label-caps text-label-caps text-on-surface-variant uppercase tracking-wider block mb-2">Actuator
                            Status</span>
                        <h3 class="font-headline-md text-headline-md text-on-surface" id="actuatorTitle">Water Misting —</h3>
                        <p class="font-body-md text-body-md text-on-surface-variant mt-1" id="actuatorDesc">Memuat status aktuator...</p>
                    </div>
                    <div class="relative w-16 h-16 flex items-center justify-center z-10 shrink-0" id="actuatorIconWrap">
                        <div class="absolute inset-0 bg-primary/20 rounded-full pulse-ring" id="actuatorPulse"></div>
                        <div
                            class="w-12 h-12 bg-primary rounded-full flex items-center justify-center text-on-primary shadow-lg z-10"
                            id="actuatorIcon">
                            <span class="material-symbols-outlined">water_drop</span>
                        </div>
                    </div>
                    <!-- Decorative Background Texture -->
                    <div
                        class="absolute right-0 top-0 w-1/2 h-full bg-gradient-to-l from-secondary-container/30 to-transparent pointer-events-none">
                    </div>
                </div>
                <!-- Active Cycle Details (DYNAMIC) -->
                <div class="md:col-span-12 bg-surface-container-lowest rounded-xl p-card-padding soft-shadow">
                    <div
                        class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 pb-4 border-b border-outline-variant/30 gap-4">
                        <div>
                            <h3 class="font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface">
                                Active Cycle: <span id="cycleBlok">Kumbung A1</span></h3>
                            <p class="font-body-md text-body-md text-on-surface-variant">Ongoing cultivation metrics.
                            </p>
                        </div>
                        <a href="/siklus"
                            class="bg-surface hover:bg-surface-container border border-outline px-4 py-2 rounded-lg font-body-md text-body-md font-semibold text-primary transition-colors flex items-center gap-2">
                            View Details
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-8">
                        <div>
                            <span class="font-label-caps text-label-caps text-on-surface-variant block mb-1">Start
                                Date</span>
                            <span class="font-data-display text-data-display text-on-surface text-xl" id="cycleStartDate">—</span>
                        </div>
                        <div>
                            <span class="font-label-caps text-label-caps text-on-surface-variant block mb-1">Blok Tanam</span>
                            <span class="font-data-display text-data-display text-on-surface text-xl" id="cycleBlokTanam">—</span>
                        </div>
                        <div>
                            <span class="font-label-caps text-label-caps text-on-surface-variant block mb-1">Total
                                Backlogs</span>
                            <span class="font-data-display text-data-display text-on-surface text-xl" id="cycleBaglog">— <span
                                    class="font-body-md text-body-md text-on-surface-variant align-baseline">units</span></span>
                        </div>
                        <div>
                            <span class="font-label-caps text-label-caps text-on-surface-variant block mb-1">Current
                                Yield</span>
                            <span class="font-data-display text-data-display text-on-surface text-xl text-secondary" id="cycleYield">—
                                <span
                                    class="font-body-md text-body-md text-on-surface-variant align-baseline">kg</span></span>
                        </div>
                        <div>
                            <span class="font-label-caps text-label-caps text-on-surface-variant block mb-1">Durasi Tanam</span>
                            <span class="font-data-display text-data-display text-on-surface text-xl" id="cycleDurasi">—
                                <span class="font-body-md text-body-md text-on-surface-variant align-baseline">/ 40 hari</span></span>
                        </div>
                    </div>
                </div>
                <!-- Main Chart Area (Span 8) — STATIC (no sensor history API) -->
                <div
                    class="md:col-span-8 bg-surface-container-lowest rounded-xl p-card-padding soft-shadow min-h-[400px] flex flex-col">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="font-headline-md text-headline-md text-on-surface">Environmental Trends (24h)</h3>
                        <div class="flex gap-2">
                            <span
                                class="flex items-center gap-1 font-label-caps text-label-caps text-on-surface-variant">
                                <span class="w-3 h-3 rounded-full bg-primary inline-block"></span> Temp
                            </span>
                            <span
                                class="flex items-center gap-1 font-label-caps text-label-caps text-on-surface-variant">
                                <span class="w-3 h-3 rounded-full bg-secondary inline-block"></span> Humid
                            </span>
                        </div>
                    </div>
                    <!-- Faux Chart Area -->
                    <div class="flex-grow relative border-l border-b border-outline-variant/50 pt-4 pr-4 pb-2 pl-2">
                        <!-- Y-axis labels -->
                        <div
                            class="absolute -left-8 top-0 bottom-0 flex flex-col justify-between font-label-caps text-[10px] text-on-surface-variant py-4">
                            <span>100</span><span>75</span><span>50</span><span>25</span><span>0</span>
                        </div>
                        <!-- X-axis labels -->
                        <div
                            class="absolute -bottom-6 left-0 right-0 flex justify-between font-label-caps text-[10px] text-on-surface-variant px-4">
                            <span>00:00</span><span>06:00</span><span>12:00</span><span>18:00</span><span>Now</span>
                        </div>
                        <!-- Grid lines -->
                        <div class="absolute inset-0 flex flex-col justify-between pointer-events-none">
                            <div class="w-full h-px bg-outline-variant/20"></div>
                            <div class="w-full h-px bg-outline-variant/20"></div>
                            <div class="w-full h-px bg-outline-variant/20"></div>
                            <div class="w-full h-px bg-outline-variant/20"></div>
                            <div class="w-full h-px bg-outline-variant/20"></div>
                        </div>
                        <!-- Chart lines (SVG) -->
                        <svg class="w-full h-full" preserveaspectratio="none" viewbox="0 0 100 100">
                            <!-- Temp Line -->
                            <path class="stroke-primary" d="M0,70 L20,65 L40,68 L60,55 L80,60 L100,58" fill="none"
                                stroke-width="2" vector-effect="non-scaling-stroke"></path>
                            <!-- Humidity Line -->
                            <path class="stroke-secondary" d="M0,20 L20,15 L40,25 L60,10 L80,18 L100,15"
                                fill="none" stroke-width="2" vector-effect="non-scaling-stroke"></path>
                            <!-- Highlight Area under Temp -->
                            <path class="fill-primary/5"
                                d="M0,70 L20,65 L40,68 L60,55 L80,60 L100,58 L100,100 L0,100 Z"></path>
                        </svg>
                    </div>
                </div>
                <!-- Recent Activities List (Span 4) — STATIC (no activities table) -->
                <div
                    class="md:col-span-4 bg-surface-container-lowest rounded-xl p-card-padding soft-shadow flex flex-col">
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-6">Recent Activity</h3>
                    <div class="flex flex-col gap-4 flex-grow overflow-y-auto pr-2">
                        <!-- Activity Item -->
                        <div class="flex gap-4 relative">
                            <div class="w-px bg-outline-variant/40 absolute left-4 top-8 bottom-[-16px]"></div>
                            <div
                                class="w-8 h-8 rounded-full bg-secondary-container text-on-secondary-container flex items-center justify-center shrink-0 z-10">
                                <span class="material-symbols-outlined text-sm">water_drop</span>
                            </div>
                            <div>
                                <p class="font-body-md text-body-md text-on-surface font-medium">Misting activated</p>
                                <p class="font-label-caps text-label-caps text-on-surface-variant mt-1">Today, 14:00
                                </p>
                            </div>
                        </div>
                        <!-- Activity Item -->
                        <div class="flex gap-4 relative">
                            <div class="w-px bg-outline-variant/40 absolute left-4 top-8 bottom-[-16px]"></div>
                            <div
                                class="w-8 h-8 rounded-full bg-tertiary-container text-on-tertiary-container flex items-center justify-center shrink-0 z-10">
                                <span class="material-symbols-outlined text-sm">agriculture</span>
                            </div>
                            <div>
                                <p class="font-body-md text-body-md text-on-surface font-medium">Harvest logged: 5kg
                                </p>
                                <p class="font-label-caps text-label-caps text-on-surface-variant mt-1">Today, 09:30
                                </p>
                            </div>
                        </div>
                        <!-- Activity Item -->
                        <div class="flex gap-4 relative">
                            <div class="w-px bg-outline-variant/40 absolute left-4 top-8 bottom-[-16px]"></div>
                            <div
                                class="w-8 h-8 rounded-full bg-surface-container-high text-on-surface-variant flex items-center justify-center shrink-0 z-10">
                                <span class="material-symbols-outlined text-sm">thermostat</span>
                            </div>
                            <div>
                                <p class="font-body-md text-body-md text-on-surface font-medium">Temp normalized (24°C)
                                </p>
                                <p class="font-label-caps text-label-caps text-on-surface-variant mt-1">Yesterday,
                                    22:15</p>
                            </div>
                        </div>
                        <!-- Activity Item (Last, no line) -->
                        <div class="flex gap-4 relative">
                            <div
                                class="w-8 h-8 rounded-full bg-error-container text-on-error-container flex items-center justify-center shrink-0 z-10">
                                <span class="material-symbols-outlined text-sm">warning</span>
                            </div>
                            <div>
                                <p class="font-body-md text-body-md text-on-surface font-medium">Low humidity alert
                                    (70%)</p>
                                <p class="font-label-caps text-label-caps text-on-surface-variant mt-1">Yesterday,
                                    18:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- BottomNavBar (Mobile Only) -->
    <nav
        class="md:hidden fixed bottom-0 w-full bg-surface-container-lowest border-t-0 border-transparent shadow-[0_-4px_20px_rgba(45,106,79,0.05)] z-50 flex justify-around items-center py-2 px-4 pb-safe">
        <a class="flex flex-col items-center p-2 text-primary" href="/dashboard">
            <div class="bg-secondary-container px-4 py-1 rounded-full mb-1">
                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">dashboard</span>
            </div>
            <span class="font-label-caps text-[10px] font-semibold">Dashboard</span>
        </a>
        <a class="flex flex-col items-center p-2 text-on-surface-variant" href="/siklus">
            <span class="material-symbols-outlined mb-1">potted_plant</span>
            <span class="font-label-caps text-[10px]">Siklus</span>
        </a>
        <a class="flex flex-col items-center p-2 text-on-surface-variant" href="/panen">
            <span class="material-symbols-outlined mb-1">history</span>
            <span class="font-label-caps text-[10px]">Riwayat</span>
        </a>
        <a class="flex flex-col items-center p-2 text-on-surface-variant" href="#">
            <span class="material-symbols-outlined mb-1">settings</span>
            <span class="font-label-caps text-[10px]">Settings</span>
        </a>
    </nav>

    <!-- Script Integrasi Data Backend -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetchLatestSensor();
            fetchActiveCycle();
        });

        // ─── 1. Fetch Latest Sensor & Actuator Data ──────────────────────────
        async function fetchLatestSensor() {
            try {
                const response = await fetch('/api/dashboard/latest');
                const res = await response.json();

                if (res.status && res.data) {
                    const data = res.data;

                    // Temperature
                    const suhu = data.suhu_terakhir;
                    document.getElementById('sensorSuhu').innerText = suhu !== null ? suhu : '—';

                    // Humidity
                    const kelembapan = data.kelembapan_terakhir;
                    document.getElementById('sensorKelembapan').innerText = kelembapan !== null ? kelembapan : '—';

                    // Actuator Status
                    updateActuatorCard(data.status_aktuator);
                } else {
                    // No data yet — keep placeholder
                    document.getElementById('sensorSuhu').innerText = '—';
                    document.getElementById('sensorKelembapan').innerText = '—';
                    updateActuatorCard(null);
                }
            } catch (error) {
                console.error('Error fetching sensor data:', error);
            }
        }

        // ─── 2. Update Actuator Card ─────────────────────────────────────────
        function updateActuatorCard(status) {
            const card = document.getElementById('actuatorCard');
            const title = document.getElementById('actuatorTitle');
            const desc = document.getElementById('actuatorDesc');
            const icon = document.getElementById('actuatorIcon');
            const pulse = document.getElementById('actuatorPulse');

            if (status === 'ON') {
                card.className = card.className.replace(/border-l-4\s*(border-\S+)?/, 'border-l-4 border-primary');
                title.innerText = 'Water Misting ON';
                desc.innerText = 'Operating automatically based on humidity thresholds.';
                icon.className = 'w-12 h-12 bg-primary rounded-full flex items-center justify-center text-on-primary shadow-lg z-10';
                pulse.style.display = 'block';
            } else if (status === 'OFF') {
                card.className = card.className.replace(/border-l-4\s*(border-\S+)?/, 'border-l-4 border-outline-variant');
                title.innerText = 'Water Misting OFF';
                desc.innerText = 'Actuator is currently inactive.';
                icon.className = 'w-12 h-12 bg-surface-container-high rounded-full flex items-center justify-center text-on-surface-variant shadow-lg z-10';
                pulse.style.display = 'none';
            } else {
                card.className = card.className.replace(/border-l-4\s*(border-\S+)?/, 'border-l-4 border-outline-variant');
                title.innerText = 'Water Misting —';
                desc.innerText = 'Belum ada data status aktuator.';
                icon.className = 'w-12 h-12 bg-surface-container-high rounded-full flex items-center justify-center text-on-surface-variant shadow-lg z-10';
                pulse.style.display = 'none';
            }
        }

        // ─── 3. Fetch Active Cycle (Latest Siklus) ───────────────────────────
        async function fetchActiveCycle() {
            try {
                const response = await fetch('/api/siklus?page=1');
                const res = await response.json();

                if (res.status && res.data.data && res.data.data.length > 0) {
                    const cycle = res.data.data[0]; // latest siklus

                    // Start Date
                    const startDate = new Date(cycle.tanggal_mulai).toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });
                    document.getElementById('cycleStartDate').innerText = startDate;

                    // Blok Tanam
                    document.getElementById('cycleBlokTanam').innerText = cycle.blok_tanam || '—';
                    document.getElementById('cycleBlok').innerText = cycle.blok_tanam || 'Kumbung A1';

                    // Total Backlogs
                    document.getElementById('cycleBaglog').innerHTML = `${Number(cycle.jumlah_backlog).toLocaleString('id-ID')} <span class="font-body-md text-body-md text-on-surface-variant align-baseline">units</span>`;

                    // Current Yield
                    document.getElementById('cycleYield').innerHTML = `${cycle.total_panen || 0} <span class="font-body-md text-body-md text-on-surface-variant align-baseline">kg</span>`;

                    // Durasi Tanam
                    const durasi = cycle.durasi_tanam || 0;
                    document.getElementById('cycleDurasi').innerHTML = `${durasi} <span class="font-body-md text-body-md text-on-surface-variant align-baseline">/ 40 hari</span>`;
                }
            } catch (error) {
                console.error('Error fetching active cycle:', error);
            }
        }
    </script>
</body>

</html>
