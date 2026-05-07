<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="{{ asset('images/logo3.jpeg') }}">    <title>IGC IMMIGRATION-تقديم طلب فيزا شنغن</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: white;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

       .navbar {
            background: #1A2A6C !important;
             box-shadow: 0 2px 10px rgba(0,0,0,0.1);
               height: 100px; 
            }

       .navbar-brand {
            display: flex;
            align-items: center;
            height: 100%;
        }
        .navbar-brand:hover {
            color: #D4AF37 !important;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .logo-img {
            height: 85px; 
            width: auto; 
            object-fit: contain;
            border-radius: 17px;
        }
        .navbar-brand span {
    font-weight: bold;
    font-size: 22px; 
    letter-spacing: 1px; 
    color: #D4AF37;
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
    </div>
</nav>

<div class="container mt-5">
    @yield('content')
</div>

</body>
</html>