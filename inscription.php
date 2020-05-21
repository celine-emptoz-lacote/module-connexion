<?php session_start();

if ( !empty($_POST))
{
    $login1 = $_POST["login"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];

    $bd = mysqli_connect("localhost","root","","moduleconnexion");

    $requete = "SELECT COUNT(login) FROM utilisateurs WHERE login = '$login1' ";
    $query1 = mysqli_query($bd,$requete);
    $resultat = mysqli_fetch_all($query1);

    if ( $resultat[0][0] == 0) {
        if ( !empty($login1) || !empty($nom) || !empty($prenom) || !empty($password) || !empty($password2) ) 
        {
            if ( $password == $password2 )
            {
                $requete_enregistrement = "INSERT INTO utilisateurs (`login`, `prenom`, `nom`, `password`) VALUE ('$login1', '$prenom' , '$nom', '$password') ";
                $query = mysqli_query( $bd, $requete_enregistrement);
                $message = "Merci pour votre inscription !";
                $_SESSION['message'] = $message;
                header('Location: connexion.php');
                exit();
            }       
            else 
            {
                $erreurMDP = "Erreur dans le mot de passe";
            }   
        }
    }
    else 
    {
        $erreur = "speudo existant";   
    }
 
mysqli_close($bd);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="src/img/logo.png" />
    <link rel="stylesheet" href="src/fontello/css/fontello.css">
    <link rel="stylesheet" href="src/CSS/styles.css">
    <title>Inscription</title>
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
            <a href="#">Les bassins</a>
            <a href="#">Les accessoires</a>
            <a href="#">Se connecter</a>
        </nav>
    </header>
    <main>
        <h1>Vous n'avez pas de compte ?</h1>

        <?php if (!empty($erreurMDP)) : ?>
        <p ><span class="red"><?php echo $erreurMDP ?></span></p>
        <?php endif ;?>

        <?php if (!empty($erreur)) : ?>
        <p><span class="red"><?php echo $erreur ?></span></p>
        <?php endif ;?>

        <form action="inscription.php" method="POST">

            <fieldset>
                <legend>S'inscrire</legend>
                <div >
                    <label for="login">Login :</label>
                    <input type="text" id="login" name="login" placeholder="Votre login" value="<?php if(!empty($_POST['login'])) echo $_POST['login'] ?>" required >  
                </div>
                <div>
                    <label for="prenom">Votre prénom :</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" value="<?php if(!empty($_POST['prenom'])) echo $_POST['prenom'] ?>"required>
                
                    <label for="nom"> Votre nom :</label>
                    <input type="text" id="nom" name="nom" placeholder="Votre mon" value="<?php if(!empty($_POST['nom'])) echo $_POST['nom'] ?>"required>
                </div>
                <div>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" required>
                
                    
                    <input type="password" id="password" name="password2" placeholder="Confirmer votre mot de passe" required>
                </div>
                <input type="submit">
            </fieldset>
        </form>

        <p class="main-p">Si vous avez deja un compte <a href="connexion.php"> cliquer ici</a></p>
        <p class="main-p">Vous avez oublié votre mot de passe <a href="#">cliquer ici</a></p>
    </main>
    <footer>
        <h4>Qui sommes nous ?</h4>
        <p>Aquarium  est un blog aquariophiles qui prend le partie de la modernité pour rajeunir notre passion et susciter de nouvelles vocations chez les plus jeunes.</p>

        <a href="#">Nous contacter</a>
    </footer>
</body>
</html>