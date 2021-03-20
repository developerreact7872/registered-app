<?php

class Incident_report{

  public function getIncident_reportById($id){
    $sql = "SELECT id,unitowner_id,subject,details,priority,creation_time FROM incident_report WHERE id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getIncident_report(){
    $sql = "SELECT incident_report.id,user_id,subject,details,priority,users.fname,users.lname,users.email FROM incident_report INNER JOIN users ON user_id=users.id";
    $result = getData($sql);
    return $result;
  }

  public function addIncident_report($user_id,$subject,$details,$priority){
    $sql = "INSERT INTO incident_report(user_id,subject,details,priority) VALUES('$user_id','$subject','$details','$priority')";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function editIncident_report($id,$user_id,$subject,$details,$priority){
    $sql = "UPDATE incident_report SET user_id='$user_id', subject='$subject', details='$details', priority='$priority' WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteIncident_report($id){
    $sql = "DELETE FROM incident_report WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
