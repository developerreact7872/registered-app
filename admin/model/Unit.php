<?php

class Unit{

  public function getUnitById($id){
    $sql = "SELECT unit.id,Hnum,Stnum,Block,Staddress,constyear,users.fname,users.lname,users.email FROM unit left join (SELECT unitowner.* FROM unitowner inner JOIN (SELECT MAX(unitowner . `id` ) as id , unit_id  FROM unitowner  GROUP BY `unit_id`)x ON x.`id` = unitowner .`id`)unitowner on unit.id = unitowner.unit_id left join users on users.id = unitowner.user_id WHERE unit.id='$id' ";
    $result = getData($sql);
    return $result;
  }

  public function getUnit(){
    $sql = "SELECT unit.id,Hnum,Stnum,Block,Staddress,constyear,users.fname,users.lname,users.email FROM unit left join (SELECT unitowner.* FROM unitowner inner JOIN (SELECT MAX(unitowner . `id` ) as id , unit_id  FROM unitowner  GROUP BY `unit_id`)x ON x.`id` = unitowner .`id`)unitowner on unit.id = unitowner.unit_id left join users on users.id = unitowner.user_id";
    $result = getData($sql);
    return $result;
  }

  public function addUnit($Hnum,$Stnum,$Block,$Staddress,$constyear){
    $sql = "INSERT INTO unit(Hnum,Stnum,Block,Staddress,constyear) VALUES('$Hnum','$Stnum','$Block','$Staddress','$constyear')";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function editUnit($id,$Hnum,$Stnum,$Block,$Staddress,$constyear){
    $sql = "UPDATE unit SET Hnum='$Hnum', Stnum='$Stnum',Block='$Block',Staddress='$Staddress', constyear='$constyear' WHERE id='$id'";
    $result = excuteQuerry($sql);
    return $result;
  }

  public function deleteUnit($id){
    $sql = "DELETE FROM unit WHERE id='$id' ";
    $result = excuteQuerry($sql);
    return $result;
  }

}

?>
