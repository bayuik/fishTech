<?php
    $selectFish = ["Ikan Hias", "Ikan Laut", "Ikan Predator"];
?>

<!doctype html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">                                                                                 
    <title>FishTech</title>
</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-dark py-2 py-md-0 " id="navbar">
        <div class="container">
            <h1><a href="index.php" class="navbar-brand">FishTech</a></h1>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="index.php" class="nav-link p-3">HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link p-3 dropdown-toggle" id="navbarDropdown" data-toggle="dropdown"
                            type="button">
                            CATEGORY
                        </a>
                        <div class="dropdown-menu">
                            <?php for($i = 0; $i < count($selectFish); $i++): ?>
                            <a href="selectFish.php?idCategory=<?= $i+1 ?>"
                                class="dropdown-item"><?= $selectFish[$i]; ?></a>
                            <?php endfor; ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="about.php" class="nav-link p-3">ABOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>