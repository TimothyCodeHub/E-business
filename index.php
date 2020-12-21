<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>pC store</title>
</head>

<?php include 'loginHeader.php'; ?>

<body>
    <div class="container-full">
        <!--NavigationBar-->
        <div class="row justify-content-between align-items-center navProp">
            <div class="col-2 ">
                <img src="static/logo.png" alt="logo" width="150px" />
            </div>

            <div class="col-6">
                <div class="row">
                    <div class="col-8 textMenu">
                        <div class="d-flex justify-content-around align-items-center buttonGroup">
                            <div class=""><a class="navgationItem" href="index.php">Home</a></div>
                            <div class=""><a class="navgationItem" href="#iphoneArea">Iphone</a></div>
                            <div class=""><a class="navgationItem" href="#ipadArea">Ipad</a></div>
                            <div class=""><a class="navgationItem" href="#macbookArea">Macbook</a></div>
                        </div>
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

        <!--crousell-->
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="static/banner1.jpg">
                </div>
                <div class="carousel-item">
                    <img src="static/banner2.png">
                </div>
                <div class="carousel-item">
                    <img src="static/banner.jpg">
                </div>
            </div>

            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>



        <div id="iphoneArea" class="row carousel area theme1">
            <div class="col-3 ">
                <div class="promoText">Iphone series</div>
                <div class="promoImg">
                    <img src="static/iphone.png" alt="IPHONE" width="100%">
                </div>
            </div>
            <div class="col-9  fix">
                <div class="CardContainer ">

                    <?php include 'sqlConfig.php'; ?>
                    <?php
                        $sql = "SELECT itemTitle,itemIcon,itemPrice, itemDescription,Remain,itemId FROM items WHERE classId=1 ORDER BY Remain DESC limit 10";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='customCard align-self-center'>
                                            <img class='customCardImg' src='".$row["itemIcon"]."' alt=''>
                                            <div class='customCardPriceGroup'>
                                                <div class='d-flex justify-content-between'>
                                                    <div class='customCardPrice'>HK$".$row["itemPrice"]."</div>
                                                    <div class='customCardTotal align-self-end'>Remain:".$row["Remain"]."</div>
                                                </div>
                                                <div class='customCardTitle'>".$row["itemTitle"]."</div>
                                                <div class='customCardDescript'>".$row["itemDescription"]."</div>
                    
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




                    <div class="customCard align-self-center " style="width: 100px; padding-right: 30px;">
                        <a href="items.php" class="moreDetail" style="direction:ltr; writing-mode:tb-rl;">More
                            items</a>
                    </div>
                </div>



            </div>
        </div>

        <div id="ipadArea" class="row carousel area theme2">
            <div class="col-3 ">
                <div class="promoText">Ipad series</div>
                <div class="promoImg">
                    <img src="static/ipad.png" alt="IPHONE" width="100%">
                </div>
            </div>
            <div class="col-9  fix">
                <div class="CardContainer ">
                    <?php include 'sqlConfig.php'; ?>
                    <?php
                        $sql = "SELECT itemTitle,itemIcon,itemPrice, itemDescription,Remain,itemId FROM items WHERE classId=2 ORDER BY Remain DESC limit 10";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='customCard align-self-center'>
                                            <img class='customCardImg' src='".$row["itemIcon"]."' alt=''>
                                            <div class='customCardPriceGroup'>
                                                <div class='d-flex justify-content-between'>
                                                    <div class='customCardPrice'>HK$".$row["itemPrice"]."</div>
                                                    <div class='customCardTotal align-self-end'>Remain:".$row["Remain"]."</div>
                                                </div>
                                                <div class='customCardTitle'>".$row["itemTitle"]."</div>
                                                <div class='customCardDescript'>".$row["itemDescription"]."</div>
                    
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



                    <div class="customCard align-self-center " style="width: 100px; padding-right: 30px;">
                        <a href="items.php" class="moreDetail" style="direction:ltr; writing-mode:tb-rl;">More
                            items</a>
                    </div>

                </div>



            </div>
        </div>

        <div id="macbookArea" class="row carousel area theme1">
            <div class="col-3 ">
                <div class="promoText">Macbook series</div>
                <div class="promoImg">
                    <img src="static/macbook.png" alt="IPHONE" width="100%">
                </div>
            </div>
            <div class="col-9  fix">
                <div class="CardContainer ">

                    <?php include 'sqlConfig.php'; ?>
                    <?php
                        $sql = "SELECT itemTitle,itemIcon,itemPrice, itemDescription,Remain,itemId FROM items WHERE classId=3 ORDER BY Remain DESC limit 10";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='customCard align-self-center'>
                                            <img class='customCardImg' src='".$row["itemIcon"]."' alt=''>
                                            <div class='customCardPriceGroup'>
                                                <div class='d-flex justify-content-between'>
                                                    <div class='customCardPrice'>HK$".$row["itemPrice"]."</div>
                                                    <div class='customCardTotal align-self-end'>Remain:".$row["Remain"]."</div>
                                                </div>
                                                <div class='customCardTitle'>".$row["itemTitle"]."</div>
                                                <div class='customCardDescript'>".$row["itemDescription"]."</div>
                    
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

                    <div class="customCard align-self-center " style="width: 100px; padding-right: 30px;">
                        <a href="items.php" class="moreDetail" style="direction:ltr; writing-mode:tb-rl;">More
                            items</a>
                    </div>
                </div>



            </div>
        </div>

        <div class="row fix" style="width: 100%; height: 50px; background-color: lightseagreen; ">

        </div>




    </div>
</body>


<script>

</script>

<?php include 'config.php'; ?>

</html>