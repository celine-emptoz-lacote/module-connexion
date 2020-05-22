<?php session_start();

$login = $_SESSION['login'] ;

//empeche la connexion a la page profil si non connecter
if (!$_SESSION['login']){
    header('location: connexion.php');
}
else{
    $bd = mysqli_connect("localhost","root","","moduleconnexion");

    if( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['password']) && isset($_POST['password2']) )
    {
        if ( $_POST['password'] == $_POST['password2'])
        { 
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $password = $_POST['password'];
                $update = "UPDATE `utilisateurs` SET nom = '$nom' , prenom = '$prenom' , password = '$password' WHERE login = '$login'";
                $query1 = mysqli_query($bd,$update);
                $requete = "SELECT * FROM utilisateurs WHERE login = '$login' ";
                $query = mysqli_query($bd,$requete);
                $user = mysqli_fetch_all($query, MYSQLI_ASSOC);
                $message = "Changement en registré !";
                
        }
        else{
            $erreur =" Les mots de passe ne sont pas identique !";
            $requete = "SELECT * FROM utilisateurs WHERE login = '$login' ";
            $query = mysqli_query($bd,$requete);
            $user = mysqli_fetch_all($query, MYSQLI_ASSOC);
        }
        
    }
    else {
        $requete = "SELECT * FROM utilisateurs WHERE login = '$login' ";
        $query = mysqli_query($bd,$requete);
        $user = mysqli_fetch_all($query, MYSQLI_ASSOC);
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
    <title>Profil</title>
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
            <?php if ($_SESSION['login'] == 'admin') :?>
                <a href="admin.php">Espace administrateur</a>
            <?php endif ;?>
            <?php if (!empty($_SESSION['connect'])) : ?>
                <a href="logout.php">Déconnexion</a>
            <?php endif ;?>
        </nav>
    </header>
    <main class="main-profil">
        <div class="main-profil-header">
            <h1>Mon profil</h1>
            <img src="src/img/profil.png" alt="">
        </div>
        
        <form action="profil.php" method="POST">
            <fieldset>  
                <div >
                    <label for="login">Login :</label>
                    
                    <input type="text" id="login" name="login" value="<?php echo $user[0]['login'] ?>"  >
                </div>
                <div>
                    <label for="prenom">Votre prénom :</label>
                    <input type="text" id="prenom" name="prenom" value="<?php echo $user[0]['prenom'] ?>">

                    <label for="nom"> Votre nom :</label>
                    <input type="text" id="nom" name="nom" value="<?php echo $user[0]['nom'] ?>">
                </div>
                <div>
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" value="<?php echo $user[0]['password'] ?>">

                    <label for="password2">Mot de passe :</label>
                    <input type="password" id="password2" name="password2" value="<?php echo $user[0]['password'] ?>">
                </div>
                <input type="submit" name="submit" >
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