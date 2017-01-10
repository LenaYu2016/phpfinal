<?php

/**
* 
*/
$a=0;
if($act=='add'&& $_POST['rand3'] == $_POST['username32']){

  foreach($_POST as $key => $value){

  	if(strpos($key,"answer")>0){
		$questionArr[$a]["id"] = substr($key,strpos($key,"answer")+6);
		$questionArr[$a]["answer"] = $value;
		$a++;
	}
  }
  require_once('../conn.php');
  $sql="select * from test";
  $resC= $db->query($sql);
  $fenshu = 0;
  while($rs = $resC->fetchObject()){

  	foreach($questionArr as $key => $value){

 	 	if($value["id"] == $rs->id){

			if($value["answer"] == $rs->rights){

				$fenshu += $rs->mark;
			}
		}
 	}

  }
  
  $sql="insert into information(name,sex,hunfou,birthday,education,graduation,biyeschool,tel,xiandxi,mark)values('".$_POST['name']."','".$_POST['sex']."','".$_POST['hunfou']."','".$_POST['birthday']."','".$_POST['education']."','".$_POST['graduation']."','".$_POST['biyeschool']."','".$_POST['tel']."','".$_POST['xiandxi']."',".$fenshu.")";

   $result=$db->exec($sql) or die();
   
  //  header('location:index1.php');

}

if(isset($_POST['Submit'])) {
    if ($_POST['rand3'] == $_POST['username32']) {
        header('location:index.php');
    } else {
      $error = (" <span style='color :red;'> Wrong code </span>");

    }
}





?>