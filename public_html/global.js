function showCartItem(){
    var items = JSON.parse(localStorage.getItem('Cart'));
    var HTMLString = "";

    if(localStorage.getItem('Cart')===null){
        document.getElementById("submitCart").disabled = true;
        return;
    }

    for(var i=0;i<items.length;i++){

        var item = items[i];
        if(item==-1)
             continue;

        HTMLString  += ` <div id="item`+i+`" style="display:block">
                            <div class="scItemGroup d-flex">
                                <div class="scItemImg ">
                                    <img src="`+item.iconPath+`" alt="iphone" width="80px" height="80px">
                                </div>
                                <div class="scInfoGroup ">
                                    <div class="scItem ">
                                        `+item.title+`
                                    </div>
                                    <div class="customCardDescript ">`+item.description+`
                                    </div>
                                    <div>
                                        HK$<span>`+item.price+`</span> &nbsp <span>`+item.model+`</span> &nbsp<span>`+item.color+`</span>
                                    </div>
                                </div>
                                <div class="scSelect ">
                                    <select id="NumSelectInCart`+i+`" class="custom-select custom-select-sm" onchange="changeInCart(`+i+`)">`;
                                    
                                    for(var j=1;j<=99;j++){
                                        if(j==item.number)
                                            HTMLString += "<option selected value='"+j+"'>"+j+"</option>";
                                        else{
                                            HTMLString += "<option value='"+j+"'>"+j+"</option>";
                                        }
                                    }


        HTMLString+=                `</select>
                                </div>
                                <div class="scDel d-flex">
                                    <button class="btn algin-items-center" onclick="removeItemInCart(`+i+`);"><i
                                            class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </div>
                            </div>

                        </div>
                    `;
    }

    document.getElementById("scListContainer").innerHTML = HTMLString;


    
}


function addCart(){
    var id = document.getElementById("itemId").textContent;
    var color = document.getElementById("itemColor").value;
    var model = document.getElementById("itemModel").value;
    var iconPath = document.getElementById("itemPath").textContent;
    var price = document.getElementById("price").textContent;

    var number = document.getElementById("itemNum").value;
    var title = document.getElementById("title").textContent;
    var description = document.getElementById("descrption").textContent;

    var oldObj = JSON.parse(localStorage.getItem('Cart')) || [];

    var modelInfo = {
        id:id,
        iconPath:iconPath,
        title:title,
        description:description,
        price:price,
        color:color,
        model:model,
        number:number
    };

    oldObj.push(modelInfo);
    localStorage.setItem("Cart",JSON.stringify(oldObj))

    updateNum();
}

function updateNum(){

    if(localStorage.getItem('Cart')===null){
        return;
    }

    var items = JSON.parse(localStorage.getItem('Cart'));
    var total = 0;

    for(var i=0;i<items.length;i++){
        if(items[i]!=-1){
            total +=1;
        }
    }

    if(total==0){
        localStorage.removeItem('Cart');
    }
    var str = '<i class="fa fa-shopping-cart" aria-hidden="true"></i>';
    document.getElementById("CartNum").innerHTML = str+total;
}



function removeItemInCart(number){
    var id = document.getElementById("item"+number);
    id.style.display="none";
    var oldObj = JSON.parse(localStorage.getItem('Cart'));
    oldObj[number]=-1;
    localStorage.setItem("Cart",JSON.stringify(oldObj));

    CartCalculateTotal();   
}





function filterItem(number){

    if(number==0){
        $('.class1').css('display','block');
        $('.class2').css('display','block');
        $('.class3').css('display','block');
    }else{
        $('.class1').css('display','none');
        $('.class2').css('display','none');
        $('.class3').css('display','none');

        $('.class'+number).css('display','block');

    }

}

function changeDetailIcon(number){
    var icon = document.getElementById("mainIcon");
    icon.style.backgroundImage = "url('static/iphone/"+number+".png')";
}

function releaseInput(itemId,itemSelf){
    var item = document.getElementById(itemId);
    var itemself = document.getElementById(itemSelf);
    item.readOnly=false;
    itemself.style.display="none";

    if(itemId=="editPwd"){
        var rpPwd = document.getElementById("RpPwdGroup");
        rpPwd.style.display="flex"
    }
    var changed = document.getElementById("changedBtn");
    changed.disabled=false;
    var cancel = document.getElementById("cancelBtn");
    cancel.style.display="block";
}


function validForm1(){
    idList = ["editName","editEmail","editPhone","editDate","editAddress","editPwd"]

    result = ""
    result += genCheck(idList[0])
    result += genCheck(idList[1])
    result += genCheck(idList[2])
    result += genCheck(idList[3])
    result += genCheck(idList[4])

    if(document.getElementById("changePwdbtn").style.display == "none")
      result += pwdCheck(idList[5]);
    var all = true;
    for(var i=0; i <result.length;i++){
        if(result[i] !="0"){
            all = false;
            var alertId = idList[i]+"_error"+result[i];
            $("#"+alertId).css("display","block")
        }
    }

    if(all){
        for(var j=0;j<idList.length;j++){
            $("#modify"+(j+1)).val($("#"+idList[j]).val());
        }
        document.getElementById("modifyForm").submit();

    }
}

function clearAll(){
    $(".passwordWrongAlert").css("display","none");
}


function genCheck(id){
    if($("#"+id).val() == null || $("#"+id).val() == "" ){
        return "1";
    }else{
        return "0";
    }
}

function pwdCheck(id){
    if($("#"+id).val() == null || $("#"+id).val() == "" ){
        return "1";
    }else if($("#"+id).val() != $("#editRpPwd").val()){
        return "2";
    }
    else{
        return "0";
    }
}

function validForm2(){
    var idList = ["editID","editName","editEmail","editPhone","editDate","editAddress","editPwd","editQuestion"];

    var result = "";
    result += genCheck(idList[0]);
    result += genCheck(idList[1]);
    result += genCheck(idList[2]);
    result += genCheck(idList[3]);
    result += genCheck(idList[4]);
    result += genCheck(idList[5]);
    result += pwdCheck(idList[6]);
    result += genCheck(idList[7]);

    var all = true;

    for(var i=0; i <result.length;i++){
        if(result[i] !="0"){
            all = false;
            var alertId = idList[i]+"_error"+result[i];
            $("#"+alertId).css("display","block");
        }
    }

    if(all){
        document.getElementById("registerForm").submit();
    }
}

function validForm3(){
    var idList =["loginUser","loginPwd"];
    var result = "";
    var all = true;
    result += genCheck(idList[0]);
    result += genCheck(idList[1]);
    
    for(var i=0; i <result.length;i++){
        if(result[i] !="0"){
            all = false;
            var alertId = "loginUser_error"+result[i];
            $("#"+alertId).css("display","block")
        }
    }

    if(all){
        document.getElementById("loginForm").submit();
    }

}

function validForm4(){
    var userId= document.getElementById("loginUser").value;
    var idList =["loginUser"];
    var result = "";
    result += genCheck(idList[0]);
    for(var i=0; i <result.length;i++){
        if(result[i] !="0"){
            var alertId = "loginUser_error"+result[i];
            $("#"+alertId).css("display","block")
        }else{
            window.location.href='forgot.php?userId='+userId;
        }
    }
}

function validForm5(){
    var idList =["answerId","newpwdId"];
    var result = "";
    var all = true;
    result += genCheck(idList[0]);
    result += genCheck(idList[1]);

    for(var i=0; i <result.length;i++){
        if(result[i] !="0"){
            all = false;
            var alertId = idList[i]+"_error"+result[i];
            $("#"+alertId).css("display","block")
        }
    }

    if(all){
        //all correct
        document.getElementById("forgotForm").submit();
    }
}


function changeInCart(number){
    var id = document.getElementById("NumSelectInCart"+number);
    var oldObj = JSON.parse(localStorage.getItem('Cart'));
    oldObj[number].number = id.value;
    localStorage.setItem("Cart",JSON.stringify(oldObj));
    CartCalculateTotal();
}

function CartCalculateTotal(){
    var arr = JSON.parse(localStorage.getItem('Cart'));
    if(arr===null){
        document.getElementById("submitCart").disabled = true;
        return;
    }
    var total = 0;
    for(var i=0;i<arr.length;i++){
        if(arr[i]==-1)
            continue;
        
        var temp = arr[i].number * arr[i].price;
        total+=temp;
    }
    if(total==0){
        document.getElementById("submitCart").disabled = true;
    }
    document.getElementById("totalPrice").innerText = total;
}

function submitCart(){
    var items = JSON.parse(localStorage.getItem('Cart'));
    var HTMLString = "";
    for(var i=0;i<items.length;i++){

        var item = items[i];
        if(item==-1)
             continue;

        HTMLString  += `<input type="hidden" name="itemId[]" value="`+item.id+`" />`;
        HTMLString  += `<input type="hidden" name="model[]" value="`+item.model+`" />`;
        HTMLString  += `<input type="hidden" name="color[]" value="`+item.color+`" />`;
        HTMLString  += `<input type="hidden" name="number[]" value="`+item.number+`" />`;


    }

    document.getElementById("cartInsert").innerHTML = HTMLString;
    document.getElementById("cartSubmit").submit();

}

function removeAllCart(){
    localStorage.clear();
}