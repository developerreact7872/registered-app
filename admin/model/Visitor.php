<?php

class Visitor{

  public function getVisitorById($id){
    $sql = "SELECT `id`, `fname`, `lname`, `identification_num`, `contact_num`, `car_registration`,  `outtime`, `creation_time` FROM `visitors` WHERE id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getVistors(){
    $sql = "SELECT `id`, `fname`, `lname`, `identification_num`, `contact_num`, `car_registration`,  `outtime`, `creation_time` FROM `visitors`";
    $result = getData($sql);
    return $result;
  }

  public function addVisitor($fname,$lname,$identification_num,$contact_num,$car_registration){
    $sql = "INSERT INTO visitors(`fname`, `lname`, `identification_num`, `contact_num`, `car_registration`) VALUES('$fname','$lname','$identification_num','$contact_num','$car_registration')";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function exitVistor($id){
    $sql = "UPDATE `visitors` SET `outtime`= CURRENT_TIMESTAMP WHERE id = '$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
