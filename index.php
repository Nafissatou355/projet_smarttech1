<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - SmartTech</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">SmartTech</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="employe/liste.php">Employés</a></li>
                    <li class="nav-item"><a class="nav-link" href="client/liste.php">Clients</a></li>
                    <li class="nav-item"><a class="nav-link" href="documents/liste.php">Documents</a></li>
                    <li class="nav-item"><a class="nav-link" href="mail.php">Messagerie</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <header class="bg-primary text-white text-center py-5">
        <h1>Bienvenue sur la plateforme SmartTech</h1>
        <p>Gestion des employés, clients et documents en toute simplicité</p>
    </header>
    
    <div class="container text-center mt-5">
        <div class="row">
            <div class="col-md-4">
                <h3>Gestion des employés</h3>
                <p>Ajoutez, modifiez et supprimez les employés.</p>
                <a href="employe/liste.php" class="btn btn-primary">Accéder</a>
            </div>
            <div class="col-md-4">
                <h3>Gestion des clients</h3>
                <p>Visualisez et gérez les informations des clients.</p>
                <a href="client/liste.php" class="btn btn-success">Accéder</a>
            </div>
            <div class="col-md-4">
                <h3>Documents</h3>
                <p>Partagez et stockez des fichiers en toute sécurité.</p>
                <a href="documents/liste.php" class="btn btn-warning">Accéder</a>
            </div>
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
