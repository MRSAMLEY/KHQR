<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bong Pheng Store</title>

    <link rel="icon" type="image/x-icon" href="https://img.freepik.com/premium-vector/bps-letter-logo-design-technology-company-bps-logo-design-black-white-color-combination-bps-logo-bps-vector-bps-design-bps-icon-bps-alphabet-bps-typography-logo-design_229120-164840.jpg?w=360">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary-color: #0d6efd;
            --bakong-red: #e63946;
            --telegram-color: #0088cc;
            --facebook-color: #1877F2;
            --tiktok-color: #000000;
            --instagram-color: #E4405F;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main { flex: 1; }

        /* Navigation */
        .navbar { border-bottom: 1px solid #eee; box-shadow: 0 2px 10px rgba(0,0,0,0.02); }
        .navbar-brand { font-weight: 800; letter-spacing: -1px; font-size: 1.5rem; display: flex; align-items: center; }
        .brand-logo { width: 40px; height: 40px; object-fit: cover; border-radius: 8px; margin-right: 12px; }

        /* Sidebar Styling */
        .sidebar-wrapper {
            background: #fff;
            border-radius: 16px;
            padding: 20px;
            border: 1px solid #eee;
            position: sticky;
            top: 100px;
        }
        .filter-group { margin-bottom: 25px; }
        .filter-title { font-weight: 700; font-size: 0.9rem; text-transform: uppercase; color: #adb5bd; margin-bottom: 15px; display: block; }
        .category-link {
            display: block;
            padding: 8px 12px;
            color: #495057;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.2s;
            font-weight: 500;
        }
        .category-link:hover, .category-link.active {
            background-color: #f0f7ff;
            color: var(--primary-color);
        }

        /* Footer */
        .footer { background: #ffffff; border-top: 1px solid #dee2e6; padding: 4rem 0 2rem 0; margin-top: 5rem; }

        /* Social Links */
        .social-link {
            display: flex; align-items: center; justify-content: center;
            width: 45px; height: 45px; font-size: 1.2rem; margin: 0 8px;
            border-radius: 50%; background-color: #f1f3f5; color: #495057;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); text-decoration: none;
        }
        .social-link:hover { transform: translateY(-5px) scale(1.1); color: #fff !important; }
        .link-telegram:hover { background-color: var(--telegram-color); }
        .link-facebook:hover { background-color: var(--facebook-color); }
        .link-tiktok:hover { background-color: var(--tiktok-color); }
        .link-instagram:hover { background-color: var(--instagram-color); }

        .x-small { font-size: 0.65rem; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top py-3">
        <div class="container">
            <a class="navbar-brand text-dark" href="#">
                <img src="https://img.freepik.com/premium-vector/bps-letter-logo-design-technology-company-bps-logo-design-black-white-color-combination-bps-logo-bps-vector-bps-design-bps-icon-bps-alphabet-bps-typography-logo-design_229120-164840.jpg?w=360"
                     alt="BPS Logo" class="brand-logo shadow-sm">
                Bong Pheng Store
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link px-3 fw-semibold" href="#">Shop</a></li>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-dark rounded-pill px-4 fw-bold shadow-sm" href="#">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row">
            <aside class="col-lg-3 mb-4">
                <div class="sidebar-wrapper shadow-sm">
                    <div class="filter-group">
                        <span class="filter-title">Search</span>
                        <div class="input-group">
                            <input type="text" class="form-control border-end-0" placeholder="Find product...">
                            <span class="input-group-text bg-white border-start-0"><i class="fas fa-search text-muted"></i></span>
                        </div>
                    </div>

                    <div class="filter-group">
                        <span class="filter-title">Categories</span>
                        <a href="#" class="category-link active">All Products</a>
                        <a href="#" class="category-link">Charging</a>
                        <a href="#" class="category-link">Audio</a>
                        <a href="#" class="category-link">Accessories</a>
                    </div>

                    <div class="filter-group">
                        <span class="filter-title">Price Filter</span>
                        <input type="range" class="form-range" min="0" max="1000" id="priceRange">
                        <div class="d-flex justify-content-between small text-muted">
                            <span>0៛</span>
                            <span>1,000,000៛</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="p-3 rounded-4 bg-primary text-white text-center">
                            <i class="fas fa-headset mb-2 d-block fs-4"></i>
                            <p class="small mb-0">Need help? Support is online.</p>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="col-lg-9">
                @yield('content')
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-center text-lg-start mb-4">
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start mb-3">
                        <img src="https://img.freepik.com/premium-vector/bps-letter-logo-design-technology-company-bps-logo-design-black-white-color-combination-bps-logo-bps-vector-bps-design-bps-icon-bps-alphabet-bps-typography-logo-design_229120-164840.jpg?w=360"
                             alt="BPS Logo" style="width: 30px; border-radius: 5px; margin-right: 10px;">
                        <h4 class="fw-bold text-primary mb-0">Bong Pheng Store</h4>
                    </div>
                    <p class="text-muted small">The leading e-commerce platform in Cambodia specializing in instant KHQR payments.</p>
                </div>

                <div class="col-lg-4 text-center mb-4">
                    <h6 class="fw-bold text-uppercase small mb-4 text-secondary">Follow Our Community</h6>
                    <div class="d-flex justify-content-center">
                        <a href="#" class="social-link link-telegram"><i class="fab fa-telegram-plane"></i></a>
                        <a href="#" class="social-link link-facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link link-tiktok"><i class="fab fa-tiktok"></i></a>
                        <a href="#" class="social-link link-instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 text-center text-lg-end">
                    <h6 class="fw-bold text-uppercase small mb-4 text-secondary">Customer Support</h6>
                    <p class="text-muted small mb-1">support@bongphengstore.com</p>
                    <p class="text-secondary x-small mt-4">&copy; 2025 <strong>Bong Pheng Store</strong>.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
