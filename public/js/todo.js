$( document ).ready(function() {
    var link='http://127.0.0.1:8000'
    var quantity = []
    function rmFromCart(){
        $('.btn_Rm_Cart').click(function (e){
            product_id=$(this).parent().children().get(0).value
            order_id=$(this).parent().children().get(1).value
            rmIndex=findRow3($(this).parent().parent().parent()[0])
            if(typeof oldnumber[0]==='undefined')
                oldnumber.splice(0,1)

            oldnumber.splice(rmIndex-1,1)

            quantity = []
            $('.amount').each(function(index,e){
                if(index!=rmIndex-1)
                    quantity.push($(e).val())
            })
            console.log("quantity",quantity);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : link+"/order/rmFromCart",
                data : {
                    // '_token' : token,
                    'product_id' : product_id,
                    'order_id' : order_id
                },
                type : 'DELETE',
                dataType : 'json',
                success : function(result){
                    if(result['status']=="OK"){
                        alert("Xoa thanh cong")
                    }
                    // console.log("===== " +  + " =====");

                },
                complete : function(){
                    reloadTable()
                }
            });
        })
    }

    function reloadTable(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : link+"/order/edtCart",
            data : {
                'type' : 'api',
            },
            type : 'GET',
            dataType : 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },

            success : function(result){

                $(".tbody").empty()

                for(var i=0;i<result[0].length;i++)
                {

                if(typeof quantity[i]==='undefined'){
                    amountVal=1
                }
                else
                    amountVal=quantity[i];
                $(".tbody").append(
                "<tr>"+
                "<td scope='row'>"+result[0][i]['id']+"</td>"+
                "<td><img src='"+link+"/images/"+result[2][i]['name']+"' class='img-item' alt=''></td>"+
                "<td>"+result[0][i]['name']+"</td>"+
                "<td>"+result[0][i]['price']+"</td>"+
                "<td>0</td>"+
                "<td>"+
                "<div>"+
                    "<button type='button' class='btn_minus'>-</button>"+
                    "<input class='amount' value='"+amountVal+"' style='width: 35px'>"+
                    "<button type='button' class='btn_plus'>+</button>"+
                "</div>"+
                    "Tồn kho"+
                    "<span class='inventory'>"+result[0][i]['quantity']+"</span>"+
                    // '<div class='amount'>1</div>'+
                    // 'Tồn kho '+result[0][i]['quantity']+''+
                "</td>"+
                "<td class='into_money'>"+result[0][i]['price']*amountVal+"</td>"+
                "<td>"+
                    "<form action='"+link+"/order.rmFromCart' method='post'>"+
                        "<input type='text' value='"+result[0][i]['id']+"' name='product_id' hidden>"+
                        "<input type='text' value='"+result[1]['id']+"' name='order_id' hidden>"+
                        "<button type='button' class='btn btn-danger btn_Rm_Cart'>DELETE</button>"+
                    "</form>"+
                "</td>"+
                "</tr>"
                );
                }
            },
            complete : function(){
                callFunc()
            }
        });
    }
    function addToCart(){
    $('.btn_Add_Cart').click(function (e){

        // CO NHIEU ID PHAI LAY DUNG ID !!!

        // e.preventDefault();
        token=$(this).parent().parent().children().get(0).value
        // // alert(token);
        product_id=$(this).parent().parent().children().get(1).value
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : link+"/order/addToCart",
            data : {
                // '_token' : token,
                'product_id' : product_id
            },
            type : 'POST',
            dataType : 'json',
            success : function(result){
                if(result['status']=="OK"){
                    alert("Them thanh cong")
                }
                // console.log("===== " +  + " =====");

            }
        });
    })
    }

    function clickMinus(){
    $('.btn_minus').click(function(){
        amount = $(this).parent().children().get(1).value;
        if(amount>1){
            amount-=1
            $(this).parent().children().eq(1).val(amount);
            updateToMoney($(this),amount)
        }
        // $(this).parent().children().eq(1).val(amount)

    })
    }

    function clickPlus(){
        $('.btn_plus').click(function(){
            amount = parseInt($(this).parent().children().eq(1).val());
            inventory = $(this).parent().parent().children().get(1).textContent;
            if(inventory>amount){
                amount+=1
                inventory = $(this).parent().parent().children().get(1).textContent;
                $(this).parent().children().eq(1).val(amount)
                updateToMoney($(this),amount)
            }
            // $(this).parent().children().eq(1).val(amount)
            // $(this).parent().children().eq(1).val(amount);

        })
    }

    oldnumber=[];
    function amountChange(){

    $('.amount').change(function(){
        index=findRow3($(this).parent().parent().parent()[0]);
        if(typeof oldnumber[index] === 'undefined')
            oldnumber[index] = 1
        amount=$(this).val()
        if(parseInt($(this).val())!=amount){
            amount=oldnumber[index]
            $(this).val(amount)

        }
        inventory = $(this).parent().parent().children().get(1).textContent;

        if(amount>parseInt(inventory)||amount<1)
        {
            $(this).val(oldnumber[index])

        }
        else{
            oldnumber[index]=amount
            updateToMoney($(this),amount)
        }
    })
    }

    function findRow3(node)
    {
        var i = 1;
        while (node = node.previousSibling) {
            if (node.nodeType === 1) { ++i }
        }
        return i;
    }

    function updateToMoney(node,amount){
        // console.log(node.parent().parent().parent().children().eq(6));
        price=node.parent().parent().parent().children().get(3).textContent
        promote=node.parent().parent().parent().children().get(4).textContent
        node.parent().parent().parent().children().get(6).textContent=parseInt(price)*parseInt(amount)-parseInt(promote);
        updateTotalMoney()
        //
    }

    function updateTotalMoney(){
        total = 0
        $('tbody').children().each(function(index,e){
            total+=parseInt($(e).children().get(6).textContent)
        })
        $('#total_money').textContent=total
        console.log($('#total_money').get(0).textContent=total)
        console.log(total);
    }

    function saveCart(){
        product_ids=[]
        amounts=[]
        $('tbody').children().each(function(index,e){
            product_ids.push($(e).children().eq(0)[0].textContent)
        })
        $('tbody').children().each(function(index,e){
            amounts.push($(e).children().eq(5).children().eq(0).children().eq(1).val())
        })
        order=$('.order_id')[0].textContent
        order_id=parseInt(order.slice(10,order.length))

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url : link+"/order/saveCart",
            data : {
                // '_token' : token,
                'product_ids' : product_ids,
                'amounts' : amounts,
                'order_id' : order_id
            },
            type : 'POST',
            dataType : 'json',
            success : function(result){

            }
        });
    }

    function leaveCart(){
        $(window).on('beforeunload', function(){
            if(document.location.toString().includes(link+"/order/edtCart")){
                saveCart()
            }

      });
    }
    function callFunc(){
        rmFromCart();
        addToCart();
        amountChange();
        clickPlus();
        clickMinus();
        leaveCart();
        updateTotalMoney();
        // updateToMoney();
    }

    callFunc()
});
