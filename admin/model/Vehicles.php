<?php

class Vehicles{

  public function getVehiclesById($id){
    $sql = "SELECT vehicles.id,vehicle_num,make,model,year,users_id,users.fname, users.lname FROM vehicles left join users on vehicles.users_id = users.id WHERE id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getVehicles(){
    $sql = "SELECT vehicles.id,vehicle_num,make,model,year,users_id,users.fname, users.lname FROM vehicles left join users on vehicles.users_id = users.id";
    $result = getData($sql);
    return $result;
  }

  public function addVehicles($vehicle_num,$make,$model,$year,$unitowner_id){
    $sql = "INSERT INTO vehicles(vehicle_num,make,model,year,users_id) VALUES('$vehicle_num','$make','$model','$year',$unitowner_id)";
    $result = excuteQuerry($sql);
    return $result;

  }

  public function editVehicles($id,$vehicle_num,$make,$model,$year,$unitowner_id){
    $sql = "UPDATE vehicles SET vehicle_num='$vehicle_num',make='$make',model='$model',year='$year',users_id=$unitowner_id WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteVehicles($id){
    $sql = "DELETE FROM vehicles WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
