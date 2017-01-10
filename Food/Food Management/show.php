<?php
foreach($foods as $key=>$food){
if($key<12){
?>
<div class="col-xs-12 col-sm-6 col-md-3">
    <form action="Food Management/index.php" method="get">
                    <div href="#" class="thumbnail">

                        <img src="../Assets/image/food/<?php echo $food->Food_Image;?>" alt="..." class="">
                        <button type="button" class="btn btn-default plus btn-sm">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        </button>
                        <p class="food_title"><?php echo $food->Food_Name;?></p>

                        <button type="submit" class="btn btn-default btn-sm view">View Detail</button>

                      </div>
    <input type="hidden" name="id" value="<?php echo $food->Food_id;?>"/>
        </form>
                </div>
<?php }}?>





