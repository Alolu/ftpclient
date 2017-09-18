<?php
	function ftp(){
		//verifie si l'utilisateur est connecté
    if($_SESSION['logged'] != "false"){
    	$path = ftp_pwd($_SESSION['FTP']);
    	//script ajax pour recharger le tableau
    	echo "
    	<script>
    		function test(a){
    			console.log($(a).attr('id'));
    			$('.table').remove();
    			$.ajax({
    				type: 'POST',
    				url: 'http://172.20.10.5/site/src/controller/json.php',
    				data: {rec: $(a).attr('id'), user: '".$_SESSION['user']."', pass: '".$_SESSION['pass']."',path: '".$path."'},
    				success:function(html){
    					console.log(html);
    					$('#contenu').html(html);
             		}
    			});
    		}
    	</script>";
    	//genere le reepertoire choisi 
      $list = ftp_nlist($_SESSION['FTP'],"/");
      if($list){
        echo "
        <table class='table table-striped'>
         <caption>Access path:".ftp_pwd($_SESSION['FTP'])."</caption>
          <thead>
            <tr>
              <th><h4>Type</h4></th>
              <th><h4>Name</h4></th>
              <th><h4>Last modification</h4></th>
              <th><h4>Size</h4></th>
            </tr>
          </thead>
          <tbody>";
        
        foreach($list as $sList){
          if(@ftp_chdir($_SESSION['FTP'], $sList)){
            $time = ftp_mdtm($_SESSION['FTP'], $sList);
            ftp_cdup($_SESSION['FTP']);
            echo "<tr>
                    <td><span style='margin-left:30%;' class='glyphicon glyphicon-folder-open'></span></td>
                    <td><a id='".$sList."' onclick='test(this)' class='ftpTrigger'>" .$sList."</a></td>
                    <td></td>
                    <td></td>
                  </tr>";
          }else{
            $time = ftp_mdtm($_SESSION['FTP'], $sList);
            echo "<tr>
                    <td><span style='margin-left:30%;' class='glyphicon glyphicon-file'></span></td>
                    <td>" .$sList."</td>
                    <td>" . date("d/m/Y H:i:s",$time) ."</td>
                    <td>" .ftp_size($_SESSION['FTP'], $sList). " kb </td>
                  </tr>";
          }
        }
        echo "</tbody>
            </table>";
      }
  }

  }
  function accueil(){
    	echo"</br><h4>Challenge 1 – Réalisation d’un prototype</h4>
      <p>Travail à faire : À partir du thème donné, vous devez imaginer une application sous la forme d’un
script, d’un site internet ou les deux qui utilisera cette technologie. Vous travaillerez à partir du
serveur FTP de votre choix.</p>
      <p>À vous de trouver quel genre d’application vous pourriez créer pour
faciliter son utilisation, son paramétrage, ou autre.</p>";
    }
  function Chdire($des){
  	ftp_chdir($_SESSION['FTP'],$des);
  }