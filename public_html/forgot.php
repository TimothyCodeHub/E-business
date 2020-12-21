<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<?php
$user_id = $_GET["userId"];
?>
<?php include 'sqlConfig.php'; ?>
<?php
// get question
$sql = "SELECT question FROM user_Table INNER JOIN question ON user_Table.questionID=question.questionID WHERE user_Table.userId ='".$user_id."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $question = $row["question"];
    }
}else{
    header("location: result.php?case=0&bit=1");
    exit();
}

?>
<?php   $conn->close(); ?>

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

            </div>
        </div>

        <div class="row theme2" style="padding: 0px !important; margin:0px !important;">
            <div class="col-12 ">
                <div class="d-flex justify-content-center align-items-center shopingCartArea">
                    <div class="loginCard align-items-center" style="height:380px">
                        <div class="scTitle" style="margin-bottom: 25px; text-align: center; font-size: 20px;">
                            Forgot Password</div>

                        <form id="forgotForm" action="handler.php" method="POST">
                            <input type="hidden" name="case" value="0">
                            <div class=" input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"
                                            aria-hidden="true"></i></span>
                                </div>
                                <input id="userId" type="text" name="userName" class="form-control"
                                    value="<?=$user_id?>" aria-label="Username" aria-describedby="basic-addon1"
                                    readonly>
                            </div>
                            <div class="question"><?=$question?></div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock-alt"
                                            aria-hidden="true"></i></span>
                                </div>
                                <input id="answerId" name="answer" type="text" class="form-control"
                                    aria-label="Password" aria-describedby="basic-addon1" onkeydown="clearAll()">
                            </div>
                            <div id="answerId_error1" class="passwordWrongAlert  hiddenText">*Empty input filed
                            </div>
                            <div class="question">New Password</div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock-alt"
                                            aria-hidden="true"></i></span>
                                </div>
                                <input id="newpwdId" name="newpwd" type="password" class="form-control"
                                    aria-label="Password" aria-describedby="basic-addon1" onkeydown="clearAll()">
                            </div>
                            <div id="newpwdId_error1" class="passwordWrongAlert  hiddenText">*Empty input filed
                            </div>

                            <div class="btn-group btn-block" role="group" aria-label="login/Reg">
                                <button onclick="validForm5()" type="button" class="btn btn-dark">Submit</button>
                            </div>
                    </div>
                </div>
                </form>

            </div>
        </div>

    </div>


</body>

<?php include 'config.php'; ?>

</html>