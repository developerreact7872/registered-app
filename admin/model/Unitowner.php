<?php

class Unitowner{

  public function getUnitOwnerById($id){
    $sql = "SELECT id,user_id,unit_id,date_purchase FROM unitowner WHERE id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getUnitOwner(){
    $sql = "SELECT id,user_id,unit_id,date_purchase FROM unitowner";
    $result = getData($sql);
    return $result;
  }

  public function addUnitOwner($user_id,$unit_id,$date_purchase){
    $sql = "INSERT INTO unitowner(user_id,unit_id,date_purchase) VALUES($user_id,$unit_id,'$date_purchase')";
    //echo $sql;
    $result = excuteQuerry($sql);
    return $result;
  }

  public function editUnitOwner($id,$user_id,$unit_id,$date_purchase){
    $sql = "UPDATE unitowner SET user_id=$user_id, unit_id=$unit_id,date_purchase ='$date_purchase'  WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteUnitOwner($id){
    $sql = "DELETE FROM unitowner WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
