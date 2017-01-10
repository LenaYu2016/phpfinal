<?php foreach($foods as $item){ ?>

    <div class="col-xs-10 col-sm-4 col-md-2">
        <div href="#" class="thumbnail">
            <img src="../../Assets/image/food/<?php echo $item->getImage();?>" alt="..." class="">
            <div class="caption">
                <h3 class="food_title"><?php echo $item->getName();?></h3>
                <a href="../Food%20Management/index.php?id=<?php echo $item->getId();?>" ><button type="button" class="btn btn-default btn-sm view">View Detail</button></a>
            </div>
        </div>

    </div>

<?php } ?>
