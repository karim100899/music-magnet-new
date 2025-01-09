<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Registreer</h2>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="gebruikersnaam" class="form-label">Gebruikersnaam:</label>
            <input type="text" class="form-control" name="gebruikersnaam" id="gebruikersnaam" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="mb-3">
            <label for="wachtwoord" class="form-label">Wachtwoord:</label>
            <input type="password" class="form-control" name="wachtwoord" id="wachtwoord" required>
        </div>
        <div class="mb-3">
            <label for="wachtwoord_herhaal" class="form-label">Herhaal Wachtwoord:</label>
            <input type="password" class="form-control" name="wachtwoord_herhaal" id="wachtwoord_herhaal" required>
        </div>
        <div class="mb-3">
            <label for="telefoonnummer" class="form-label">Telefoonnummer:</label>
            <input type="text" class="form-control" name="telefoonnummer" id="telefoonnummer">
        </div>
        <div class="mb-3">
            <label for="profielfoto" class="form-label">Profielfoto:</label>
            <input type="file" class="form-control" name="profielfoto" id="profielfoto">
        </div>
        <button type="submit" class="btn btn-primary">Registreer</button>
    </form>

    <p>Heb je al een account? <a href="login.php">Log hier in</a></p>
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
</body>
</html>
