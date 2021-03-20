<?php

class Bookings{

  public function getBookingsById($id){
    $sql = "SELECT id,facility_id,unitowner_id,bookdate,creation_time FROM bookings WHERE id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getBookings(){
    $sql = "SELECT id,facility_id,unitowner_id,bookdate,creation_time FROM bookings";
    $result = getData($sql);
    return $result;
  }

  public function addBookings($id,$facility_id,$unitowner_id,$bookdate){
    $sql = "INSERT INTO bookings(facility_id,unitowner_id,bookdate) VALUES('$facility_id','$unitowner_id','$bookdate')";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function editBookings($id,$facility_id,$unitowner_id,$bookdate){
    $sql = "UPDATE bookings SET facility_id='$facility_id',unitowner_id='$unitowner_id',bookdate='$bookdate' WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteBookings($id){
    $sql = "DELETE FROM bookings WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
