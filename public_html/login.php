<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

            </div>
        </div>

        <div class="row theme2" style="padding: 0px !important; margin:0px !important;">
            <div class="col-12 ">
                <div class="d-flex justify-content-center align-items-center shopingCartArea">
                    <div class="loginCard align-items-center">
                        <form id="loginForm" action="handler.php" method="POST">
                            <input name="case" type="hidden" value="2">
                            <div class="scTitle" style="margin-bottom: 25px; text-align: center; font-size: 20px;">
                                Login</div>
                            <div class=" input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"
                                            aria-hidden="true"></i></span>
                                </div>
                                <input name="userName" id="loginUser" type="text" class="form-control"
                                    placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"
                                    onkeydown="clearAll()">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock-alt"
                                            aria-hidden="true"></i></span>
                                </div>
                                <input name="userPwd" id="loginPwd" type="password" class="form-control"
                                    placeholder="Password" aria-label="Password" aria-describedby="basic-addon1"
                                    onkeydown="clearAll()">
                            </div>
                        </form>
                        <div class="btn-group btn-block" role="group" aria-label="login/Reg">
                            <button onclick="validForm3()" type="button" class="btn btn-dark">&nbsp&nbsp&nbsp&nbspLogin
                                Now&nbsp&nbsp&nbsp&nbsp</button>
                            <button onclick="validForm4()" type="button" class="btn btn-info">Forgot Passowrd</button>
                        </div>
                        <div class="btn-group btn-block" role="group" aria-label="login/Reg">
                            <button onclick="window.location.href='Register.php'" type="button"
                                class="btn btn-dark">Register</button>
                        </div>
                        <div class="LoginAlert">
                            <div id="loginUser_error1" class="passwordWrongAlert  hiddenText">*Empty input filed
                            </div>
                            <div id="loginUser_error2" class="passwordWrongAlert  hiddenText">*User/Password mistake
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