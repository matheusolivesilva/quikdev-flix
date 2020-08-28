<?php require_once 'config.php'?>
<html>
    <head>    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="assets/images/favicon.png">
        <link rel="stylesheet" href="assets/css/global.css">
        <link rel="stylesheet" href="assets/css/search.css">
        <link rel="stylesheet" href="assets/css/header.css">
        <link rel="stylesheet" href="assets/css/listing-movies.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&amp;display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://kit.fontawesome.com/4cd57d5e98.js" crossorigin="anonymous"></script>
        <title>QuikDevFlix</title>
        <script>
            const apiBaseUri = '<?= API_BASE_URI ?>'; 
        </script>
    </head>
    <body>
        <div class="header">
            <figure class="logo-container">
                <a href="index.html">
                    <img src="assets/images/logo-quikdevflix.png" alt="QuikDev Flix Logo">
                </a>            
            </figure>
            <div class="toggle-menu"><i class="fas fa-bars"></i></div>
            <nav class="navbar">
                <ul>
                    <li><a href="<?= WEB_URL?>">Home</a></li>
                    <li><a href="<?= WEB_URL?>#trending">Trending</a></li>
                    <li><a href="<?= WEB_URL?>#search"><i class="fas fa-search"></i>Search</a></li>
                </ul>
            </nav>
        </div>