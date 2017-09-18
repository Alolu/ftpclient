<?php
class Type{
private $selectAll;
private $insertAll;
private $selectOne;
private $deleteOne;
private $updateAll;
public function __construct($db){
  $this->selectAll = $db->prepare("select idtype, nomtype from type");
  $this->insertAll = $db->prepare("insert into type( nomtype) values (:nomType)");
  $this->selectOne = $db->prepare("select idtype, nomtype from type where idtype= :idtype");
  $this->deleteOne = $db->prepare("delete from type where idtype=:idtype");
  $this->updateAll = $db->prepare("update type set nomtype=:nomtype where idtype=:idtype");
}

public function selectAll(){
  $this->selectAll->execute();
  return $this->selectAll->fetchAll();
}
public function insertAll($nomtype){
  $this->insertAll->execute(array('
:nomtype'=>$nomtype));
  return $this->insertAll->rowCount();
}
public function selectOne($idtype){
  $this->selectOne->execute(array(':idtype'=>$idtype));
  return $this->selectOne->fetch();
}
         public function deleteOne($idtype){
  $this->deleteOne->execute(array(':idtype'=>$idtype));
  return $this->deleteOne->rowCount();
}
public function updateAll($idtype){
  $this->updateAll->execute(array(':idtype'=>$idtype));
  return $this->updateAll->rowCount();
}}

?>
