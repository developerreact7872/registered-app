<?php

class Commettie{

  public function getCommettieById($id){
    $sql = "SELECT users.id, users_id,designation, phone, users.fname, users.lname, users.email FROM commettie INNER JOIN users ON commettie.users_id = users.id where commettie.id='$id' AS comId";
    $result = getData($sql);
    return $result;
  }

  public function getCommettie(){
    $sql = "SELECT  users_id, commettie.id,designation, phone, users.fname, users.lname, users.email FROM commettie INNER JOIN users ON commettie.users_id = users.id";
    $result = getData($sql);
    return $result;
  }

  public function addCommettie($users_id,$designation,$phone){
    $sql = "INSERT INTO commettie(users_id,designation,phone) VALUES('$users_id','$designation','$phone')";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function editCommettie($id,$users_id,$designation,$phone){
    $sql = "UPDATE commettie SET users_id='$users_id', designation='$designation',phone='$phone' WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteCommettie($id){
    $sql = "DELETE FROM commettie WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
