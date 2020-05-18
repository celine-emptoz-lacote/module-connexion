<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/fontello/css/fontello.css">
    <link rel="stylesheet" href="src/CSS/styles.css">
    <title>Profil</title>
</head>
<body>
    <header>
        <nav class="reseaux">
            <a href="#"class="icon-facebook"></a>
            <a href="#" class="icon-pinterest"></a>
            <a href="#" class="icon-youtube"></a>
            <a href="#"class="icon-twitter"></a>
            <a href="#" class="icon-mail"></a>
        </nav>
        <nav >
            <a href="accueil.php"><img src="src/img/logo.png" alt="Logo" title="Retour à l'accueil"></a>
            <a href="#">Le blog</a>
            <a href="#">Aquarium débutant</a>
            <a href="">Les bassins</a>
            <a href="">Les accessoires</a>
            <a href="">Se connecter</a>
        </nav>
    </header>
    <main class="main-profil">
        <div class="main-profil-header">
            <h1>Mon profil</h1>
            <img src="src/img/profil.png" alt="">
        </div>
        
        <form action="" method="POST">

            <fieldset>
                
                <div >
                    <label for="login">Login :</label>
                    <input type="text" id="login" name="login" required >
                </div>
                <div>
                    <label for="prenom">Votre prénom :</label>
                    <input type="text" id="prenom" name="prenom" required>

                    <label for="nom"> Votre nom :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                <div>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>

                    <label for="password2">Mot de passe :</label>
                    <input type="password" id="password2" name="password2" required>
                </div>
                <input type="submit" value="Modifier">
            </fieldset>
        </form>

      
    </main>
    <footer>
        <h4>Qui sommes nous ?</h4>
        <p>Aquarium  est un blog aquariophiles qui prend le partie de la modernité pour rajeunir notre passion et susciter de nouvelles vocations chez les plus jeunes.</p>

        <a href="#">Nous contacter</a>
    </footer>
</body>
</html>