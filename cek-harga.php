<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$total = 0;
$hasil = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipe = $_POST['tipe'];
    $lantai = $_POST['lantai'];
    $hari = $_POST['hari'];
    $diskon = $_POST['diskon'];
    
    // Hitung harga dasar
    switch($tipe) {
        case 'standard':
            $harga = 300000;
            break;
        case 'superior':
            $harga = 400000;
            break;
        case 'deluxe':
            $harga = 500000;
            break;
    }
    
    // Hitung total berdasarkan hari
    $total = $harga * $hari;
    
    // Tambahan biaya lantai
    if ($lantai > 5) {
        $total += 50000;
    }
    
    // Hitung diskon
    if ($diskon == 'member') {
        $potongan = $total * 0.1;
        $total -= $potongan;
    } elseif ($diskon == 'hut') {
        $potongan = 100000;
        $total -= $potongan;
    }
    
    $hasil = "Total yang harus dibayar: Rp " . number_format($total, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Harga - Hotel Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .price-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            margin-top: 30px;
            font-size: 14px;
        }
        .contact-info {
            margin-bottom: 15px;
        }
        .contact-info p {
            margin-bottom: 5px;
            text-align: center;
        }
        .contact-title {
            font-size: 18px;
            margin-bottom: 15px;
            text-align: center;
        }
        .copyright {
            text-align: center;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Luxury Hotel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="cek-harga.php">Cek Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="price-container">
            <h2 class="text-center mb-4">Cek Harga Kamar</h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe Kamar</label>
                    <select class="form-select" id="tipe" name="tipe" required>
                        <option value="standard">Standard (Rp 300.000)</option>
                        <option value="superior">Superior (Rp 400.000)</option>
                        <option value="deluxe">Deluxe (Rp 500.000)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="lantai" class="form-label">Lantai</label>
                    <input type="number" class="form-control" id="lantai" name="lantai" min="1" required>
                </div>
                <div class="mb-3">
                    <label for="hari" class="form-label">Jumlah Hari</label>
                    <input type="number" class="form-control" id="hari" name="hari" min="1" required>
                </div>
                <div class="mb-3">
                    <label for="diskon" class="form-label">Diskon</label>
                    <select class="form-select" id="diskon" name="diskon">
                        <option value="none">Tidak Ada</option>
                        <option value="member">Member (10%)</option>
                        <option value="hut">Promo HUT (Rp 100.000)</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">CHECK</button>
            </form>
            
            <?php if($hasil): ?>
            <div class="alert alert-success mt-3" role="alert">
                <?php echo $hasil; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h3 class="contact-title">Contact Us</h3>
                    <div class="contact-info">
                        <p>Email: mhmdzki00@gmail.com</p>
                        <p>WhatsApp: 085954711445</p>
                        <p>Instagram: zzaaakk._</p>
                    </div>
                    <p>&copy; 2024 Luxury Hotel. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>