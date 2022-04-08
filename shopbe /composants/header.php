<?php

    if(!isset($_COOKIE['panier'])) {
        setcookie("panier", 0, time()+3600);
    } 

    if(!isset($_COOKIE['achat'])) {
        setcookie('achat', 0, time()+3600);
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
    <body>
        <header>
                <h1 class="nom-site">Digital Workshop</h1>
                <p>best video programming conference</p>
        </header>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">Digital Workshop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-auto" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" href="index.php">Principal<span class="sr-only">(current)</span></a>
                        <a class="nav-link" href="login.php">Mon compte</a>
                        <a class="nav-link" href="list-products.php">Mes articles</a>
                        <a class="nav-link" href="panier.php">Panier</a>
                        <div class="nav-link">
                            <span class="blanco"><i class="fas fa-shopping-cart light"></i></span>
                            <span id="nombre-articles" class="badge badge-light"><?php if(isset($_COOKIE['panier'])) { echo $_COOKIE['panier']; } else { echo 0; } ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="cuerpo">
        <!-- Affichage des messages flash -->
            <?php if(isset($_SESSION['flash'])):?>
                <?php foreach($_SESSION['flash'] as $type => $message): ?>
                    <div class="<?php echo $type; ?> message ">
                        <div class="header"><?php echo $message; ?></div>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>