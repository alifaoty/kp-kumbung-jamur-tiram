<!-- SideNavBar -->
<nav
    class="h-screen w-64 fixed left-0 top-0 bg-surface-container-lowest border-r border-outline-variant shadow-md flex flex-col p-4 gap-4 z-40 hidden md:flex">
    <!-- Header -->
    <div class="flex items-center gap-3 px-2 mb-4">
        <!-- <div class="w-10 h-10 rounded-lg overflow-hidden bg-surface-container shrink-0">
            <img alt="Farm Logo" class="w-full h-full object-cover"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBKGNPREgaBgVFy0jcKJMdtEwVtK4WSJhMkqWcKvqW_WNdOGfkiOE7vxy0LocMLKxYJ1jasb3QPSZLuMf2ZaFjhGvN_HP7HwzqyAo3x_b1xH4JoznonMdmvVVMrNfktVf5mxP4xQ-5MF3E0Mes4QTm8HIhkFNuq8xocnaekoF5dJOrPqnrjmn7MLQ9WGFRcD6TSysGqUn8cnLuTqpw0veLfH_COZVaz_ow99kcONPhv6kNdGKE8LvMPCWoE5c77XZAV5j2dokZMBwNg" />
        </div> -->
        <div>
            <h1 class="font-headline-lg text-headline-lg font-black text-primary truncate leading-none">Jamur Tiram
            </h1>
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
