<?php session_start() ;
 

 $bd = mysqli_connect("localhost","root","","moduleconnexion");

 $requete = "SELECT * FROM `utilisateurs`";
 $query = mysqli_query($bd,$requete);
 $resultat = mysqli_fetch_all($query);

    foreach ($resultat as $key => $value){
        if (!empty($_POST)){
            if ( $_POST['login'] === $value[1] &&  $_POST['password'] === $value[4])
            {
                     $_SESSION['connect'] = "connecté";
                     $_SESSION['login'] = $_POST['login'];
                    if( $_POST['login'] === "admin")
                    {
                        header('location: admin.php');
                    }
                    else{
                        header('location: profil.php');
                    } 
            }
            else
            {
                $erreur = "Identifiant et/ou mot de passe incorrect !";
            }
        }
     }
 
mysqli_close($bd);
   
?>

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
            <a href="#" class="icon-facebook"></a>
            <a href="#" class="icon-pinterest"></a>
            <a href="#" class="icon-youtube"></a>
            <a href="#" class="icon-twitter"></a>
            <a href="#" class="icon-mail"></a>
        </nav>
        <nav >
            <a href="index.php"><img src="src/img/logo.png" alt="Logo" title="Retour à l'accueil"></a>
            <a href="#">Le blog</a>
            <a href="#">Aquarium débutant</a>
            <a href="">Les bassins</a>
            <a href="">Les accessoires</a>
            <a href="">Se connecter</a>
        </nav>
        
    </header>
    <main>
        <h1>Se connecter</h1>
        <?php if (!empty($erreur)) :?>
            <span class="red"><?php echo $erreur ?></span>
        <?php endif ;?>

        <?php if (!empty($_SESSION['erreur'] )) :?>
            <span class="red"><?php echo $_SESSION['erreur']  ?></span>
        <?php endif ;?>

        <?php if (!empty($_SESSION['erreur_admin'] )) :?>
            <span class="red"><?php echo $_SESSION['erreur_admin']  ?></span>
        <?php endif ;?>
        <section >
            <form action="connexion.php" method="POST">
                <fieldset>
                    <legend>Connexion</legend>
                    <div>
                        <label for="login">Votre login : </label>
                        <input type="text" name="login" required id="login">
                    </div>
                    <div>
                        <label for="password">Mot de passe:</label>
                        <input type="password" name="password" required id="password">
                    </div>
                    
                    <input type="submit">
                </fieldset> 
            </form>

            <p class="main-p">Vous n'avaez pas de compte <a href="inscription.php"> cliquer ici</a></p>
            <p class="main-p">Vous avez oublié votre mot de passe <a href="#">cliquer ici</a></p>
            
        </section> 
    </main>
    <footer>

            <h4>Qui sommes nous ?</h4>
            <p>Aquarium  est un blog aquariophiles qui prend le partie de la modernité pour rajeunir notre passion et susciter de nouvelles vocations chez les plus jeunes.</p>
            <a href="#">Nous contacter</a>

    </footer>
</body>
</html>
<?php unset($_SESSION['erreur'] ) ?>