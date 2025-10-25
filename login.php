<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <style>
    body, html {
        height: 100%;
        margin: 0;
    }
    .bg-video {
        position: fixed;
        top: 0; left: 0;
        width: 100vw;
        height: 100vh;
        object-fit: cover;
        z-index: -1;
    }
    .card {
        z-index: 1;
        background: rgba(255, 255, 255, 0.3); /* Transparan putih */
        box-shadow: 0 4px 16px rgba(0,0,0,0.15);
        border: none;
        /* Efek blur untuk kaca */
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }
    </style>
</head>
<body>
    <!-- Video Background -->
    <video class="bg-video" autoplay loop muted>
        <source src="assets/video/LOG IN.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 400px;">
            <form action="login/proses_login.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</body>
</html>