<?php
  require_once'config.php';
  function my_sql_creer_compte($mdproot, $user, $mdp){
    echo"Mysql_creer_compte \n";
    $execution='mysql -h localhost -u root -p'.$mdproot.'-s mysql -e"';
    $cmd='create "user '.$user.'@localhost identified by \''.$mdp.'\'"';
    $ligne=$execution.$cmd;
    echo "$ligne\n";
    shell_exec($ligne);
  }

  function mysql_creer_bd($mdproot, $user, $bd){
    echo"Mysql_creer_bd\n";
    $execution='create database bdt$user default character set utf8 default collate utf8_general_ci';
  }

  function mysql_creer_compte_fichier($mdproot){
    $fichier='test.txt';
    $leslignes=file($fichier);
    foreach($leslignes as $uneligne){
      echo "$uneligne \n";
      $explode=explode(";",$uneligne);
      $user=$explode[0];   $user=trim($user);
      $mdp=$explode[1];    $mdp=trim($mdp);
      mysql_creer_compte($mdproot,$user,$mdp);
    }
  }
?>
