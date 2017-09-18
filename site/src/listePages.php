<?php
function getPage(){
	//On déclare dans el tableau $lesPages, une clé et un valeur
	//La clé est ajoutType, la valeur est ajouteType
	//1 voudra dire "Uniquement administrateur"
	//0 voudra dire "Tout le monde"
        $lesPages['BD']="BD;1";
	$lesPages['ajouteType']="ajoutType;1";
        $lesPages['ajoutClient']="ajoutClient;1";
	$lesPages['listeType']="listeType;1";
	$lesPages['accueil']="accueil;0";
	$lesPages['inscrire']="inscrire;0";
	$lesPages['ftp']="ftp;0";
	//Regarde si en mémoire, une variable "page" vient d'un lien ($_GET)
	if(isset($_GET['page'])){
	 //Nous mettons dans la variable $page, la valeur qui a été passée dans le lien
	 $page=$_GET['page'];
	}
	else{
	 //S'il n'y a rien en mémoire, nous lui donnons la valeur "accueil" afin de lui afficher une page par défaut
	 $page='accueil';
	}

	//Nous regardons si la page passée en paramètre est une clé du tableau $lesPages
	if(!isset($lesPages[$page])){
	 //Nous rentrons ici si cela n'existe pas, ainsi nous redirigeons l'utilisateur sur la page d'accueil
	 $page='accueil';
	}
	//Nous explosons la valeur du tableau correspondant à la clé
	//C'est le ; qui nous sert de repère
	 $explose=explode(";",$lesPages[$page]);
	//La fonction qui contient le contenu et qu'il faudra appeler se situe dans la case 0 du tableau explose
	 $contenu=$explose[0];
	//La fonction envoie le contenu
	 return $contenu;
	}
?>
