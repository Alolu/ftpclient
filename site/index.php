<?php
  //Importe le fichier presentation.php dans notre projet
  require_once 'src/config.php';
  require_once 'src/bd/connexion.php';
  require_once 'src/listePages.php';
  require_once 'src/controller/controller_client.php';
  require_once 'src/controller/controller_type.php';
  require_once 'src/controller/controller_accueil.php';
  require_once 'classes/class_client.php';
  require_once 'src/presentation.php';
 
  //Appel de la fonction entete
  entete();
  $db = connect($config);  // Connexion à la base de données
  $contenu = getPage();
  if ($db != NULL){ // Si la base de données renvoie une valeur différente de NULL
     echo '<div class="row">';  // On affiche la page normalement
     echo '<div class="col-lg-3 col-md-3">';
          menu();
     echo '</div>';
     echo '<div id="contenu" class="col-lg-9 col-md-9">';
          $contenu($db);
     echo '</div>';
     echo '</div>';
  }
  else{ // Sinon nous indiquons à l'utilisateur que le site est indisponible 
      echo 'Le site est indisponible pour quelques instants';
  }
  bas();

?>
