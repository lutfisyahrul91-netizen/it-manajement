<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Asset Management System</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Montserrat', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            DEFAULT: '#D30007', 
                            hover: '#b00006',
                            light: 'rgba(217, 52, 56, 0.10)',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="relative flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8 bg-cover bg-center bg-no-repeat"
      style="background-image: url('{{ asset('images/bg-tribun-log.png') }}');">

    <div class="absolute inset-0 bg-black/40 z-0"></div>

    <div class="relative z-10 max-w-md w-full bg-white p-8 space-y-8 rounded-2xl shadow-2xl border border-gray-100">
        
        <div class="text-center">
            <img class="mx-auto h-16 w-auto object-contain" src="{{ asset('images/nav-tribun.png') }}" alt="Logo Tribun">
        </div>

        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf <div class="space-y-4">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username / Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class='bx bx-user text-gray-400 text-lg'></i>
                        </div>
                        <input id="username" name="username" type="text" required class="appearance-none relative block w-full pl-10 pr-3 py-2.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-brand sm:text-sm transition-colors" placeholder="Masukkan username">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class='bx bx-lock-alt text-gray-400 text-lg'></i>
                        </div>
                        <input id="password" name="password" type="password" required class="appearance-none relative block w-full pl-10 pr-3 py-2.5 border border-gray-300 placeholder-gray-400 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-brand focus:border-brand sm:text-sm transition-colors" placeholder="Masukan password">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-brand focus:ring-brand border-gray-300 rounded cursor-pointer">
                    <label for="remember" class="ml-2 block text-sm text-gray-700 cursor-pointer">
                        Ingat saya
                    </label>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-brand hover:text-brand-hover transition-colors">
                        Lupa password?
                    </a>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-display font-bold rounded-lg text-white bg-brand hover:bg-brand-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand transition-all shadow-md hover:shadow-lg">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class='bx bx-log-in-circle text-white/70 group-hover:text-white text-xl transition-colors'></i>
                    </span>
                    Login
                </button>
            </div>
        </form>
        
    </div>

</body>
</html>