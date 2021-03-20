<?php
session_start();
require '../../util/Util.php';
require 'model/User.php';

if(isset($_REQUEST['action'])){
  if($_REQUEST['action']=='login'){
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $user = new User();
    $res = $user->login($email,$password);
    $login = [];
    if(count($res)==0){
      $login['loggedin'] = false;
    }
    else{
        $login = $res[0];
        $login['loggedin'] = true;
        $_SESSION[$res[0]['type']] = $res[0];
    }
    pr($login);
    pr($_SESSION);
    //echo json_encode($login);
  }

  if($_REQUEST['action']=='logout'){
      session_destroy();
      header('Location: ../../');
  }
}
?>
