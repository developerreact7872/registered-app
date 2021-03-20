<?php

class Session{

    public function login($email,$password){
      $sql = "SELECT users.`id`, `email`, roles.role_type as 'type', `fname`, `lname`, `creation_time` FROM `users` left join roles on roles.id = users.type WHERE `email`='".$email."' and `password`='".$password."'";
      $result = getData($sql);
      return $result;
    }
}

?>
