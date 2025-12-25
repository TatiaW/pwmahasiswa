<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <title>TRPL3C</title>
    
    <style>
        body {
            /* GANTI URL GAMBAR DI SINI DENGAN GAMBAR KAMPUSMU SENDIRI */
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://polmed.ac.id/wp-content/uploads/2021/07/pesawat-polmed.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed; /* Agar gambar diam saat discroll */
            height: 100vh; /* Full Layar */
            display: flex;
            flex-direction: column;
        }

        /* Styling Navbar agar menyatu tapi tetap jelas */
        .navbar-wrapper {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        /* Container Tengah */
        .main-content {
            flex: 1; /* Mengisi sisa ruang di bawah navbar */
            display: flex;
            justify-content: center; /* Tengah secara Horizontal */
            align-items: center; /* Tengah secara Vertikal */
        }

        /* Kotak Putih Solid (Tidak Transparan) */
        .card-home {
            background-color: #ffffff; /* Putih Solid */
            padding: 40px;
            border-radius: 12px; /* Sudut agak melengkung */
            box-shadow: 0 20px 40px rgba(0,0,0,0.3); /* Bayangan agar kotak terlihat melayang */
            max-width: 850px;
            width: 90%;
            text-align: center;
        }

        /* Styling Tombol Menu */
        .btn-menu {
            border-radius: 8px;
            padding: 20px;
            font-weight: 600;
            transition: transform 0.2s, box-shadow 0.2s;
            color: white !important;
            border: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-width: 160px;
        }

        .btn-menu:hover {
            transform: translateY(-5px); /* Efek naik sedikit saat di-hover */
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .btn-menu i {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        /* Warna Khusus Tombol */
        .btn-blue { background-color: #0d6efd; }
        .btn-green { background-color: #198754; }
        .btn-orange { background-color: #fd7e14; }

    </style>
  </head>
  <body>

    <div class="navbar-wrapper">
        <?php include 'menu.php'; ?>
    </div>

    <div class="main-content">
        
        <div class="card-home">
            <h2 class="fw-bold text-dark mb-2">SISTEM INFORMASI UKT</h2>
            <p class="text-muted mb-5">Pengelolaan Data Mahasiswa & Pembayaran Ukt Semester</p>

            <div class="row g-3 justify-content-center">
                
                <div class="col-md-4 col-sm-6">
                    <a href="mahasiswa.php" class="btn btn-blue btn-menu w-100 h-100">
                        <i class="fa-solid fa-users"></i>
                        Data Mahasiswa
                    </a>
                </div>

                <div class="col-md-4 col-sm-6">
                    <a href="kelola_semester.php" class="btn btn-green btn-menu w-100 h-100">
                        <i class="fa-solid fa-calendar-days"></i>
                        Kelola Semester
                    </a>
                </div>

                <div class="col-md-4 col-sm-6">
                    <a href="ukt.php" class="btn btn-orange btn-menu w-100 h-100">
                        <i class="fa-solid fa-money-bill-wave"></i>
                        Pembayaran UKT
                    </a>
                </div>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>