<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShoppingCart</title>
</head>

<script>
window.onload = function() {
    showCartItem();
    CartCalculateTotal();
}
</script>


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

            <div class="col-6"></div>
        </div>
        <form id="cartSubmit" action="handler.php" method="POST">
            <input type="hidden" name="case" value="4" />
            <div id="cartInsert">

            </div>
        </form>
        <div class="row theme1" style="padding: 0px !important; margin:0px !important;">
            <div class="col-12 ">
                <div class="d-flex justify-content-center align-items-center shopingCartArea">
                    <div class="shoppingCartCard align-items-center">
                        <div class="scTitle">Your Order is ready as below:</div>
                        <div class="scListContainer" id="scListContainer">
                            <!--can be scoll-->



                        </div>
                        <div class="scTotal">
                            <span>Total:HK$ </span><span id="totalPrice">0</span>
                        </div>
                        <div class="scReminder">
                            Reminder: Sometimes to understand a word's meaning you need more than a definition. At
                            YourDictionary we try to give you all of the tools you need to really understand what
                            the word means. Seeing the word in a sentence can provide more context and relevance.
                        </div>
                        <button id="submitCart" class="btn btn-block btn-primary" style="margin-top:10px"
                            onclick="submitCart()">Buy
                            Now</button>
                    </div>
                </div>

            </div>
        </div>

    </div>


</body>

<script>

</script>

<?php include 'config.php'; ?>

</html>