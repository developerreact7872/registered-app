<?php

class Roles{

  public function getRolesById($id){
    $sql = "SELECT id,role_type FROM roles WHERE id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getRoles(){
    $sql = "SELECT id,role_type FROM roles ORDER BY  `id` DESC";
    $result = getData($sql);
    return $result;
  }

  public function addRoles($role_type){
    $sql = "INSERT INTO roles(role_type) VALUES('$role_type')";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function editRoles($id,$role_type){
    $sql = "UPDATE roles SET role_type='$role_type' WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteRoles($id){
    $sql = "DELETE FROM roles WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
