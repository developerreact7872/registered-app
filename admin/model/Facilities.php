<?php

class Facilities{

  public function getFacById($id){
    $sql = "SELECT fac_charges,fac_type,details FROM facilities WHERE id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getFacilities(){
    $sql = "SELECT id,fac_name,fac_charges,fac_type,details FROM facilities";
    $result = getData($sql);
    return $result;
  }

  public function addFacilities($Fname,$Ftype,$Details,$Charges){
    $sql = "INSERT INTO facilities(fac_name,fac_charges,fac_type,details) VALUES('$Fname','$Charges','$Ftype','$Details')";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function editFacilities($id,$Fname,$Ftype,$Details,$Charges){
    $sql = "UPDATE facilities SET fac_name='$Fname',fac_charges='$Charges',fac_type='$Ftype',details='$Details' WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteFacilities($id){
    $sql = "DELETE FROM facilities WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
