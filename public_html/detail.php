<!DOCTYPE html>
<html lang="en">
<?php 
    $item_id = $_GET["item_id"];
    ?>
<?php include 'sqlConfig.php'; ?>

<?php
    $title = "";
    $icon = "";
    $price = "";
    $description = "";
    $remain = "";
    $itemModel = [];
    $itemColor = [];
?>

<?php
    $sql = "SELECT itemTitle,itemIcon,itemPrice, itemDescription,Remain,itemModel,itemColor FROM items WHERE itemId=".$item_id."";
    $result = $conn->query($sql);
    
    

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $title = $row["itemTitle"];
            $icon = $row["itemIcon"];
            $price = $row["itemPrice"];
            $description = $row["itemDescription"];
            $remain = $row["Remain"];
            $itemModel = explode(',',$row["itemModel"]);
            $itemColor = explode(',',$row["itemColor"]);
        }
    }
?>
<?php   $conn->close(); ?>
<?php include 'loginHeader.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>

<body>
    <div id="itemPath" style="display:none"><?=$icon?></div>
    <div class="container-full">
        <!--NavigationBar-->
        <div class="row justify-content-between align-items-center navProp">
            <div class="col-2 ">
                <a class="navgationItem" href="javascript:history.back()"><svg width="2em" height="2em"
                        viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                    </svg></a>
            </div>

            <div class="col-6">
                <div class="row">
                    <div class="col-8 textMenu">

                    </div>
                    <div class="col-1"></div>
                    <div class="col-3">
                        <div class="d-flex justify-content-around align-items-center buttonGroup">
                            <a id="CartNum" class="badge badge-light " href="shoppingCart.php"><i
                                    class="fa fa-shopping-cart" aria-hidden="true"></i>0</a>
                            <a class="badge badge-light " href="<?=$path?>"><?=$name?></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row theme2 detailArea" style="padding: 0px !important; margin:0px !important;">
            <div class="col-4">
                <div class="zoomBOut photoFrame">
                    <div id="mainIcon" class="zoomBIn" style="background-image: url(<?=$icon?>);"></div>
                </div>
                <div style="margin:0px 30px;" class="d-flex justify-content-around">
                    <button id="changeP1" onclick="changeDetailIcon(6)" class="subIcon">
                        <span><img src="static/iphone/6.png" width="100%"></span>
                    </button>
                    <button id="changeP2" onclick="changeDetailIcon(5)" class="subIcon">
                        <span><img src="static/iphone/5.png" width="100%"></span>
                    </button>
                    <button id="changeP3" onclick="changeDetailIcon(4)" class="subIcon">
                        <span><img src="static/iphone/4.png" width="100%"></span>
                    </button>
                    <button id="changeP4" onclick="changeDetailIcon(3)" class="subIcon">
                        <span><img src="static/iphone/3.png" width="100%"></span>
                    </button>
                </div>
            </div>
            <div class="col-8">


                <div class="detail">
                    <div id="itemId" class="hiddenText"><?=$item_id?></div>
                    <div class="detailTitle  row">
                        <div class="col-12">
                            <h5><b id="title"><?=$title?></b></h5>
                        </div>

                    </div>

                    <div class="orgrinalPrice row  ">
                        <div class="col-2">
                            <span style="font-size: 12px;">Orginal Price:</span>
                        </div>
                        <div class="col-10"><del>$HK<?=$price+29.6?></del></div>
                    </div>
                    <div class="detailPrice row  ">
                        <div class="col-2">
                            <span>Price:</span>
                        </div>
                        <div class="col-10 detailPriceColor">$HK<span id="price"><?=$price?></span></div>
                    </div>

                    <div class="ClassColor row ">
                        <div class="col-2 ">Color:</div>
                        <div class="col-10">
                            <select class="custom-select custom-select-sm" id="itemColor">
                                <?php
                                foreach ($itemColor as &$arr){
                                    echo "<option value='".$arr."'>".$arr."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="ClassModel row ">
                        <div class="col-2 ">Model:</div>
                        <div class="col-10">
                            <select class="custom-select custom-select-sm" id="itemModel">
                                <?php
                                foreach ($itemModel as &$arr){
                                    echo "<option value='".$arr."'>".$arr."</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="ClassNum row ">
                        <div class="col-2 ">Number:</div>
                        <div class="col-10">
                            <select class="custom-select custom-select-sm" id="itemNum">
                                <?php
                               for($x=1;$x<=99;$x++){
                                   echo "<option value='$x'>$x</option>";
                               }
                            ?>
                            </select>
                        </div>
                    </div>

                    <div class="AddToCart row">
                        <div class="col-12">
                            <button class="btn btn-sm btn-outline-primary" onclick="addCart()">
                                <b>Add to Cart</b>
                            </button>
                        </div>
                    </div>

                    <div class="detailDescrption row">
                        <div class="col-12">
                            <b>Description:</b>
                        </div>
                        <div class="col-12">
                            <p id="descrption"><?=$description?></p>
                        </div>

                    </div>

                    <div class="detailPhoto row">
                        <div class="col-12">
                            <img src="static/detail/1.jpg" alt="">
                            <img src="static/detail/2.jpg" alt="">
                            <img src="static/detail/3.jpg" alt="">
                            <img src="static/detail/4.jpg" alt="">
                            <img src="static/detail/5.jpg" alt="">
                            <img src="static/detail/6.jpg" alt="">
                            <img src="static/detail/7.jpg" alt="">
                            <img src="static/detail/8.jpg" alt="">
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>


</body>

<?php include 'config.php'; ?>

</html>