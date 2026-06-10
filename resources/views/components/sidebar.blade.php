<!-- Desktop Sidebar -->
<nav
    class="hidden md:flex h-screen w-64 fixed left-0 top-0 bg-surface-container-lowest border-r border-outline-variant shadow-md flex-col p-4 gap-4 z-40">
    <!-- Header -->
    <div class="flex items-center gap-3 px-2 mb-4">
        <div>
            <h1 class="font-headline-lg text-headline-lg font-black text-primary truncate leading-none">Jamur Tiram</h1>
            <p class="font-body-md text-body-md text-on-surface-variant text-sm mt-1 truncate">Berkah Abadi</p>
        </div>
    </div>
    <!-- Navigation Links -->
    <div class="flex flex-col gap-2 flex-grow">
        <a class="flex items-center gap-3 {{ request()->is('dashboard') ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-primary' }} rounded-xl px-4 py-3 font-semibold group relative transition-all"
            href="/dashboard">
            <span class="material-symbols-outlined" {!! request()->is('dashboard') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>dashboard</span>
            <span class="font-body-md text-body-md">Dashboard</span>
            @if(request()->is('dashboard'))
            <div class="absolute inset-0 rounded-xl border border-secondary/20 pointer-events-none"></div>
            @endif
        </a>
        <a class="flex items-center gap-3 {{ request()->is('siklus') ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-primary' }} rounded-xl px-4 py-3 font-semibold group relative transition-all"
            href="/siklus">
            <span class="material-symbols-outlined" {!! request()->is('siklus') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>potted_plant</span>
            <span class="font-body-md text-body-md">Siklus Tanam</span>
            @if(request()->is('siklus'))
            <div class="absolute inset-0 rounded-xl border border-secondary/20 pointer-events-none"></div>
            @endif
        </a>
        <a class="flex items-center gap-3 {{ request()->is('panen') ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-primary' }} rounded-xl px-4 py-3 font-semibold group relative transition-all"
            href="/panen">
            <span class="material-symbols-outlined" {!! request()->is('panen') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>history</span>
            <span class="font-body-md text-body-md">Riwayat Panen</span>
            @if(request()->is('panen'))
            <div class="absolute inset-0 rounded-xl border border-secondary/20 pointer-events-none"></div>
            @endif
        </a>
    </div>
    <!-- CTA & Footer -->
    <div class="mt-auto flex flex-col gap-4">
        <div class="h-px bg-outline-variant w-full"></div>
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 text-on-surface-variant px-4 py-3 hover:bg-surface-container-high rounded-xl transition-all group hover:text-error text-left">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-body-md text-body-md">Logout</span>
            </button>
        </form>
    </div>
</nav>

<!-- Mobile Sidebar Overlay -->
<div id="mobileSidebarOverlay" class="fixed inset-0 z-30 bg-black/20 backdrop-blur-sm hidden md:hidden" onclick="closeMobileSidebar()"></div>

<!-- Mobile Sidebar -->
<aside id="mobileSidebar" class="fixed inset-y-0 left-0 z-40 w-72 max-w-[85vw] transform -translate-x-full bg-surface-container-lowest border-r border-outline-variant shadow-xl p-4 gap-4 transition-transform duration-300 md:hidden">
    <div class="flex items-center justify-between gap-3 mb-4">
        <div>
            <h1 class="font-headline-md text-headline-md font-black text-primary truncate leading-none">Jamur Tiram</h1>
            <p class="font-body-md text-body-md text-on-surface-variant text-sm mt-1 truncate">Berkah Abadi</p>
        </div>
        <button type="button" aria-label="Close menu" onclick="closeMobileSidebar()"
            class="inline-flex items-center justify-center w-11 h-11 min-h-[44px] rounded-xl bg-surface hover:bg-surface-container-high transition">
            <span class="material-symbols-outlined">close</span>
        </button>
    </div>
    <div class="flex flex-col gap-2 flex-grow">
        <a class="flex items-center gap-3 {{ request()->is('dashboard') ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-primary' }} rounded-xl px-4 py-3 font-semibold group relative transition-all"
            href="/dashboard" onclick="closeMobileSidebar()">
            <span class="material-symbols-outlined" {!! request()->is('dashboard') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>dashboard</span>
            <span class="font-body-md text-body-md">Dashboard</span>
            @if(request()->is('dashboard'))
            <div class="absolute inset-0 rounded-xl border border-secondary/20 pointer-events-none"></div>
            @endif
        </a>
        <a class="flex items-center gap-3 {{ request()->is('siklus') ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-primary' }} rounded-xl px-4 py-3 font-semibold group relative transition-all"
            href="/siklus" onclick="closeMobileSidebar()">
            <span class="material-symbols-outlined" {!! request()->is('siklus') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>potted_plant</span>
            <span class="font-body-md text-body-md">Siklus Tanam</span>
            @if(request()->is('siklus'))
            <div class="absolute inset-0 rounded-xl border border-secondary/20 pointer-events-none"></div>
            @endif
        </a>
        <a class="flex items-center gap-3 {{ request()->is('panen') ? 'bg-secondary-container text-on-secondary-container' : 'text-on-surface-variant hover:bg-surface-container-high hover:text-primary' }} rounded-xl px-4 py-3 font-semibold group relative transition-all"
            href="/panen" onclick="closeMobileSidebar()">
            <span class="material-symbols-outlined" {!! request()->is('panen') ? 'style="font-variation-settings: \'FILL\' 1;"' : '' !!}>history</span>
            <span class="font-body-md text-body-md">Riwayat Panen</span>
            @if(request()->is('panen'))
            <div class="absolute inset-0 rounded-xl border border-secondary/20 pointer-events-none"></div>
            @endif
        </a>
    </div>
    <div class="mt-auto flex flex-col gap-4">
        <div class="h-px bg-outline-variant w-full"></div>
        <form method="POST" action="{{ route('logout') }}" class="w-full">
            @csrf
            <button type="submit" class="w-full inline-flex items-center justify-center gap-3 text-on-surface-variant px-4 py-3 hover:bg-surface-container-high rounded-xl transition-all group">
                <span class="material-symbols-outlined">logout</span>
                <span class="font-body-md text-body-md">Logout</span>
            </button>
        </form>
    </div>
</aside>

<script>
    function openMobileSidebar() {
        const panel = document.getElementById('mobileSidebar');
        const overlay = document.getElementById('mobileSidebarOverlay');
        if (!panel || !overlay) return;
        panel.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeMobileSidebar() {
        const panel = document.getElementById('mobileSidebar');
        const overlay = document.getElementById('mobileSidebarOverlay');
        if (!panel || !overlay) return;
        panel.classList.add('-translate-x-full');
        overlay.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeMobileSidebar();
        }
    });
</script>
