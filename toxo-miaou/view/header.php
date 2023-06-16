<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hell's Cat</title>
    
    <script src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel="stylesheet" href="http://localhost:8090/toxo-miaou/assets/css/styles.css">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;200;300;400;500;600;700;800;900&family=Eater&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>

<body class="d-flex flex-column container-fluid p-0">

<header>
        <div id="titre">
            <h1 class="display-1">T<img src="http://localhost:8090/toxo-miaou/assets/images/vector-eyes.svg" alt="">OXO-MIAOU</h1>
        </div>
        <div id="sous_titre">
            <p>C<img src="http://localhost:8090/toxo-miaou/assets/images/footprints.svg" alt="Choose your pet human">hoose your pet human</p>
        </div>
    </header>

    <nav class="navbar navbar-expand-md justify-content-evenly sticky-top">
        <div class="flex-grow-1">
            <button class="navbar-toggler px-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <img id="menu" class="h-auto w-auto" src=".http://localhost:8090/toxo-miaou/assets/images/icones/Hamburger_menu.svg" alt="hamburger menu">
            </button>
            <div class="griffe">
                <img src="http://localhost:8090/toxo-miaou/assets/images/griffes.png" alt="">
            </div>
            <div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-0 w-100 justify-content-evenly">
                    <li class="nav-item"><a class="nav-link text-decoration-none text-dark" href="index.php">Welcome</a></li>
                    <li class="nav-item"><a class="nav-link text-decoration-none text-dark" href="index.php/?url=product_profile">New</a></li>
                    <li class="nav-item"><a class="nav-link text-decoration-none text-dark" href="index.php/?url=user_profile">Profile</a></li>
                    <li class="nav-item"><a class="nav-link text-decoration-none text-dark" href="index.php/?url=error">Cart</a></li>
                </ul>
            </div>
        </div>
        <form id="search" class="d-flex me-3">
            <input class="my-auto border-end-0" type="search">
            <button class="p-0 btn btn-light border-start-0 border border-2" type="button"><img src="http://localhost:8090/toxo-miaou/assets/images/icones/Research.svg" alt=""></button>
        </form>
    </nav>