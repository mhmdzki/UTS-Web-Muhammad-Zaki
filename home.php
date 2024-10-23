<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Hotel Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .carousel-item img {
            height: 500px;
            object-fit: cover;
            margin : 0 auto;
        }
        .hotel-info {
            padding: 50px 0;
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
                        <a class="nav-link active" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cek-harga.php">Cek Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Image Slider -->
    <div id="hotelCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#hotelCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#hotelCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#hotelCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cache.marriott.com/marriottassets/marriott/CAIBR/caibr-exterior-0044-hor-feat.jpg">
            </div>
            <div class="carousel-item">
                <img src="https://assets.hyatt.com/content/dam/hyatt/hyattdam/images/2020/01/20/1034/Hotel-du-Palais-Biarritz-P038-Hotel-Exterior.jpg/Hotel-du-Palais-Biarritz-P038-Hotel-Exterior.16x9.jpg">
            </div>
            <div class="carousel-item">
                <img src="https://cache.marriott.com/marriottassets/marriott/SFOLC/sfolc-court-9285-hor-feat.jpg">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#hotelCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#hotelCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Hotel Information -->
    <div class="container hotel-info">
        <div class="row">
            <div class="col-md-6">
                <h2>Welcome to Luxury Hotel</h2>
                <p>Experience luxury and comfort at its finest. Our hotel offers world-class amenities and exceptional service to make your stay memorable.</p>
            </div>
            <div class="col-md-6">
                <h3>Our Facilities</h3>
                <ul class="list-group">
                    <li class="list-group-item">24/7 Room Service</li>
                    <li class="list-group-item">Swimming Pool</li>
                    <li class="list-group-item">Fitness Center</li>
                    <li class="list-group-item">Spa and Wellness Center</li>
                    <li class="list-group-item">Fine Dining Restaurant</li>
                </ul>
            </div>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>