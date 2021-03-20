<?php

class Document_receiver{

  public function getDocument_receiverById($id){
    $sql = "SELECT id,document_id,user_id,creation_time FROM document_receiver WHERE id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getDocument_receiver(){
    $sql = "SELECT id,document_id,user_id,creation_time FROM document_receiver";
    $result = getData($sql);
    return $result;
  }

  public function addDocument_receiver($id,$document_id,$user_id){
    $sql = "INSERT INTO document_receiver(document_id,user_id) VALUES('$document_id','$user_id')";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function editDocument_receiver($id,$document_id,$user_id){
    $sql = "UPDATE document_receiver SET document_id='$document_id',user_id='$user_id' WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteDocument_receiver($id){
    $sql = "DELETE FROM document_receiver WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
