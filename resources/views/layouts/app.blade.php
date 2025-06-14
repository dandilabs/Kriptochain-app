<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Critical Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="theme-color" content="#4361ee">
    <meta name="color-scheme" content="light">

    <!-- SEO Meta Tags -->
    <title>@yield('title') | Edukasi Blockchain & Update Market</title>
    <meta name="description"
        content="Platform edukasi trading crypto terlengkap di Indonesia. Belajar analisis onchain, strategi trading, dan fundamental blockchain dengan mentor berpengalaman. Bergabung dengan 1500+ trader sukses!">
    <meta name="keywords"
        content="trading crypto, fundamental onchain, edukasi blockchain, market update, kelas online, analisis teknikal, cryptocurrency indonesia, bitcoin trading, altcoin strategy">
    <link rel="canonical" href="https://kriptochain.com/">

    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Belajar Trading Crypto + Fundamental Onchain | KriptoChain">
    <meta property="og:description"
        content="Platform edukasi trading crypto terlengkap di Indonesia dengan 1500+ member sukses">
    <meta property="og:image" content="https://kriptochain.com/assets/images/og-image.jpg">
    <meta property="og:url" content="https://kriptochain.com/">
    <meta property="og:site_name" content="KriptoChain">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Belajar Trading Crypto + Fundamental Onchain | KriptoChain">
    <meta name="twitter:description"
        content="Platform edukasi trading crypto terlengkap di Indonesia dengan 1500+ member sukses">
    <meta name="twitter:image" content="https://kriptochain.com/assets/images/twitter-card.jpg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('frontend/assets/images/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend/assets/images/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('frontend/assets/images/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('frontend/assets/images/favicon/site.webmanifest')}}">

    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">

    <!-- Critical CSS (inline for performance) -->
    <style>
        /* Critical above-the-fold styles */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6
        }

        .navbar {
            background: rgba(15, 23, 42, 0.95) !important;
            backdrop-filter: blur(20px);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000
        }

        #hero {
            padding: 12rem 0 8rem;
            background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%)
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem
        }

        .btn-primary {
            background: #4361ee;
            color: #fff;
            padding: 0.75rem 2rem;
            border-radius: 0.5rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease
        }

        .btn-primary:hover {
            background: #3a56d4;
            transform: translateY(-2px)
        }
    </style>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "EducationalOrganization",
        "name": "KriptoChain",
        "url": "https://kriptochain.com/",
        "logo": "https://kriptochain.com/assets/images/logo/logo.png",
        "description": "Platform edukasi trading crypto terlengkap di Indonesia dengan fokus pada analisis onchain dan fundamental blockchain",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Jl. Blockchain No. 88",
            "addressLocality": "Jakarta Selatan",
            "addressCountry": "ID"
        },
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+62-812-3456-7890",
            "contactType": "customer service",
            "availableLanguage": "Indonesian"
        },
        "sameAs": [
            "https://facebook.com/kriptochain",
            "https://instagram.com/kriptochain",
            "https://youtube.com/kriptochain",
            "https://t.me/kriptochain"
        ]
    }
    </script>
    @stack('head')
</head>

<body id="home" class="loading">
    @include('layouts.navbar')
    @yield('content')

    @include('layouts.footer')
    <!-- Scripts -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Custom JS -->
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>

    <!-- Performance monitoring -->
    <script>
        // Mark page as loaded for performance tracking
        window.addEventListener('load', () => {
            document.body.classList.remove('loading');
            document.body.classList.add('loaded');
        });
    </script>
</body>

</html>
