<!DOCTYPE html>
<html lang="en">
<?php include 'loginHeader.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items</title>
</head>

<body>

    <div class="container-full">
        <!--NavigationBar-->
        <div class="row justify-content-between align-items-center navProp">
            <div class="col-2 ">
                <a class="navgationItem" href="index.php"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16"
                        class="bi bi-house" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd"
                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
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
            <div class="col-3 dropdownGroup">
                <div class="list-group " id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-mac-list" data-toggle="list"
                        href="javascript:void(0)" onclick="filterItem(0);" role="tab" aria-controls="mac">All items</a>
                    <a class="list-group-item list-group-item-action " id="list-home-list" data-toggle="list"
                        href="javascript:void(0)" onclick="filterItem(1);" role="tab" aria-controls="home">Iphone</a>
                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                        href="javascript:void(0)" onclick="filterItem(2);" role="tab" aria-controls="profile">Ipad</a>
                    <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                        href="javascript:void(0)" onclick="filterItem(3);" role="tab"
                        aria-controls="messages">Macbook</a>

                </div>
            </div>
            <div class="col-9 ">
                <div class="itemsArea d-flex">

                    <!--
                    <div class="customCard align-self-center cardMargin">
                        <img class="customCardImg" src="static/iphone/6.png" alt="">
                        <div class="customCardPriceGroup">
                            <div class="d-flex justify-content-between">
                                <div class="customCardPrice">HK$105</div>
                                <div class="customCardTotal align-self-end">Total:438</div>
                            </div>
                            <div class="customCardTitle">Eason1WHITE</div>
                            <div class="customCardDescript">Iphone12 new Model 13" 7.7" test example with </div>

                            <div class="customCardCart">
                                <a href="detail.php">More Detail</a>
                            </div>
                        </div>
                    </div>
                -->

                    <?php include 'sqlConfig.php'; ?>

                    <?php
                        $sql = "SELECT itemId,itemTitle,itemIcon,itemPrice, itemDescription,classId,Remain FROM items";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            
                            $class = "class".$row["classId"];
                             echo "<div class='customCard align-self-center cardMargin ".$class."'>
                                    <img class='customCardImg' src='".$row["itemIcon"]."' alt=''>
                                    <div class='customCardPriceGroup'>
                                        <div class='d-flex justify-content-between'>
                                            <div class='customCardPrice'>HK$".$row["itemPrice"]."</div>
                                            <div class='customCardTotal align-self-end'>Remain:".$row["Remain"]."</div>
                                        </div>
                                        <div class='customCardTitle'>" .$row["itemTitle"]. "</div>
                                        <div class='customCardDescript'>" .$row["itemDescription"]. " </div>

                                        <div class='customCardCart'>
                                            <a href='detail.php?item_id=".$row["itemId"]."'>More Detail</a>
                                        </div>
                                    </div>
                                </div> 
                                "; 
                        }
                        }
                    ?>

                    <?php   $conn->close(); ?>


                </div>
            </div>
        </div>

    </div>


</body>

<?php include 'config.php'; ?>

</html>