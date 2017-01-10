 <?php


        $sqlMax = "select * from test order by id desc";
        $resMax = $db->query($sqlMax) or die($sqlMax);
        $rsMax = $resMax->fetchObject();
        $max = $rsMax->id;

        $sqlMin = "select * from test order by id";
        $resMin = $db->query($sqlMin) or die($sqlMin);
        $rsMin = $resMin->fetchObject();
        $min = $rsMin->id;

     


?>