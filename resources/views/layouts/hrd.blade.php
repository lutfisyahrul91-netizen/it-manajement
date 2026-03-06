<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRD Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: #FAFAFA;
            overflow: hidden; /* Mencegah scroll ganda di body */
        }
        a { text-decoration: none; }
    </style>
</head>
<body>

    <div style="display: flex; width: 100vw; height: 100vh;">

        <div style="width: 280px; background: #F8E7E7; border-right: 1px solid #E9EAEC; flex-shrink: 0; display: flex; flex-direction: column; padding-top: 24px; overflow-y: auto;">
            
            <div style="padding: 0 32px; margin-bottom: 32px;">
                <img style="width: 180px; height: 69px; object-fit: contain;" src="{{ asset('images/nav-tribun.png') }}" alt="Logo cuy">
            </div>

            <div style="padding: 0 44px; color: #21252B; font-size: 14px; font-weight: 700; text-transform: uppercase; margin-bottom: 12px; letter-spacing: 0.07px;">
                MAIN MENU
            </div>

            <div style="padding: 0 20px;">
                <a href="{{ route('hrd.dashboard') }}" style="display: flex; align-items: center; padding: 16px 20px; border-radius: 10px; gap: 12px; background: {{ request()->routeIs('hrd.dashboard') ? 'rgba(217, 52, 56, 0.10)' : 'transparent' }};">
                    <i class='bx bxs-dashboard' style="font-size: 22px; color: {{ request()->routeIs('hrd.dashboard') ? '#D30007' : '#989FAB' }};"></i>
                    <span style="color: {{ request()->routeIs('hrd.dashboard') ? '#D30007' : 'black' }}; font-size: 16px; font-weight: {{ request()->routeIs('hrd.dashboard') ? '500' : '400' }};">Dashboard HRD</span>
                </a>
            </div>

            <div style="padding: 0 32px; color: #21252B; font-size: 14px; font-weight: 700; text-transform: uppercase; margin-top: 32px; margin-bottom: 12px; letter-spacing: 0.07px;">
                DATA ASET
            </div>

            <div style="padding: 0 20px; display: flex; flex-direction: column; gap: 4px; padding-bottom: 32px;">
                <a href="{{ route('hrd.monitor') }}" style="display: flex; align-items: center; padding: 12px 20px; border-radius: 10px; gap: 12px; background: {{ request()->routeIs('hrd.monitor') ? 'rgba(217, 52, 56, 0.10)' : 'transparent' }};">
                    <i class='bx bx-desktop' style="font-size: 20px; color: {{ request()->routeIs('hrd.monitor') ? '#D30007' : '#949494' }};"></i>
                    <span style="color: {{ request()->routeIs('hrd.monitor') ? '#D30007' : 'black' }}; font-size: 16px;">Monitor</span>
                </a>

                <a href="{{ route('hrd.laptop') }}" style="display: flex; align-items: center; padding: 12px 20px; border-radius: 10px; gap: 12px; background: {{ request()->routeIs('hrd.laptop') ? 'rgba(217, 52, 56, 0.10)' : 'transparent' }};">
                    <i class='bx bx-laptop' style="font-size: 20px; color: {{ request()->routeIs('hrd.laptop') ? '#D30007' : '#949494' }};"></i>
                    <span style="color: {{ request()->routeIs('hrd.laptop') ? '#D30007' : 'black' }}; font-size: 16px;">Laptop</span>
                </a>

                <a href="{{ route('hrd.pc') }}" style="display: flex; align-items: center; padding: 12px 20px; border-radius: 10px; gap: 12px; background: {{ request()->routeIs('hrd.pc') ? 'rgba(217, 52, 56, 0.10)' : 'transparent' }};">
                    <i class='bx bx-server' style="font-size: 20px; color: {{ request()->routeIs('hrd.pc') ? '#D30007' : '#949494' }};"></i>
                    <span style="color: {{ request()->routeIs('hrd.pc') ? '#D30007' : 'black' }}; font-size: 16px;">PC</span>
                </a>

                <a href="{{ route('hrd.eksternal') }}" style="display: flex; align-items: center; padding: 12px 20px; border-radius: 10px; gap: 12px; background: {{ request()->routeIs('hrd.eksternal') ? 'rgba(217, 52, 56, 0.10)' : 'transparent' }};">
                    <i class='bx bx-mouse' style="font-size: 20px; color: {{ request()->routeIs('hrd.eksternal') ? '#D30007' : '#949494' }};"></i>
                    <span style="color: {{ request()->routeIs('hrd.eksternal') ? '#D30007' : 'black' }}; font-size: 16px;">Perangkat Eksternal</span>
                </a>
            </div>

        </div>

        <div style="flex: 1; display: flex; flex-direction: column; overflow: hidden;">
            
            <div style="height: 96px; background: white; border-bottom: 1px solid #E9EAEC; display: flex; justify-content: space-between; align-items: center; padding: 0 32px; flex-shrink: 0;">
                
                <div style="width: 320px; height: 40px; background: #FAFAFA; border-radius: 8px; display: flex; align-items: center; padding: 0 16px; gap: 10px;">
                    <i class='bx bx-search' style="font-size: 18px; color: #21252B;"></i>
                    <input type="text" placeholder="Search data..." style="border: none; background: transparent; outline: none; width: 100%; color: #B8BDC5; font-family: Inter; font-size: 14px;">
                </div>

                <div style="display: flex; align-items: center; gap: 24px;">
                    <div style="font-family: 'Inter', sans-serif; font-weight: 500; font-size: 14px; color: #21252B;">
                        {{ Auth::user()->name ?? 'HRD' }}
                    </div>
                    
                    <i class='bx bxs-user-circle' style="font-size: 36px; color: #989FAB;"></i>
                    
                    <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                        @csrf
                        <button type="submit" style="background: #D30007; color: white; border: none; padding: 8px 16px; border-radius: 10px; font-family: Inter; font-weight: 500; cursor: pointer; transition: background 0.2s;" onmouseover="this.style.background='#b00006'" onmouseout="this.style.background='#D30007'">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

            <div style="flex: 1; padding: 32px; overflow-y: auto; background: #FAFAFA;">
                @yield('content')
            </div>

        </div>
    </div>

</body>
</html>