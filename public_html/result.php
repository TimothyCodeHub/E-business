<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<?php
//case 0, forgot password. bit=1: no such userName.
//case 1:register. bit1: exist.
//case 2:login.   bit1: no exit
$case = $_GET["case"];
$bit = $_GET["bit"];


?>

<script>
window.onload = function() {
    <?php
    if($case==4 and $bit==0){
        echo "removeAllCart();";
    }
    ?>
}
</script>

<body>

    <div class="container-full">
        <!--NavigationBar-->
        <div class="row justify-content-between align-items-center navProp">
            <div class="col-2 ">

            </div>

            <div class="col-6">

            </div>
        </div>

        <div class="row theme2" style="padding: 0px !important; margin:0px !important;">
            <div class="col-12 ">
                <div class="d-flex justify-content-center align-items-center shopingCartArea">
                    <div class="loginCard align-items-center" style="height:330px">
                        <div class="scTitle" style="margin-bottom: 45px; text-align: center; font-size: 20px;">
                        </div>

                        <div>
                            <?php
                                    if($case==-1){
                                        
                                        session_start();
                                        session_destroy();

                                        echo '  <div class="resultIcon resultSucess"><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div class="resultText resultSucess">Logout now!</div>
                                        <div class="resultText"><a href="index.php" class="btn btn-primary">OK</a></div>
                                          ';

                                    }else  if($case==0){
                                    if($bit==1){
                                        echo '  <div class="resultIcon hiddenText "><i class="fa fa-check" aria-hidden="true"></i></div>
                                                <div class="resultIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                                                <div class="resultText">Do not have such ID, please retry again</div>
                                                <div class="resultText"><a href="login.php" class="btn btn-primary">OK</a></div>
                                        ';
                                    }else if($bit==2){
                                        echo '  <div class="resultIcon hiddenText "><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div class="resultIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                                        <div class="resultText">Answer not match!</div>
                                        <div class="resultText"><a href="login.php" class="btn btn-primary">OK</a></div>
                                        ';
                                    }else if($bit==0){
                                        echo '  <div class="resultIcon resultSucess"><i class="fa fa-check" aria-hidden="true"></i></div>
                                        <div class="resultText resultSucess">Password changed,please login</div>
                                        <div class="resultText"><a href="login.php" class="btn btn-primary">OK</a></div>
                                          ';
                                    }
                                }else if($case==1){
                                    if($bit==1){
                                        echo '  <div class="resultIcon hiddenText "><i class="fa fa-check" aria-hidden="true"></i></div>
                                                <div class="resultIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                                                <div class="resultText">ID duplicate, please retry again</div>
                                                <div class="resultText"><a href="Register.php" class="btn btn-primary">OK</a></div>
                                             ';  
                                    }else if($bit==0){
                                        echo '  <div class="resultIcon resultSucess"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                <div class="resultText resultSucess">Register Sucess! please login Now!</div>
                                                <div class="resultText"><a href="login.php" class="btn btn-primary">OK</a></div>
                                          ';
                                    }
                                }else if($case==2){
                                    if($bit==1){
                                        echo '  <div class="resultIcon hiddenText "><i class="fa fa-check" aria-hidden="true"></i></div>
                                                <div class="resultIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                                                <div class="resultText">ID No exist, please retry again</div>
                                                <div class="resultText"><a href="login.php" class="btn btn-primary">OK</a></div>
                                             ';  
                                    }
                                    if($bit==2){
                                        echo '  <div class="resultIcon hiddenText "><i class="fa fa-check" aria-hidden="true"></i></div>
                                                <div class="resultIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                                                <div class="resultText">Password Wrong, please retry again</div>
                                                <div class="resultText"><a href="login.php" class="btn btn-primary">OK</a></div>
                                             ';  
                                    }
                                }else if($case==3){
                                    if($bit==1){
                                        echo '  <div class="resultIcon hiddenText "><i class="fa fa-check" aria-hidden="true"></i></div>
                                                <div class="resultIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                                                <div class="resultText">SomethingWrong</div>
                                                <div class="resultText"><a href="index.php" class="btn btn-primary">OK</a></div>
                                             ';  
                                    }else if($bit==0){
                                        echo '  <div class="resultIcon resultSucess"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                <div class="resultText resultSucess">Changed!</div>
                                                <div class="resultText"><a href="index.php" class="btn btn-primary">OK</a></div>
                                          ';
                                    }
                                }else if($case==4){
                                    if($bit==0){
                                        echo '  <div class="resultIcon resultSucess"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                <div class="resultText resultSucess">Suscess!Thank you!</div>
                                                <div class="resultText"><a href="index.php" class="btn btn-primary">OK</a></div>
                                          ';
                                    }else if($bit==1){
                                        echo '  <div class="resultIcon hiddenText "><i class="fa fa-check" aria-hidden="true"></i></div>
                                                <div class="resultIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                                                <div class="resultText">SomethingWrongWithTrans</div>
                                                <div class="resultText"><a href="index.php" class="btn btn-primary">OK</a></div>
                                             ';  
                                    }else if($bit==2){
                                        echo '  <div class="resultIcon hiddenText "><i class="fa fa-check" aria-hidden="true"></i></div>
                                                <div class="resultIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                                                <div class="resultText">SomethingWrongWithRecord</div>
                                                <div class="resultText"><a href="index.php" class="btn btn-primary">OK</a></div>
                                             ';  
                                    }else if($bit==3){
                                        echo '  <div class="resultIcon hiddenText "><i class="fa fa-check" aria-hidden="true"></i></div>
                                                <div class="resultIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                                                <div class="resultText">Remain No Enough!</div>
                                                <div class="resultText"><a href="index.php" class="btn btn-primary">OK</a></div>
                                             ';  
                                    }
                                }
                            ?>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


</body>

<?php include 'config.php'; ?>

</html>