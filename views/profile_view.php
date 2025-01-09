<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container mt-5">
    <h2>Welkom, <?php echo htmlspecialchars($gebruiker['gebruikersnaam']); ?></h2>

    <div class="row">
        <div class="col-md-4">
            <div class="profielfoto-container">
                <img src="<?php echo htmlspecialchars($gebruiker['profielfoto']); ?>" alt="Profielfoto" class="img-fluid">
            </div>
        </div>
        <div class="col-md-8">
            <p><strong>Gebruikersnaam:</strong> <?php echo htmlspecialchars($gebruiker['gebruikersnaam']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($gebruiker['email']); ?></p>
            <p><strong>Telefoonnummer:</strong> <?php echo htmlspecialchars($gebruiker['telefoonnummer']); ?></p>
        </div>
    </div>

    <!-- Laat de uitlogknop alleen zien als de gebruiker zijn eigen profiel bekijkt -->
    <?php if ($is_own_profile): ?>
        <a href="logout.php" class="btn btn-danger mt-3">Uitloggen</a>
    <?php endif; ?>
</div>

<!-- Bottom Navigation Menu -->
<div class="bottom-nav">
    <div class="container">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="index.html">
                    <i class="bi bi-house-door"></i>
                    <img src="images/home.png" alt="home">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="search.php">
                    <i class="bi bi-search"></i>
                    <img src="images/search-interface-symbol.png" alt="search">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="profile.php">
                    <i class="bi bi-person"></i>
                    <img src="images/user.png" alt="user">
                </a>
            </li>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/logout.js"></script>
</body>
</html>
