<?php
$case = $_POST["case"];

if($case==0){  //handle forgot passowrd case
   
    $ans = $_POST["answer"];
    $newpwd = $_POST["newpwd"];
    $userName = $_POST["userName"];
    $resultBit = 0;

    
    include 'sqlConfig.php';
    
    // get question
    $sql = "SELECT quesitonAns FROM user_Table WHERE userId ='".$userName."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $realAns = $row["quesitonAns"];
        }
    };
    if(strcmp($realAns,$ans)==0){
        //correct answer
        $sql = "UPDATE user_Table SET userPwd = '".$newpwd."' WHERE userId ='".$userName."'";
       
        if($conn ->query($sql) ===TRUE){
            $resultBit = 0;
            header("location: result.php?case=0&bit=0");
            exit();
        }
    }else{
        header("location: result.php?case=0&bit=2");
        exit();    
    }


    $conn->close();

}else if($case==1){ //register

    $acount = $_POST["userAcount"];
    $questionId = $_POST["questionId"];
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userPhone = $_POST["userPhone"];
    $userDate = $_POST["userDate"];
    $userAddress = $_POST["userAddress"];
    $userPwd = $_POST["userPwd"];
    $userAns = $_POST["userAns"];

    //check userAcount
    include 'sqlConfig.php';
    
    $sql = "SELECT 1 FROM user_Table WHERE userId ='".$acount."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // account exist
        header("location: result.php?case=1&bit=1");
        exit();   
    }else{
        // account no exist
    }

    $sql = "INSERT INTO user_Table (userId, userPwd, userName, userDate, phoneNum, userAddress, Email, questionID, quesitonAns) 
                VALUES ('".$acount."', '".$userPwd."', '".$userName."', '".$userDate."', '".$userPhone."', '".$userAddress."', '".$userEmail."', '".$questionId."', '".$userAns."')";
    
    if($conn ->query($sql) ===TRUE){
        $resultBit = 0;
        header("location: result.php?case=1&bit=0");
        exit();
    }



    $conn->close();


}else if($case==2){ //loginForm
    session_start();
    
    $userName = $_POST["userName"];
    $userPwd = $_POST["userPwd"];

    include 'sqlConfig.php';

    $sql = "SELECT 1 FROM user_Table WHERE userId ='".$userName."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // account exist  
    }else{
        // account no exist
        header("location: result.php?case=2&bit=1");
        exit(); 
    }


    // get pwd with ID
    $sql = "SELECT userPwd,userName FROM user_Table WHERE userId ='".$userName."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $realuserPwd = $row["userPwd"];
            $nickName = $row["userName"];
        }
    };

    if(strcmp($realuserPwd,$userPwd)==0){
        $_SESSION["logined"] = 0;
        $_SESSION["nickName"] = $nickName;
        $_SESSION["userId"] = $userName;
        header("location: index.php");
        exit(); 
    }else{
        header("location: result.php?case=2&bit=2");
        exit(); 
    }

    $conn->close();
}else if($case==3){ //modifyForm

    session_start();

    if($_SESSION["userId"]!=$_POST["userId"]){
        header("location: index.php");
        exit(); 
    }
    
    include 'sqlConfig.php';
    
    $id = $_POST["userId"];
    $nickName = $_POST["nickName"];
    $userEmail = $_POST["Email"];
    $userPhone = $_POST["Phone"];
    $userDate = $_POST["Date"];
    $userAddress = $_POST["Addr"];
    $userPwd = $_POST["Pwd"];

    $sql = "UPDATE user_Table SET userName = '".$nickName."', Email = '".$userEmail."',phoneNum='".$userPhone."',userDate='".$userDate."',userAddress='".$userAddress."',userPwd='".$userPwd."' WHERE userId = '".$id."'";

    if($conn ->query($sql) ===TRUE){
        $_SESSION["nickName"]=$nickName;
        header("location: result.php?case=3&bit=0");
        exit();
    }else{
        header("location: result.php?case=3&bit=1");
        exit();
    }

    $conn->close();

}else if($case==4){
    
    session_start();
    
    if(!isset($_SESSION["logined"]) or $_SESSION["logined"]!=0){
        header("location: login.php");
        exit(); 
    }
    

    $id = $_SESSION["userId"];
    $itemId = $_POST["itemId"];
    $model = $_POST["model"];
    $color = $_POST["color"];
    $number = $_POST["number"];
    
    $remainAfter = [];
    include 'sqlConfig.php';


    //check Remain
    for($y=0; $y<sizeof($itemId);$y++){
        
        $sql = "SELECT Remain FROM items WHERE itemId ='".$itemId[$y]."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $remain = $row["Remain"];
                if($remain < $number[$y]){
                    header("location: result.php?case=4&bit=3");
                    exit();
                }else{
                    $tempNum = $remain-$number[$y];
                    array_push($remainAfter, $tempNum);
                }
            }
        };
    }




    //inser tran
    $sql = "INSERT INTO transation (userName) VALUES ('".$id."')";

    if($conn ->query($sql) ===TRUE){
        
    }else{
        header("location: result.php?case=4&bit=1");
        exit();
    }

    //select max tran
    $sql = "SELECT MAX(transitionId) AS updateId FROM transation WHERE userName ='".$id."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $transationId = $row["updateId"];
           
        }
    };
    
    
    //insert order Record
    $sql = "INSERT INTO orderRecord (transitionId,itemId,selectModel,selectColor,quantity) VALUES ";
    for($x=0; $x<sizeof($itemId); $x++){
        $sql.="('".$transationId."','".$itemId[$x]."','".$model[$x]."','".$color[$x]."','".$number[$x]."')";
        if($x!=sizeof($itemId)-1){
            $sql.=",";
        }
    }
    $sql.=";";

    if($conn ->query($sql) ===TRUE){

    }else{
        header("location: result.php?case=4&bit=2");
        exit();
    }


    //update Remain
    
    for($z=0;$z<sizeof($itemId);$z++){
        
        $sql = "UPDATE items SET Remain =".strval($remainAfter[$z])." WHERE itemId =".strval($itemId[$z]);

        if($conn ->query($sql) ===TRUE){
           if($z==sizeof($itemId)-1){
            header("location: result.php?case=4&bit=0");
            exit();
           }
        }else{
            header("location: result.php?case=4&bit=2");
            exit();
        }
    }

    $conn->close();
}



?>