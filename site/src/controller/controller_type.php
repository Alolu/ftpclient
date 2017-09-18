<?php
function ajoutType($db){
if (isset($_POST['btAjouter'])){
$nom = $_POST['nom'];
         //var_dump($_POST);
                  // var_dump est une fonction qui affiche la structure et le    
                  //contenu d'une variable, cela est pratique pour les tableaux 
                  //et pour voir si les valeurs ont bien été passées
                  //décommentez la ligne pour que le var_dump s’exécute
                  $type = new Type($db)
;
                  $nb = $type->insertAll($nom)
;
                  if ($nb!=1){
                      echo 'Erreur lors de l\'insertion'
;
                  }else{
                      echo 'Insertion réussie'
;
                  }
          }
          
          
  
  
 
}

 function listeTypes($db){
$type = new Type($db);
$liste = $type->selectAll();
echo '<table>';
echo '<tr><th>Nom</th></tr>';
foreach($liste as $unType){
  echo '<tr><td> '.utf8_encode($unType['nomType']).'</td></tr>';
}
echo '</table>';
}

?>