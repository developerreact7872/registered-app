<?php

class Announcements{

  public function getAnnouncementsById($id){
    $sql = "SELECT announcements.`id`, `user_id`, `subject`, `details`, `priority`, announcements.`creation_time`,users.fname,users.lname,users.email FROM `announcements` left join users on users.id=announcements.user_id WHERE announcements.id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getAnnouncements(){
    $sql = "SELECT announcements.`id`, `user_id`, `subject`, `details`, `priority`, announcements.`creation_time`,users.fname,users.lname,users.email FROM `announcements` left join users on users.id=announcements.user_id ORDER BY announcements.id DESC";
    $result = getData($sql);
    return $result;
  }

  public function addAnnouncements($title,$priority,$aby,$details){
    $sql = "INSERT INTO announcements(user_id,subject,details,priority) VALUES('$aby','$title','$details','$priority')";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function editAnnouncements($id,$user_id,$priority,$subject,$details){
    $sql = "UPDATE announcements SET user_id='$user_id', priority='$priority', subject='$subject', details='$details' WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteAnnouncements($id){
    $sql = "DELETE FROM announcements WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
