<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/logo3.jpeg') }}">
    <title>IGC IMMIGRATION-تقديم طلب فيزا شنغن</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: white;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .navbar {
            background: linear-gradient(135deg, #1A2A6C 0%, #0f1a4a 100%) !important;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
            height: 100px;
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            height: 100%;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.02);
            color: #D4AF37 !important;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
        }

        .logo-img {
            height: 85px;
            width: auto;
            object-fit: contain;
            border-radius: 17px;
            transition: all 0.3s ease;
        }

        .navbar-brand span {
            font-weight: bold;
            font-size: 22px;
            letter-spacing: 1px;
            background: linear-gradient(135deg, #D4AF37, #FFD700);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Style des navlinks modernisés */
        .navlinks-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-link-btn {
            position: relative;
            padding: 10px 24px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
            letter-spacing: 0.5px;
            overflow: hidden;
        }

        /* Bouton Boîte de réception */
        .btn-inbox {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: white;
        }

        .btn-inbox:hover {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-color: transparent;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.4);
        }

        /* Bouton Tableau */
        .btn-tableau {
            background: linear-gradient(135deg, #D4AF37, #FFD700);
            border: none;
            color: #1A2A6C;
        }

        .btn-tableau:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(212, 175, 55, 0.5);
            color: #0f1a4a;
        }

        /* Bouton Logout */
        .btn-logout {
            background: linear-gradient(135deg, #dc2626, #b91c1c);
            border: none;
            color: white;
            cursor: pointer;
        }

        .btn-logout:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        /* Effet de brillance sur les boutons */
        .nav-link-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .nav-link-btn:hover::after {
            left: 100%;
        }

        /* Animation d'entrée pour les navlinks */
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .nav-link-btn {
            animation: slideInRight 0.5s ease-out forwards;
            opacity: 0;
        }

        .nav-link-btn:nth-child(1) { animation-delay: 0.1s; }
        .nav-link-btn:nth-child(2) { animation-delay: 0.2s; }
        .nav-link-btn:nth-child(3) { animation-delay: 0.3s; }

        .nav-link-btn:active {
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                height: auto;
                min-height: 80px;
                padding: 15px 0;
            }

            .container {
                flex-direction: column;
                gap: 15px;
                padding: 0 20px;
            }

            .navlinks-container {
                justify-content: center;
                width: 100%;
                gap: 12px;
            }

            .nav-link-btn {
                padding: 8px 16px;
                font-size: 13px;
            }

            .logo-img {
                height: 55px;
            }

            .navbar-brand span {
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .navlinks-container {
                flex-direction: column;
                width: 100%;
            }

            .nav-link-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="/images/logo2.png" alt="logo" class="logo-img me-2">
            <span>IGC IMMIGRATION</span>
        </a>

        <div class="navlinks-container">
            <a href="/admin/inbox" class="nav-link-btn btn-inbox">
                <i class="fas fa-inbox"></i>
                <span> Boîte de réception</span>
            </a>

            <a href="/admin/table" class="nav-link-btn btn-tableau">
                <i class="fas fa-chart-line"></i>
                <span> Tableau</span>
            </a>

            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button type="submit" class="nav-link-btn btn-logout" style="border: none;">
                    <i class="fas fa-sign-out-alt"></i>
                    <span> Logout</span>
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid mt-4 px-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>