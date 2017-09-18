<?php
	Json();
	//Fonction utilisée avec AJAX pour recharger le tableau
	function Json(){
		$ftp = ftp_connect('localhost') or die("Impossible de se connecter au serveur");
        $login = ftp_login($ftp,$_POST['user'],$_POST['pass']);
        $up = ftp_chdir($ftp, $_POST['rec']);
        $list = ftp_nlist($ftp, ftp_pwd($ftp));       
        if($list){ 
        $first =  "
        <table class='table table-striped'>
         <caption>Access path:".ftp_pwd($ftp)."</caption>
          <thead>
            <tr>
              <th><h4>Type</h4></th>
              <th><h4>Name</h4></th>
              <th><h4>Last modification</h4></th>
              <th><h4>Size</h4></th>
            </tr>
          </thead>
          <tbody>";
        
        foreach($list as $i => $sList){
          if(@ftp_chdir($ftp, $sList)){
            $time = ftp_mdtm($ftp, $sList);
            ftp_cdup($ftp);
            $seconde[$i] = "<tr>
                    <td><span style='margin-left:30%;' class='glyphicon glyphicon-folder-open'></span></td>
                    <td><a id='".$sList."' onclick='test(this)' class='ftpTrigger'>" .$sList."</a></td>
                    <td></td>
                    <td></td>
                  </tr>";

          }else{
            $time = ftp_mdtm($ftp, $sList);
            $seconde[$i] = "<tr>
                    <td><span style='margin-left:30%;' class='glyphicon glyphicon-file'></span></td>
                    <td>" .$sList."</td>
                    <td>" . date("d/m/Y H:i:s",$time). "</td>
                    <td>" .ftp_size($ftp, $sList). " kb </td>
                  </tr>";
          }
        }
        $third = "</tbody>
            </table>";
      	}
      	echo $first;
      	foreach ($seconde as $seconds) {
      		echo $seconds;
      	}
      	echo $third;
        return json_encode($list);
	} 
?>