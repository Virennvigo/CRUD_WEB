<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
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
        body {
            height: 100%;
            margin: 0; 
            display: flex;
            flex-direction: column;
        }

        .navbar {
            Z-index: 1030;
        }

        .main-content {
            /* flex: 1;
            margin-left: 250px; */
            padding: 20px;
            margin-top: 56px;
        }
    </style>

   <body>
    <nav class="navbar navbar-expand-ig navbar-dark bg-warning fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="assets/image/logo.png" alt="" height="50px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-lable="Toggle Navigatoion">
                <span class="navbar-toggle-icon"></span>
                <a href="login.php">Login</a>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
   
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   
    <!--main content-->
    <div class="main-content">