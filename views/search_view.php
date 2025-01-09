<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoeken</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container mt-5">
    <h2>Zoeken</h2>

    <!-- Zoekbalk -->
    <form method="GET" action="search.php">
        <div class="input-group mb-4">
            <input type="text" class="form-control" placeholder="Zoek naar gebruikers" name="search" value="<?php echo htmlspecialchars($search_query); ?>">
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-search"></i> Zoeken
            </button>
        </div>
    </form>

    <!-- Zoekresultaten -->
    <?php if ($search_query): ?>
        <h4>Resultaten voor: "<?php echo htmlspecialchars($search_query); ?>"</h4>
        <div class="row">
            <?php if (count($resultaten) > 0): ?>
                <?php foreach ($resultaten as $gebruiker): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="profielfoto-container">
                                <img src="<?php echo htmlspecialchars($gebruiker['profielfoto']); ?>" alt="Profielfoto">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($gebruiker['gebruikersnaam']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($gebruiker['email']); ?></p>
                                <a href="profile.php?user_id=<?php echo $gebruiker['userID']; ?>" class="btn btn-primary">Bekijk profiel</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Geen resultaten gevonden.</p>
            <?php endif; ?>
        </div>
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
</body>
</html>
