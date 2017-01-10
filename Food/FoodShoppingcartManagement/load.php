<table class="table table-hover">
    <thead><td><input type="checkbox" class="check" id="checkall"></td><td>Select all</td><td colspan="4">Food information</td>
    <td>Price(CAD)</td><td>Quantity</td><td>Amount</td><td>Operation</td><td>Delivery Time</td></thead>
    <?php foreach($results as $item){?>
        <tr class="item">
            <td rowspan="4"><input type="checkbox" class="check" name="checkeditem[]" value="<?php echo $item->Id;?>"/> </td>
            <td rowspan="4" ><a href="../Food%20Management/index.php?id=<?php echo $item->Food_id;?>"><img src="../../Assets/image/food/<?php echo $item->Food_Image?>" width="130" height="95"/></a></td>
            <td rowspan="4"><a href="../Food%20Management/index.php?id=<?php echo $item->Food_id;?>"><?php echo $item->Food_Name;?></a></td>
            <td rowspan="4">Catatory: <?php echo $item->Food_Catagory;?></td>
            <td rowspan="4">Cinema:<select> <?php
                    foreach($cinemas as $c)
                    { if($item->Cinema_Name==$c["Cinema_Name"]){

                        ?>
                        <option value="<?php echo $item->Cinema_Name;?>" selected><?php echo $item->Cinema_Name;?></option>

                        <?php
                    }else{
                        ?>
                        <option value="<?php echo $c["Cinema_Name"];?>"><?php echo $c["Cinema_Name"];?></option>
                        <?php
                    }

                    }
                    ?></select></td>
            <td rowspan="4" width="150">Size:
                <select>
                    <option class="small" <?php if($item->Size==1){
                        echo "selected";
                    }?>>Small</option>
                    <option class="middle" <?php if($item->Size==2){
                        echo "selected";
                    }?>>Middle</option>
                    <option class="large" <?php if($item->Size==3){
                        echo "selected";
                    }?>>Large</option>
                </select>
            </td>
            <td rowspan="4" width="150">
                <input type="hidden" value="<?php echo $item->Food_Price; ?>"/>
                <input type="hidden" value="<?php echo $item->Discount_price;?>"/>
                Original: $<?php if($item->Food_Price!==$item->Discount_price){?><span style="text-decoration:line-through;">
                    <?php if($item->Size==1){ echo $item->Food_Price;}else if($item->Size==2){
                        echo $item->Food_Price*1.5;
                    }else if($item->Size==3){
                        echo $item->Food_Price*2;
                    }?></span>
                <?php }else
                {?><span><?php if($item->Size==1){ echo $item->Food_Price;}else if($item->Size==2){
                    echo $item->Food_Price*1.5;
                }else if($item->Size==3){
                    echo $item->Food_Price*2;
                }?></span><?php }?>
                <div class="current">Current: $<span><?php if($item->Size==1){ echo $item->Discount_price;}else if($item->Size==2){
                            echo $item->Discount_price*1.5;
                        }else if($item->Size==3){
                            echo $item->Discount_price*2;
                        }?></span></div>

            </td>

            <td rowspan="4" width="150">
                <div class="snip"><input type="button" value="-" class="m"/><input type="text" size="1" maxlength="3" class="enter" value="<?php echo $item->Quantity;?>"/><input type="button" value="+" class="p"/>
                    <input type="hidden" value="<?php echo $item->Food_Instock;?>"/></div>
            </td>
            <td rowspan="4" class="amount">$<span><?php if($item->Size==1){ echo $item->Discount_price*$item->Quantity;}
                    else if($item->Size==2){echo $item->Discount_price*$item->Quantity*1.5;}
                    else if($item->Size==3){echo $item->Discount_price*$item->Quantity*2;}?></span></td>
            <td rowspan="4">
                <input type="hidden" value="<?php echo $item->Id;?>" name="id"/>
                <a href="" name="delete">Delete</a>
            </td>
            <td rowspan="4" width="250" class="deliverytime">Date <input type="date"/> <div class="timeinput">Time <input type="time"/></div></td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
    <?php }?>
</table>
