<?php
    if(!isset($_SESSION)) 
    { 
        session_start();
    if ($_SESSION['status'] != 'login') {
    header("location:../login.php");
    exit();
    } 
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Project CRUD PHP</title>
        <link rel="stylesheet" href="assets/bootstrap.min.css">
        <link rel="stylesheet" href="assets/DataTables-1.13.3/css/jquery.dataTables.min.css">
        <script src="assets/jquery-3.6.1.js"></script>
        <script src="assets/bootstrap.min.js"></script>
        <script src="assets/DataTables-1.13.3/js/jquery.dataTables.min.js"></script>
    </head>

    <style>
        html,
        body {
            height: 100%;
            margin: 0; 
            display: flex;
            flex-direction: column;
        }

        .navbar {
            Z-index: 1030;
        }

        .sidebar {
            position: fixed;
            top: 56px;
            left: 0;
            width: 250px;
            height: calc(100vh - 56px);
            background-color: #343a40;
            color: white;
            padding-top: 15px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
        }
        .sidebar a {
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            display: block;  
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 20px;
            margin-top: 56px;
        }
    </style>

   <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="assets/image/LOGO.png" alt="" height="50px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-lable="Toggle Navigatoion">
                <span class="navbar-toggle-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link text-dark">Welcome Back, <?php echo $_SESSION['username']; ?> </span>   
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- sidebar -->
    <div class="sidebar py-4">
        <a href="home.php">Dashboard</a>
        <a href="transaksi.php">Data Transaksi</a>
        <a href="user.php">Data user</a>
        <a href="./login/logout.php">Logout</a>
    </div>
    
    <!--main content-->
    <div class="main-content">