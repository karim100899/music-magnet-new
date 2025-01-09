<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-5">
    <h2>Inloggen</h2>

    <?php if (isset($foutmelding)): ?>
        <div class="alert alert-danger">
            <?php echo $foutmelding; ?>
        </div>
    <?php endif; ?>

    <!-- Login Formulier -->
    <form method="POST" action="login.php">
        <div class="mb-3">
            <label for="invoer" class="form-label">Gebruikersnaam of E-mail</label>
            <input type="text" class="form-control" id="invoer" name="invoer" required>
        </div>
        <div class="mb-3">
            <label for="wachtwoord" class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" id="wachtwoord" name="wachtwoord" required>
        </div>
        <button type="submit" class="btn btn-primary">Inloggen</button>
    </form>


    <p>Heb je geen account? <a href="register.php">Registreer hier</a></p>
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
