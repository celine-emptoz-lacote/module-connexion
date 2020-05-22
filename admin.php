<?php session_start();

if (!$_SESSION['login']){
    $_SESSION['erreur'] = "Veuillez vous connecter pour avoir accée à cette page";
    header('location: connexion.php');
}
elseif ($_SESSION['login'] != "admin"){
    $_SESSION['erreur_admin'] = "Accès refusé !";
    header('location: connexion.php');
}
else{
    $bd = mysqli_connect("localhost","root","","moduleconnexion");
    $requete = "SELECT * FROM `utilisateurs` WHERE login != 'admin'";
    $query = mysqli_query($bd,$requete);
    $users = mysqli_fetch_all($query);

    $requete_colonnes= "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE table_name= 'utilisateurs'";
    $query_colonnes = mysqli_query($bd,$requete_colonnes);
    $colonnes = mysqli_fetch_all($query_colonnes);

    $requete_comptage = "SELECT COUNT(id) as nb FROM utilisateurs WHERE login != 'admin' ";
    $query_comptage = mysqli_query($bd,$requete_comptage);
    $nombre = mysqli_fetch_all($query_comptage,MYSQLI_ASSOC );

  
    
    if(!empty($_GET))
    
    {
        $id_delete = $_GET['id_supp'];
        $delete = "DELETE FROM `utilisateurs` WHERE `id` = $id_delete ";
        $query_delete = mysqli_query($bd,$delete);
        $requete = "SELECT * FROM `utilisateurs` WHERE login != 'admin'";
        $query = mysqli_query($bd,$requete);
        $users = mysqli_fetch_all($query);
    }
   
    mysqli_close($bd);
    
}

?>


<!DOCTYPE html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="src/img/logo.png" />
    <link rel="stylesheet" href="src/fontello/css/fontello.css">
    <link rel="stylesheet" href="src/CSS/styles.css">
    <title>Admin</title>
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
            <a href="profil.php">Mon compte</a>
            <?php if (!empty($_SESSION['connect'])) : ?>
                <a href="logout.php">Déconnexion</a>
            <?php endif ;?>
        </nav>
        
    </header>
    <main>
        <h1>Page administration</h1>
        
        <p>Il y a <b><span class="red"> <?=  $nombre[0]['nb'] ?> </span></b>   membres inscrit sur votre site !</p>
        <table>
            <thead>
                <tr>
                    <?php foreach ($colonnes as $value) :?>
                        <?php if ($value[0] != 'id' ) :?>  
                                <th><?php echo $value[0]  ?></th> 
                        <?php endif ;?>  
                    <?php endforeach ;?>  
                    <th>Supprimer</th>     
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $users as $value) :?>
                <tr>
                    <?php for ($i = 1 ; $i<COUNT($value); $i++) :?>
                        <td><?php echo $value[$i] ?></td>   
                     <?php endfor ;?> 

                     <td><form action="admin.php" method = "GET">
                            <input type="hidden" name="id_supp" value="<?php echo $value[0] ?>" />
                            <input id="poubelle" value="Supprimer" type="submit"> 
                        </form>
                    </td> 
                </tr>
                <?php endforeach ;?>  
            </tbody>
        </table>
        
    </main>
    <footer>
            <h4>Qui sommes nous ?</h4>
            <p>Aquarium  est un blog aquariophiles qui prend le partie de la modernité pour rajeunir notre passion et susciter de nouvelles vocations chez les plus jeunes.</p>
            <a href="#">Nous contacter</a>
    </footer>
</body>
</html>