<?php

class Maintenance_fee{

  public function getMaintenance_feeById($id){
    $sql = "SELECT id,unitowner_id,payed_for,payed_amount,payed_to,creation_time FROM maintenance_fee WHERE id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getMaintenance_fee(){
    $sql = "SELECT id,unitowner_id,payed_for,payed_amount,payed_to,constyear,creation_time FROM maintenance_fee";
    $result = getData($sql);
    return $result;
  }

  public function addMaintenance_fee($id,$unitowner_id,$payed_for,$payed_to,$constyear){
    $sql = "INSERT INTO maintenance_fee(unitowner_id,payed_for,payed_to,constyear) VALUES('$unitowner_id','$payed_for','$payed_to','$constyear')";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function editMaintenance_fee($id,$unitowner_id,$payed_for,$payed_to,$constyear){
    $sql = "UPDATE maintenance_fee SET unitowner_id='$unitowner_id', payed_for='$payed_for', payed_to='$payed_to', constyear='$constyear' WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteMaintenance_fee($id){
    $sql = "DELETE FROM maintenance_fee WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
