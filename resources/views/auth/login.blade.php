<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Mushroom Monitor Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: "#0f5238",
                        "primary-container": "#2d6a4f",
                        "on-primary": "#ffffff",
                        "on-primary-container": "#a8e7c5",
                        surface: "#f8f9fa",
                        "on-surface": "#191c1d",
                        "on-surface-variant": "#404943",
                        "surface-container-lowest": "#ffffff",
                        outline: "#707973",
                        "outline-variant": "#bfc9c1",
                        error: "#ba1a1a",
                    },
                    fontFamily: {
                        sans: ["Manrope", "sans-serif"],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-surface text-on-surface font-sans h-screen flex items-center justify-center p-4 selection:bg-primary-container selection:text-on-primary-container">

    <!-- Ambient Background Glows -->
    <div class="fixed top-0 left-1/4 w-[500px] h-[500px] bg-primary/10 rounded-full blur-[100px] pointer-events-none"></div>
    <div class="fixed bottom-0 right-1/4 w-[400px] h-[400px] bg-primary-container/10 rounded-full blur-[80px] pointer-events-none"></div>

    <div class="w-full max-w-md bg-surface-container-lowest p-8 rounded-2xl shadow-[0px_4px_20px_rgba(45,106,79,0.05)] border border-outline-variant/30 relative z-10">
        
        <div class="flex flex-col items-center mb-8">
            <div class="w-16 h-16 rounded-xl overflow-hidden bg-surface mb-4 flex items-center justify-center shadow-sm">
                <span class="material-symbols-outlined text-4xl text-primary">eco</span>
            </div>
            <h1 class="text-3xl font-extrabold text-primary text-center">Kumbung IoT</h1>
            <p class="text-on-surface-variant mt-2 text-center text-sm">Masuk untuk mengelola siklus dan monitoring jamur.</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 rounded-xl bg-[#ffdad6] text-[#93000a] text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">error</span>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-5">
            @csrf
            
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-on-surface-variant mb-1">Email</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">mail</span>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full pl-10 pr-4 py-3 bg-surface border border-outline-variant rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-outline-variant text-on-surface"
                        placeholder="admin@admin.com">
                </div>
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-semibold text-on-surface-variant mb-1">Password</label>
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline">lock</span>
                    <input id="password" type="password" name="password" required
                        class="w-full pl-10 pr-4 py-3 bg-surface border border-outline-variant rounded-xl focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-outline-variant text-on-surface"
                        placeholder="••••••••">
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember" type="checkbox" name="remember" class="w-4 h-4 text-primary bg-surface border-outline-variant rounded focus:ring-primary focus:ring-2 cursor-pointer">
                <label for="remember" class="ml-2 text-sm text-on-surface-variant cursor-pointer">Ingat Saya</label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-primary hover:bg-primary-container text-on-primary hover:text-on-primary-container py-3.5 rounded-xl font-bold transition-colors shadow-sm flex justify-center items-center gap-2 mt-2">
                <span>Login</span>
                <span class="material-symbols-outlined text-sm">login</span>
            </button>
        </form>
    </div>

</body>
</html>
