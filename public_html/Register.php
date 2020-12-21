<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<?php

$randNum = rand(1,3);

include 'sqlConfig.php';
    
// get question
$sql = "SELECT question FROM question WHERE questionID ='".$randNum."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $question = $row["question"];
    }
};

$conn->close();

?>

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
                <div class="d-flex justify-content-center align-items-center userCardArea" style="height:100vh">
                    <div class="userCard align-items-center">
                        <div class="scTitle" style="margin-bottom: 25px; text-align: center; font-size: 20px;">
                            Hi Welcome!</div>
                        <form id="registerForm" action="handler.php" method="POST">
                            <input name="questionId" type="hidden" value="<?=$randNum?>">
                            <input name="case" type="hidden" value="1">
                            <div class="row">
                                <div class="col-3">
                                    UserID:
                                </div>
                                <div class="col-8">
                                    <div class="input-group input-group-sm">
                                        <input name="userAcount" id="editID" type="text" class="form-control " value=""
                                            onkeydown="clearAll()" />
                                    </div>
                                    <div id="editID_error1" class="passwordWrongAlert  hiddenText">Enter with correct
                                        format</div>
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
                                        <input name="userName" id="editName" type="text" class="form-control " value=""
                                            onkeydown="clearAll()" />
                                    </div>
                                    <div id="editName_error1" class="passwordWrongAlert  hiddenText">Enter with correct
                                        format</div>
                                </div>
                                <div class="col-1 ">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    Email:
                                </div>
                                <div class="col-8">
                                    <div class="input-group input-group-sm">
                                        <input name="userEmail" id="editEmail" type="email" class="form-control"
                                            onkeydown="clearAll()" value="" />
                                    </div>
                                    <div id="editEmail_error1" class="passwordWrongAlert  hiddenText">Enter with correct
                                        format</div>
                                </div>
                                <div class="col-1 ">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    Phone:
                                </div>
                                <div class="col-8">
                                    <div class="input-group input-group-sm">
                                        <input name="userPhone" id="editPhone" type="text" class="form-control "
                                            value="" onkeydown="clearAll()" />
                                    </div>
                                    <div id="editPhone_error1" class="passwordWrongAlert  hiddenText">Enter with correct
                                        format</div>
                                </div>
                                <div class="col-1 ">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    Date:
                                </div>
                                <div class="col-8">

                                    <div class="input-group input-group-sm">
                                        <input name="userDate" id="editDate" type="date" class="form-control "
                                            onkeydown="clearAll()">
                                    </div>
                                    <div id="editDate_error1" class="passwordWrongAlert  hiddenText">Enter with correct
                                        format</div>

                                </div>
                                <div class="col-1 ">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    Address:
                                </div>
                                <div class="col-8">
                                    <textarea name="userAddress" id="editAddress" class="form-control " rows="3"
                                        style="resize: none;" onkeydown="clearAll()"></textarea>
                                    <div id="editAddress_error1" class="passwordWrongAlert  hiddenText">Enter with
                                        correct
                                        format</div>
                                </div>
                                <div class="col-1 ">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    Password:
                                </div>
                                <div class="col-8">
                                    <div class="input-group input-group-sm">
                                        <input name="userPwd" id="editPwd" type="password" class="form-control" value=""
                                            onkeydown="clearAll()">
                                    </div>

                                </div>
                                <div class="col-1 ">

                                </div>
                            </div>
                            <div id="RpPwdGroup" class="row ">
                                <div class="col-3">
                                    Repeat:
                                </div>
                                <div class="col-8">
                                    <div class="input-group input-group-valsm">
                                        <input id="editRpPwd" type="password" class="form-control"
                                            onkeydown="clearAll()" value="">
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
                                <div class="col-3">
                                    Question:
                                </div>
                                <div class="col-8">
                                    <div class="input-group input-group-sm">
                                        <input name="userAns" id="editQuestion" type="text" class="form-control "
                                            placeholder="<?=$question?>" onkeydown="clearAll()" />
                                    </div>
                                    <div id="editQuestion_error1" class="passwordWrongAlert  hiddenText">Enter with
                                        correct format</div>
                                </div>
                                <div class="col-1 ">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-block btn-success" type="button" onclick="validForm2()">
                                        Done
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>


</body>

<?php include 'config.php'; ?>

</html>