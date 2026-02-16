<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BIBLIOTECA - Sistema de Gestión</title>

    <!-- Fuentes Premium -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700;800;900&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-gold: #d4af37;
            --secondary-gold: #f4e4c1;
            --dark-bg: #1a1a1a;
            --darker-bg: #0d0d0d;
            --text-light: #ffffff;
            --text-gold: #d4af37;
        }

        body {
            font-family: 'Lato', sans-serif;
            overflow-x: hidden;
            background: var(--dark-bg);
        }

        /* Background con imagen de biblioteca */
        .hero-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1521587760476-6c12a4b040da?q=80&w=2070');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 1;
        }

        /* Overlay oscuro para mejorar legibilidad */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, 
                rgba(0, 0, 0, 0.85) 0%, 
                rgba(26, 26, 26, 0.9) 50%, 
                rgba(0, 0, 0, 0.85) 100%);
            z-index: 2;
        }

        /* Efecto de viñeta */
        .vignette {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            box-shadow: inset 0 0 200px rgba(0, 0, 0, 0.9);
            z-index: 3;
            pointer-events: none;
        }

        /* Partículas doradas flotantes */
        .particles {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 4;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: var(--primary-gold);
            border-radius: 50%;
            animation: particleFloat 15s infinite;
            opacity: 0;
            box-shadow: 0 0 10px var(--primary-gold);
        }

        @keyframes particleFloat {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 0.8;
            }
            90% {
                opacity: 0.8;
            }
            100% {
                transform: translateY(-100vh) translateX(100px);
                opacity: 0;
            }
        }

        /* Líneas decorativas */
        .decorative-lines {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 4;
            pointer-events: none;
            opacity: 0.1;
        }

        .deco-line {
            position: absolute;
            background: var(--primary-gold);
            animation: lineSlide 20s infinite linear;
        }

        .deco-line-1 {
            width: 1px;
            height: 30%;
            left: 15%;
            animation-delay: 0s;
        }

        .deco-line-2 {
            width: 1px;
            height: 40%;
            right: 20%;
            animation-delay: 7s;
        }

        .deco-line-3 {
            width: 1px;
            height: 25%;
            left: 75%;
            animation-delay: 14s;
        }

        @keyframes lineSlide {
            0% {
                top: -50%;
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                top: 150%;
                opacity: 0;
            }
        }

        /* Main Container */
        .login-container {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            z-index: 10;
        }

        /* Premium Card */
        .login-card {
            background: rgba(26, 26, 26, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 4rem 3.5rem;
            width: 100%;
            max-width: 550px;
            box-shadow: 
                0 50px 100px rgba(0, 0, 0, 0.8),
                0 0 0 1px rgba(212, 175, 55, 0.3),
                inset 0 0 60px rgba(212, 175, 55, 0.05);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(212, 175, 55, 0.2);
        }

        /* Brillo sutil en el borde */
        .login-card::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, 
                var(--primary-gold), 
                transparent, 
                var(--primary-gold));
            border-radius: 30px;
            opacity: 0.3;
            z-index: -1;
            animation: borderGlow 3s infinite;
        }

        @keyframes borderGlow {
            0%, 100% {
                opacity: 0.3;
            }
            50% {
                opacity: 0.6;
            }
        }

        /* Decorative Corners */
        .corner-ornament {
            position: absolute;
            width: 80px;
            height: 80px;
            border: 2px solid var(--primary-gold);
            opacity: 0.4;
        }

        .corner-tl {
            top: 20px;
            left: 20px;
            border-right: none;
            border-bottom: none;
            border-top-left-radius: 15px;
        }

        .corner-tr {
            top: 20px;
            right: 20px;
            border-left: none;
            border-bottom: none;
            border-top-right-radius: 15px;
        }

        .corner-bl {
            bottom: 20px;
            left: 20px;
            border-right: none;
            border-top: none;
            border-bottom-left-radius: 15px;
        }

        .corner-br {
            bottom: 20px;
            right: 20px;
            border-left: none;
            border-top: none;
            border-bottom-right-radius: 15px;
        }

        /* Brand Header */
        .brand-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .brand-icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, var(--primary-gold), #b8941f);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            box-shadow: 
                0 15px 50px rgba(212, 175, 55, 0.4),
                inset 0 0 30px rgba(255, 255, 255, 0.2);
            position: relative;
            animation: iconPulse 3s infinite;
        }

        @keyframes iconPulse {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 15px 50px rgba(212, 175, 55, 0.4);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 20px 60px rgba(212, 175, 55, 0.6);
            }
        }

        .brand-icon::before {
            content: '';
            position: absolute;
            inset: -5px;
            background: linear-gradient(45deg, var(--primary-gold), transparent, var(--primary-gold));
            border-radius: 50%;
            z-index: -1;
            opacity: 0.5;
            filter: blur(15px);
            animation: iconGlow 2s infinite;
        }

        @keyframes iconGlow {
            0%, 100% {
                opacity: 0.3;
            }
            50% {
                opacity: 0.7;
            }
        }

        .brand-title {
            font-family: 'Cinzel', serif;
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-gold);
            letter-spacing: 8px;
            margin-bottom: 0.5rem;
            text-shadow: 0 0 30px rgba(212, 175, 55, 0.5);
            animation: titleShine 4s infinite;
        }

        @keyframes titleShine {
            0%, 100% {
                text-shadow: 0 0 30px rgba(212, 175, 55, 0.5);
            }
            50% {
                text-shadow: 0 0 50px rgba(212, 175, 55, 0.8);
            }
        }

        .brand-subtitle {
            font-size: 1rem;
            color: var(--secondary-gold);
            font-weight: 300;
            letter-spacing: 3px;
            text-transform: uppercase;
            opacity: 0.8;
        }

        .divider {
            width: 100px;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--primary-gold), transparent);
            margin: 1.5rem auto;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--secondary-gold);
            margin-bottom: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1.3rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-gold);
            font-size: 1.2rem;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .form-input {
            width: 100%;
            padding: 1.2rem 1.2rem 1.2rem 3.5rem;
            border: 2px solid rgba(212, 175, 55, 0.3);
            border-radius: 15px;
            font-size: 1rem;
            color: var(--text-light);
            background: rgba(0, 0, 0, 0.4);
            transition: all 0.3s ease;
            position: relative;
        }

        .form-input::placeholder {
            color: rgba(244, 228, 193, 0.4);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-gold);
            background: rgba(0, 0, 0, 0.6);
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.1),
                        0 0 30px rgba(212, 175, 55, 0.2);
        }

        .form-input:focus ~ .input-icon {
            color: var(--text-light);
            transform: translateY(-50%) scale(1.15);
        }

        /* Button */
        .btn-submit {
            width: 100%;
            padding: 1.3rem;
            background: linear-gradient(135deg, var(--primary-gold) 0%, #b8941f 100%);
            color: var(--darker-bg);
            border: none;
            border-radius: 15px;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.4);
            margin-top: 1rem;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 50px rgba(212, 175, 55, 0.6);
        }

        .btn-submit:hover::before {
            left: 100%;
        }

        .btn-submit:active {
            transform: translateY(-1px);
        }

        /* Register Section */
        .register-section {
            text-align: center;
            margin-top: 2.5rem;
            padding-top: 2.5rem;
            border-top: 1px solid rgba(212, 175, 55, 0.2);
        }

        .register-text {
            color: var(--secondary-gold);
            font-size: 0.95rem;
            margin-bottom: 1rem;
            opacity: 0.8;
        }

        .register-link {
            color: var(--primary-gold);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 1rem;
            letter-spacing: 1px;
        }

        .register-link:hover {
            color: var(--text-light);
            text-shadow: 0 0 20px rgba(212, 175, 55, 0.6);
        }

        /* Top Register Button */
        .top-register-btn {
            position: fixed;
            top: 2.5rem;
            right: 2.5rem;
            padding: 1rem 2.5rem;
            background: rgba(212, 175, 55, 0.1);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(212, 175, 55, 0.5);
            color: var(--primary-gold);
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 100;
            font-size: 0.95rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .top-register-btn:hover {
            background: rgba(212, 175, 55, 0.2);
            border-color: var(--primary-gold);
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.4);
            color: var(--text-light);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .login-card {
                padding: 3rem 2rem;
            }

            .brand-title {
                font-size: 2.2rem;
                letter-spacing: 4px;
            }

            .top-register-btn {
                top: 1.5rem;
                right: 1.5rem;
                padding: 0.8rem 1.8rem;
                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            .login-card {
                padding: 2.5rem 1.5rem;
            }

            .brand-title {
                font-size: 1.8rem;
            }

            .brand-icon {
                width: 70px;
                height: 70px;
                font-size: 2.5rem;
            }
        }

        /* Fade in animation */
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

        .login-card {
            animation: fadeInUp 0.8s ease-out;
        }
    </style>
</head>

<body>
    <!-- Background con imagen de biblioteca real -->
    <div class="hero-background"></div>
    <div class="overlay"></div>
    <div class="vignette"></div>

    <!-- Partículas doradas -->
    <div class="particles" id="particles"></div>

    <!-- Líneas decorativas -->
    <div class="decorative-lines">
        <div class="deco-line deco-line-1"></div>
        <div class="deco-line deco-line-2"></div>
        <div class="deco-line deco-line-3"></div>
    </div>

    <!-- Top Register Button -->
   <!-- En el HTML -->
<button class="top-register-btn" id="btnRegistrar">
    ✦ Crear Cuenta
</button>

<!-- En el JavaScript (después de cargar jQuery) -->
<script>
$(document).ready(function() {
    $('#btnRegistrar').click(function() {
        window.location.href = "{{ route('registrar') }}";
    });
});
</script>


    <!-- Main Login Container -->
    <div class="login-container">
        <div class="login-card">
            <!-- Decorative Corners -->
            <div class="corner-ornament corner-tl"></div>
            <div class="corner-ornament corner-tr"></div>
            <div class="corner-ornament corner-bl"></div>
            <div class="corner-ornament corner-br"></div>

            <!-- Brand Header -->
            <div class="brand-header">
                <div class="brand-icon">
                    📚
                </div>
                <h1 class="brand-title">BIBLIOTECA</h1>
                <div class="divider"></div>
                <p class="brand-subtitle">Sistema de Gestión</p>
            </div>

            <!-- Login Form -->
            <form action="#">
                <div class="form-group">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <div class="input-wrapper">
                        <input type="email" 
                               id="email" 
                               name="email"
                               class="form-input"
                               placeholder="name@company.com"
                               required="">
                        <div class="input-icon">✉</div>
                    </div>
                </div>

                <button type="button" id="btnIngresar" class="btn-submit">
                    Iniciar Sesión
                </button>
            </form>

            <!-- Register Section -->
            <div class="register-section">
                <p class="register-text">¿Primera vez aquí?</p>
                <a href="{{ route('registrar') }}" class="register-link">
                    Crear una cuenta nueva →
                </a>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        // Crear partículas doradas
        function createParticles() {
            const container = document.getElementById('particles');
            
            for (let i = 0; i < 30; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 15 + 's';
                particle.style.animationDuration = (10 + Math.random() * 10) + 's';
                container.appendChild(particle);
            }
        }

        // Inicializar partículas
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
        });

        // CÓDIGO AJAX ORIGINAL
        $(document).ready(function() {
            $('#btnIngresar').click(function(e) {
                e.preventDefault(); 

                const email = $('#email').val();

                $.ajax({
                    url: '/verificar-email',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        email: email,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.existe) {
                            window.location.href = "{{ route('dash') }}";
                        } else {
                            alert('El email no está registrado.');
                            window.location.href = "{{ route('home') }}";
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            alert("Email no válido.");
                        } else {
                            alert("Error al verificar email.");
                        }
                        console.error("Error AJAX:", xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>