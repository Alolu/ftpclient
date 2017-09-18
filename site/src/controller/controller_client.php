<?php
function ajoutClient($db) {
   if (isset($_POST['Valider'])){
$nom = $_POST['nom'];
echo $nom;
$prenom = $_POST['prenom'];
echo $prenom;
$tel = $_POST['tel'];
echo $tel;
$mdp = $_POST['mdp'];
echo $mdp;
$adresse = $_POST['adresse'];
echo $adresse;
$ville = $_POST['ville'];
echo $ville;
$cp = $_POST['cp'];
echo $cp;
$email = $_POST['email'];
echo $email;
         //var_dump($_POST);
                  // var_dump est une fonction qui affiche la structure et le    
                  //contenu d'une variable, cela est pratique pour les tableaux 
                  //et pour voir si les valeurs ont bien été passées
                  //décommentez la ligne pour que le var_dump s’exécute
                 
;
                  if ($nb!=1){
                      echo 'Erreur lors de l\'insertion'
;
                  }else{
                      echo 'Insertion réussie'
;
   }}
    $client = new Client($db);
    $nb = $client->insertAll($email, $mdp, $nom, $prenom, $adresse, $ville, $cp, $tel);
    if ($nb != 1) {
        echo 'erreur à l\'insertion';
    }
}

function supprClient($db) {
    $client = new Client($db);
    $nb = $client->deleteOne($email);
    if ($nb != 1) {
        echo ' erreur lors de la modification';
    }
}

function modifClient($db) {
    $client = new Client($db);
    $nb = $client->updateAll($email, $nom, $prenom, $adresse, $ville, $cp, $tel);
    if ($nb != 1) {
        echo ' erreur lors de la modification';
    }
}

function listerClient($db) {
    $client = new Client($db);
    $liste = $client->selectAll();
    foreach ($liste as $unClient) {
        echo $unClient['nom'] . ' ' . $unClient['prenom'];
    }
}

function recupUnEnregistrement($db) {
    $client = new Client($db);
    $unClient = $client->selectOne($email);
    echo $unClient['nom'] . ' ' . $unClient['prenom'];

    
}

?>