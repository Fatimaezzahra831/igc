<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Tableau de Bord</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a0e27 0%, #1a1f3a 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
        }

        /* Effet de fond avec éléments flottants */
        body::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(37, 99, 235, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(59, 130, 246, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .login-container {
            background: linear-gradient(135deg, #1e2a3e 0%, #0f172a 100%);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(59, 130, 246, 0.1);
            padding: 40px 35px;
            width: 100%;
            max-width: 450px;
            backdrop-filter: blur(10px);
            animation: fadeInUp 0.6s ease-out;
            position: relative;
            z-index: 1;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Titre avec effet moderne */
        h2 {
            color: #ffffff;
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 35px;
            text-align: center;
            position: relative;
            letter-spacing: -0.5px;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #2563eb);
            border-radius: 3px;
        }

        /* Message d'erreur */
        .error-message {
            background: rgba(239, 68, 68, 0.1);
            border-left: 4px solid #ef4444;
            border-radius: 8px;
            padding: 12px 15px;
            margin-bottom: 25px;
            color: #fca5a5;
            font-size: 14px;
            animation: shake 0.5s ease-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        /* Groupe de formulaire */
        .form-group {
            margin-bottom: 25px;
        }

        /* Labels */
        label {
            display: block;
            color: #cbd5e1;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            transition: color 0.3s ease;
        }

        /* Champs de saisie */
        input {
            width: 100%;
            padding: 14px 16px;
            background: #1e293b;
            border: 2px solid #334155;
            border-radius: 12px;
            color: #f1f5f9;
            font-size: 15px;
            transition: all 0.3s ease;
            outline: none;
        }

        input:focus {
            border-color: #3b82f6;
            background: #0f172a;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        input::placeholder {
            color: #64748b;
        }

        /* Bouton de connexion */
        button {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            position: relative;
            overflow: hidden;
        }

        button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.4);
        }

        button:hover::before {
            left: 100%;
        }

        button:active {
            transform: translateY(0);
        }

        /* Lien supplémentaire */
        .additional-links {
            margin-top: 25px;
            text-align: center;
            font-size: 14px;
        }

        .additional-links a {
            color: #60a5fa;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .additional-links a:hover {
            color: #93c5fd;
            text-decoration: underline;
        }

        /* Icônes et décorations */
        .icon {
            text-align: center;
            margin-bottom: 20px;
        }

        .icon svg {
            width: 60px;
            height: 60px;
            color: #3b82f6;
        }

        /* Responsive design */
        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }

            h2 {
                font-size: 28px;
            }

            input, button {
                padding: 12px 14px;
            }
        }
    </style>
</head>
<body>

<div class="login-container">
    <!-- Icône de verrouillage décorative -->
    <div class="icon">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
        </svg>
    </div>

    <h2>Connexion Admin</h2>

    @if(session('error'))
        <div class="error-message">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div class="form-group">
            <label>📧 Email </label>
            <input type="email" name="email" placeholder="email" required>
        </div>

        <div class="form-group">
            <label>🔒 Mot de passe</label>
            <input type="password" name="password" placeholder="••••••••" required>
        </div>

        <button type="submit">
            Se connecter →
        </button>

    </form>
</div>

</body>
</html>