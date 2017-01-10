<table class="table table-hover">
                     <thead><td colspan="2">Food</td><td>Price(CAD)</td><td>Quantity</td><td>Size</td><td>Amount(CAD)</td><td>Cinema</td><td>Delivery time</td><td>Operation</td></thead>
<?php foreach($orders as $order){
    if($order->State==1){

    ?>
    <tr style="background-color:salmon;"><td><?php echo $order->Order_time;?></td><td class="order">Order ID:<span><?php echo $order->Order_id;?></span></td>
        <td colspan="2">Contact number: <?php echo $order->Phone_number;?></td><td colspan="2"></td><td>State: Successful deal</td>
        <td>Total Amount:$<span name="pricetotal"><?php echo $order->Total_price;?></span></td><td><a href="" class="deleteitem">Delete</a>
        </td></tr>
   <?php foreach($items as $i){
            foreach($i as $item){

            if($item->Order_id==$order->Order_id){

                ?>
     <tr>                <td rowspan="4"><input class="idhide" type="hidden" value="<?php echo $item->Order_id;?>" /><a href="../Food%20Management/index.php?id=<?php echo $item->Food_id;?>"><img src="../../Assets/image/food/<?php echo $item->Food_Image;?>" width="130" height="95"/></a></td>
         <td rowspan="4"><a href="../Food%20Management/index.php?id=<?php echo $item->Food_id;?>"><?php echo $item->Food_Name;?></a></td>
         <td rowspan="4"><?php echo $item->Price;?></td>
         <td rowspan="4"><?php echo $item->Quantity;?></td>
         <td rowspan="4"><?php if($item->Size==1){echo "Small";}else if($item->Size==2){echo "Middle";}
             else if($item->Size==3){
                 echo "Large";
             }
             ?></td>
         <td rowspan="4"><?php echo $item->Amount;?></td>
         <td rowspan="4"><?php echo $item->Cinema;?></td>
         <td rowspan="4"><?php echo $item->Date;?> <?php echo $item->Time;?></td>
         <td rowspan="2">

            <p> <a href="../Food%20Management/index.php?foodid=<?php echo $item->Food_id;?>&orderitemid=<?php echo $item->Order_item_id;?>"
                   style="cursor: pointer;text-decoration: none;">Make a comment</a></p>
         </td>

     </tr>


                     <tr></tr>
                     <tr>

                     </tr>
                     <tr></tr>


    <?php } }}}else if($order->State==0){?>
        <form action="index.php" method="post"> <tr style="background-color:salmon;"><td><?php echo $order->Order_time;?></td>
            <td class="order">Order ID:<span><?php echo $order->Order_id;?></span>
                <input type="hidden" name="id" value="<?php echo $order->Order_id;?>"/></td>
        <td colspan="2">Contact number: <input type="text" name="phone"/></td><td colspan="2"></td><td>State: Unpaid</td>
        <td>Total Amount:$<?php echo $order->Total_price;?>
            <input type="hidden" name="total" value="<?php echo $order->Total_price;?>"/></td><td>
                <input type="hidden" name="action" value="pay"/>
                <button class="btn" type="submit" name="payment">Pay now</button>
            </td></tr>
    <?php foreach($items as $i){

            foreach($i as $item){

        if($item->Order_id==$order->Order_id){?>
        <tr>                <td rowspan="4"><a href="../Food%20Management/index.php?id=<?php echo $item->Food_id;?>"><img src="../../Assets/image/food/<?php echo $item->Food_Image;?>" width="130" height="95"/></a></td>
            <td rowspan="4"><input type="hidden" value="<?php echo $item->Food_id;?>" name="itemid[]"/>
                <a href="../Food%20Management/index.php?id=<?php echo $item->Food_id;?>"><?php echo $item->Food_Name;?></a></td>
            <td rowspan="4"><?php echo $item->Price;?></td>
        <td rowspan="4"><input type="hidden" value="<?php echo $item->Quantity;?>" name="itemquantity[]"/><?php echo $item->Quantity;?></td>
        <td rowspan="4"><?php if($item->Size==1){echo "Small";}else if($item->Size==2){echo "Middle";}
            else if($item->Size==3){
            echo "Large";
            }
            ?></td>
        <td rowspan="4"><?php echo $item->Amount;?></td>
        <td rowspan="4"><?php echo $item->Cinema;?></td>
        <td><?php echo $item->Date;?> <?php echo $item->Time;?></td>
        <td rowspan="2">


        </td>

    </tr>


    <tr></tr>
    <tr>

    </tr>
    <tr></tr>

    <tr></tr><?php }}} }}?></form>
                 </table>
