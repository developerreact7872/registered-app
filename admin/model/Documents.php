<?php

class Documents{

  public function getDocumentsById($id){
    $sql = "SELECT id,admin_id,subject,details,creation_time FROM documents WHERE id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getDocuments(){
    $sql = "SELECT id,admin_id,subject,details,creation_time FROM documents";
    $result = getData($sql);
    return $result;
  }

  public function addDocuments($id,$admin_id,$subject,$details){
    $sql = "INSERT INTO documents(admin_id,subject,details) VALUES('$admin_id','$subject','$details')";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function editDocuments($id,$admin_id,$subject,$details){
    $sql = "UPDATE documents SET admin_id='$admin_id', subject='$subject', details='$details' WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteDocuments($id){
    $sql = "DELETE FROM documents WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
