<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$id = $_GET["id"];
$name=$_SESSION["nickName"];
if(!isset($_SESSION["logined"]) or $_SESSION["logined"]!=0 or$_SESSION["userId"]!=$id){
    header("location: index.php");
    exit(); 
}




?>


<?php include 'sqlConfig.php'; ?>

<?php
   
    $sql = "SELECT userId,userName,Email,phoneNum,userDate,userAddress,userPwd FROM user_Table WHERE userId='".$id."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        
        $acount = $row["userId"];
        $userName = $row["userName"];
        $userEmail = $row["Email"];
        $userPhone = $row["phoneNum"];
        $userDate = $row["userDate"];
        $userAddress = $row["userAddress"];
        $userPwd = $row["userPwd"];

    }
    }
?>

<?php   $conn->close(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
</head>

<body>

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

                            <a class="badge badge-light " href="result.php?case=-1&bit=0">Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <form id="modifyForm" action="handler.php" method="POST">
            <input type="hidden" name="case" value="3" />
            <input type="hidden" name="nickName" id="modify1" />
            <input type="hidden" name="Email" id="modify2" />
            <input type="hidden" name="Phone" id="modify3" />
            <input type="hidden" name="Date" id="modify4" />
            <input type="hidden" name="Addr" id="modify5" />
            <input type="hidden" name="Pwd" id="modify6" />
            <input type="hidden" name="userId" value="<?=$id?>" />
        </form>
        <div class="row theme2" style="padding: 0px !important; margin:0px !important;">
            <div class="col-12 ">
                <div class="d-flex justify-content-center align-items-center userCardArea">
                    <div class="userCard align-items-center">
                        <div class="scTitle" style="margin-bottom: 25px; text-align: center; font-size: 20px;">
                            Hi <?=$name?></div>
                        <div class="row">
                            <div class="col-3">
                                UserName:
                            </div>
                            <div class="col-8">
                                <div class="input-group input-group-sm">
                                    <?=$acount?>
                                </div>
                            </div>
                            <div class="col-1 ">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3">
                                Name:
                            </div>
                            <div class="col-8">
                                <div class="input-group input-group-sm ">
                                    <input id="editName" type="text" class="form-control " value="<?=$userName?>"
                                        onkeydown="clearAll()" readonly />
                                </div>
                                <div id="editName_error1" class="passwordWrongAlert  hiddenText">Enter with correct
                                    format</div>
                            </div>
                            <div class="col-1 ">
                                <button id="changeNamebtn" onclick="releaseInput('editName','changeNamebtn')"
                                    class="btn btn-outline-dark btn-sm"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Email:
                            </div>
                            <div class="col-8">
                                <div class="input-group input-group-sm">
                                    <input id="editEmail" type="email" class="form-control" onkeydown="clearAll()"
                                        value="<?=$userEmail?>" readonly />
                                </div>
                                <div id="editEmail_error1" class="passwordWrongAlert  hiddenText">Enter with correct
                                    format</div>
                            </div>
                            <div class="col-1 ">
                                <button id="changeEmailbtn" onclick="releaseInput('editEmail','changeEmailbtn')"
                                    class="btn btn-outline-dark btn-sm"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Phone:
                            </div>
                            <div class="col-8">
                                <div class="input-group input-group-sm">
                                    <input id="editPhone" type="text" class="form-control " placeholder="Please enter"
                                        value="<?=$userPhone?>" onkeydown="clearAll()" readonly />
                                </div>
                                <div id="editPhone_error1" class="passwordWrongAlert  hiddenText">Enter with correct
                                    format</div>
                            </div>
                            <div class="col-1 ">
                                <button id="changePhonebtn" onclick="releaseInput('editPhone','changePhonebtn')"
                                    class="btn btn-outline-dark btn-sm"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Date:
                            </div>
                            <div class="col-8">

                                <div class="input-group input-group-sm">
                                    <input id="editDate" type="date" class="form-control " value="<?=$userDate?>"
                                        onkeydown="clearAll()" readonly>
                                </div>
                                <div id="editDate_error1" class="passwordWrongAlert  hiddenText">Enter with correct
                                    format</div>

                            </div>
                            <div class="col-1 ">
                                <button id="changeDatebtn" onclick="releaseInput('editDate','changeDatebtn')"
                                    class="btn btn-outline-dark btn-sm"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Address:
                            </div>
                            <div class="col-8">
                                <textarea id="editAddress" class="form-control " rows="3" style="resize: none;"
                                    onkeydown="clearAll()" readonly><?=$userAddress?></textarea>
                                <div id="editAddress_error1" class="passwordWrongAlert  hiddenText">Enter with
                                    correct
                                    format</div>
                            </div>
                            <div class="col-1 ">
                                <button id="changeAddressbtn" onclick="releaseInput('editAddress','changeAddressbtn')"
                                    class="btn btn-outline-dark btn-sm"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                Password:
                            </div>
                            <div class="col-8">
                                <div class="input-group input-group-sm">
                                    <input id="editPwd" type="password" class="form-control" value="<?=$userPwd?>"
                                        onkeydown="clearAll()" readonly>
                                </div>

                            </div>
                            <div class="col-1 ">
                                <button id="changePwdbtn" onclick="releaseInput('editPwd','changePwdbtn')"
                                    class="btn btn-outline-dark btn-sm"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div id="RpPwdGroup" class="row hiddenText">
                            <div class="col-3">
                                Repeat:
                            </div>
                            <div class="col-8">
                                <div class="input-group input-group-valsm">
                                    <input id="editRpPwd" type="password" class="form-control" onkeydown="clearAll()"
                                        value="">
                                </div>
                                <div id="editPwd_error1" class="passwordWrongAlert  hiddenText">Enter with correct
                                    format</div>
                                <div id="editPwd_error2" class="passwordWrongAlert  hiddenText">Password Not Match
                                </div>
                            </div>
                            <div class="col-1 ">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                Order History:
                                <div class="scListContainer" style="margin-top: 1px; height: 300px;">
                                    <!--can be scoll-->

                                    <?php include 'sqlConfig.php'; ?>

                                    <?php
                                    
                                        $sql = "SELECT items.itemTitle,items.itemDescription,items.itemIcon,items.itemPrice,
                                                orderRecord.transitionId,orderRecord.selectModel,orderRecord.selectColor,orderRecord.quantity
                                                FROM orderRecord
                                                INNER JOIN items ON items.itemId=orderRecord.itemId 
                                                INNER JOIN transation ON transation.transitionId=orderRecord.transitionId
                                                WHERE transation.userName='".$id."'ORDER BY transation.orderTime;";
                                                
                                        $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        // output data of each row

                                        $temp = -1;
                                        $num = 1;
                                        while($row = $result->fetch_assoc()) {
                                            $title = $row['itemTitle'];
                                            $desc = $row["itemDescription"];
                                            $iconPath = $row["itemIcon"];
                                            $price = $row["itemPrice"];
                                            $selectmodel = $row["selectModel"];
                                            $color = $row["selectColor"];
                                            $quantity = $row["quantity"];
                                            $tranId = $row["transitionId"];
                                        


                                            $str ='<div class="scItemGroup d-flex ">';

                                                    if($tranId!=$temp){
                                                        $str.='<div>'.$num++.'</div>';
                                                        $temp = $tranId;
                                                    }else{
                                                        $str.='<div>&nbsp</div>';
                                                    }
                                                    $str.='<div class="userItemImg ">
                                                            <img src="'.$iconPath.'" alt="iphone" width="80px" height="80px">
                                                        </div>
                                                        <div class="userInfoGroup ">
                                                            <div class="scItem ">
                                                                '.$title.'
                                                            </div>
                                                            <div class="customCardDescript ">'.$desc.'
                                                            </div>
                                                            <div>
                                                                HK$<span>'.$price.'</span> &nbsp <span>'.$color.'</span> &nbsp<span>'.$selectmodel.'</span>
                                                            </div>
                                                        </div>
                                                        <div class="scSelect ">
                                                            '.$quantity.'/pcs
                                                        </div>
                
                
                                                    </div>';

                                                 echo $str;   
                                        }
                                     }
                                    ?>

                                    <?php   $conn->close(); ?>



                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <a id="cancelBtn" class="btn btn-block btn-danger hiddenText"
                                    href="userDetail.php?id=<?=$id?>">
                                    Cancel
                                </a>
                            </div>
                            <div class="col-6">
                                <button id="changedBtn" class="btn btn-block btn-success" onclick="validForm1()"
                                    disabled>
                                    Done
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>


</body>

<?php include 'config.php'; ?>

</html>