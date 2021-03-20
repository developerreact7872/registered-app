<?php

class User{

  public function getUsersById($id){
    $sql = "SELECT * FROM users WHERE id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getUsers(){
    $sql = "SELECT users.id,email,role_type as type,fname,lname FROM users left join roles on users.type=roles.id";
    $result = getData($sql);
    return $result;
  }

  public function addUsers($email,$password,$type,$fname,$lname){
    $sql = "INSERT INTO users(email,password,type,fname,lname) VALUES('$email','$password',$type,'$fname','$lname')";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function editUsers($id,$email,$password,$type,$fname,$lname){
    $sql = "UPDATE users SET email='$email',password='$password',type='$type',fname='$fname',lname='$lname' WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteUsers($id){
    $sql = "DELETE FROM users WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
