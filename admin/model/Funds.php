<?php

class Funds{

  public function getFundsById($id){
    $sql = "SELECT id,fund_type,fund_title,fund_details,creation_time FROM funds WHERE id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getFunds(){
    $sql = "SELECT funds.id,user_id,fund_type,fund_amount,fund_details,users.fname,users.lname,users.email FROM funds INNER JOIN users ON user_id=users.id";
    $result = getData($sql);
    return $result;
  }

  public function addFunds($user_id,$fund_type,$fund_amount,$fund_details){
    $sql = "INSERT INTO funds(user_id,fund_type,fund_amount,fund_details) VALUES('$user_id','$fund_type','$fund_amount','$fund_details')";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function editFunds($id,$user_id,$fund_type,$fund_amount,$fund_details){
    $sql = "UPDATE funds SET user_id='$user_id', fund_type='$fund_type',fund_amount='$fund_amount',fund_details='$fund_details' WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteFunds($id){
    $sql = "DELETE FROM funds WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
