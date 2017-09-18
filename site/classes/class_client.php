<?php
if(!class_exists('Client')){
  //initialisation de la session
  class Client{
      public function __construct(){        session_start();
        if(!isset($_SESSION['logged'])){
          $_SESSION['logged'] = "false";
        }
        if($_SESSION['logged'] == "true"){
          $_SESSION['FTP'] = ftp_connect('localhost') or die("Impossible de se connecter au serveur");
          $login = ftp_login($_SESSION['FTP'],$_SESSION['user'],$_SESSION['pass']);
        }
        return $_SESSION;
      }
      //Creer un compte
      public function NewAccount($user,$pass){
        exec('sudo useradd -p '.$pass.' '.$user);
        exec('sudo mkdir /home/'.$user);
        exec('sudo chown '.$user.':'.$user.' /home/'.$user);
        exec('(echo '.$pass.'; echo '.$pass.') | sudo pure-pw useradd '.$user.' -u '.$user.' -g '.$user.' -d /home/'.$user.' -m');
        exec('sudo ln -s /etc/pure-ftpd/conf/PureDB /etc/pure-ftpd/auth/50pure');
        exec('sudo /etc/init.d/pure-ftpd restart');
      }
      //connexion a un compte
      public function Connect($user,$pass){
        if($_SESSION['logged'] == "false"){
          $_SESSION['FTP'] = ftp_connect('localhost') or die("Impossible de se connecter au serveur");
          $login = ftp_login($_SESSION['FTP'],$user,$pass);
          if($login){
            $_SESSION['logged'] = "true";
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $pass;
          }
        }
        return $_SESSION['logged'];
      }
      public function Close(){
        $close = ftp_close($ftp);
      }
  }
}

$CL = new Client;
?>
