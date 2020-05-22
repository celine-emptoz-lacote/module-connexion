<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="src/img/logo.png" />
    <link rel="stylesheet" href="src/fontello/css/fontello.css">
    <link rel="stylesheet" href="src/CSS/styles.css">
    <title>Accueil</title>
</head>
<body>
    <header>
        <nav class="reseaux">
            <a href="https://fr-fr.facebook.com/" class="icon-facebook"></a>
            <a href="https://www.pinterest.fr/" class="icon-pinterest"></a>
            <a href="https://www.youtube.com/" class="icon-youtube"></a>
            <a href="https://twitter.com/" class="icon-twitter"></a>
            <a href="#" class="icon-mail"></a>
        </nav>
        <nav >
            <a href="index.php"><img src="src/img/logo.png" alt="Logo" title="Retour à l'accueil"></a>
            <a href="#">Le blog</a>
            <a href="#">Aquarium débutant</a>
            <a href="#">Les bassins</a>
            <a href="#">Les accessoires</a>
            <?php if (!empty($_SESSION['login'])) :?>
                <?php if ($_SESSION['login'] =="admin") :?>
                    <a href="admin.php">Admin</a>
                <?php endif ;?>
                <a href="profil.php">Mon compte</a>
                
            <?php else :?>
                <a href="connexion.php">Se connecter</a>
            <?php endif ;?>
        </nav>
        <div>
            <img src="src/img/aquarium.jpg" alt="Photo aquarium">
        </div>
    </header>
    <main>
        <section class="section-main">
            <div>
                <h1>La découverte d'un monde vivant</h1>
                <p>L’aquariophilie une passion éducative qui nécessite patience et rigueur</p>
                <p>Parfait pour faire découvrir le fonctionnement de la nature aux plus jeunes et aux citadins.</p>
            </div>
            <div>
                <h1>Observer et apprendre</h1>
                <p>Le savoir se trouve dans les livres, les blogs et les forums mais chaque bac est différent.</p>
                <p>Observer & apprendre, sont les clefs et font de l’aquariophilie un loisir riche et passionnant.</p>
            </div>
            <div>
                <h1>Notre communauté</h1>
                <p>Moteur de rencontres aquariophiles et de discussions passionnantes en commentaires d’articles et sur les réseaux sociaux.</p>
                <p>Le partage & la convivialité sont nos maîtres mots.</p>
            </div>
        </section>

        <section class="section2">
            <h1>L’aquariophilie</h1>
           <div class="div-principale">
               <div>
                    <p class="main-p">L’aquariophilie vous tente mais vous ne savez pas par où commencer ?</p>
                    <p class="main-p">Découvrez notre guide “Aquarium débutant” pour vous guider pas à pas de l’achat du matériel à l’acclimatation des poissons.</p>
               </div>
               <div>
                    <a href="#">Débuter</a>
               </div>
           </div>
        </section>
        <section class="section3">
            <section class="section-flex1">
                <h2>Les derniers accessoires</h2>
                <div>
                    <article>
                        <a href="#"><img src="src/img/plante.jpg" alt="Plante Aquarium"></a>
                        <h3>Plante Aquarium </h3>
                    </article>
                    <article>
                        <a href=""><img src="src/img/roche.jpg" alt="AQUA DECO"></a>
                        <h3>AQUA DECO Fiery Red Rock </h3>
                    </article>
                    <article>
                        <a href=""><img src="src/img/aqua.jpg" alt="Aquarium"></a>
                        <h3>Aquarium AQUATLANTIS</h3>
                    </article>
                </div>
            </section>
            
        </section>
    </main>
    <footer>
            <h4>Qui sommes nous ?</h4>
            <p>Aquarium  est un blog aquariophiles qui prend le partie de la modernité pour rajeunir notre passion et susciter de nouvelles vocations chez les plus jeunes.</p>

            <a href="#">Nous contacter</a>
    </footer>
</body>
</html>