var base_url = 'http://localhost/shangarcollection/';

function delete_link(path)
{
    $url = base_url + 'delete/' + path;
    $("#delete_link").attr('href', $url);
}

function set_combo(action, id)
{
    var c = 0;
    $("#" + action).html("<option>Loading..</option>");
    var cc = setInterval(function () {

        c++;
        if (c == 1)
        {
            clearInterval(cc);
            $data = {id: id};
            var url = base_url + 'backend/' + action;

            $.post(url, $data, function (output) {
                $("#" + action).html(output);
            });
        }


    }, 1000);

}


$("#show_hide_password i").on('click', function (event) {
    event.preventDefault();
    if ($('#show_hide_password input').attr("type") == "text") {
        $('#show_hide_password input').attr('type', 'password');
        $('#ic_Eye').removeClass("post-icon os-icon os-icon-eye");
        $('#ic_Eye').addClass("post-icon os-icon os-icon-eye-off");

    } else if ($('#show_hide_password input').attr("type") == "password") {
        $('#show_hide_password input').attr('type', 'text');
        $('#ic_Eye').removeClass("post-icon os-icon os-icon-eye-off");
        $('#ic_Eye').addClass("post-icon os-icon os-icon-eye");

    }

});

$("#show_hide_password1 i").on('click', function (event) {
    event.preventDefault();
    if ($('#show_hide_password1 input').attr("type") == "text") {
        $('#show_hide_password1 input').attr('type', 'password');
        $('#ic_Eye1').removeClass("post-icon os-icon os-icon-eye");
        $('#ic_Eye1').addClass("post-icon os-icon os-icon-eye-off");

    } else if ($('#show_hide_password1 input').attr("type") == "password") {
        $('#show_hide_password1 input').attr('type', 'text');
        $('#ic_Eye1').removeClass("post-icon os-icon os-icon-eye-off");
        $('#ic_Eye1').addClass("post-icon os-icon os-icon-eye");

    }

});


$("#show_hide_password2 i").on('click', function (event) {
    event.preventDefault();
    if ($('#show_hide_password2 input').attr("type") == "text") {
        $('#show_hide_password2 input').attr('type', 'password');
        $('#ic_Eye2').removeClass("post-icon os-icon os-icon-eye");
        $('#ic_Eye2').addClass("post-icon os-icon os-icon-eye-off");

    } else if ($('#show_hide_password2 input').attr("type") == "password") {
        $('#show_hide_password2 input').attr('type', 'text');
        $('#ic_Eye2').removeClass("post-icon os-icon os-icon-eye-off");
        $('#ic_Eye2').addClass("post-icon os-icon os-icon-eye");

    }

});


$("#show_hide_password3 i").on('click', function (event) {
    event.preventDefault();
    if ($('#show_hide_password3 input').attr("type") == "text") {
        $('#show_hide_password3 input').attr('type', 'password');
        $('#ic_Eye3').removeClass("ecicon eci-eye");
        $('#ic_Eye3').addClass("ecicon eci-eye-slash");

    } else if ($('#show_hide_password3 input').attr("type") == "password") {
        $('#show_hide_password3 input').attr('type', 'text');
        $('#ic_Eye3').removeClass("ecicon eci-eye-slash");
        $('#ic_Eye3').addClass("ecicon eci-eye");

    }

});

$("#show_hide_password4 i").on('click', function (event) {
    event.preventDefault();
    if ($('#show_hide_password4 input').attr("type") == "text") {
        $('#show_hide_password4 input').attr('type', 'password');
        $('#ic_Eye4').removeClass("ecicon eci-eye");
        $('#ic_Eye4').addClass("ecicon eci-eye-slash");

    } else if ($('#show_hide_password4 input').attr("type") == "password") {
        $('#show_hide_password4 input').attr('type', 'text');
        $('#ic_Eye4').removeClass("ecicon eci-eye-slash");
        $('#ic_Eye4').addClass("ecicon eci-eye");

    }

});

$("#show_hide_password5 i").on('click', function (event) {
    event.preventDefault();
    if ($('#show_hide_password5 input').attr("type") == "text") {
        $('#show_hide_password5 input').attr('type', 'password');
        $('#ic_Eye5').removeClass("ecicon eci-eye");
        $('#ic_Eye5').addClass("ecicon eci-eye-slash");

    } else if ($('#show_hide_password5 input').attr("type") == "password") {
        $('#show_hide_password5 input').attr('type', 'text');
        $('#ic_Eye5').removeClass("ecicon eci-eye-slash");
        $('#ic_Eye5').addClass("ecicon eci-eye");

    }

});


$('#allcheck').change(function () {
    var checkbox = $(this).parent().parent().parent().parent().parent().find('tbody tr td input');
    var attr = $(this).attr('checked');
    if (checkbox.is(':checked')) {
        checkbox.removeAttr('checked');
    } else {
        checkbox.attr('checked', 'checked');
    }
});

function set_counter( id , limit )
{
    var c=0;
    var cc = setInterval(function ()
    {
        c++;
        if( c <= limit )
        {
            $("#" + id).html( c );
        }
        else
        {
            clearInterval(cc);
        }
    } , 80 );
}

var loadFile = function (event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function () {
        URL.revokeObjectURL(output.src) // free memory
    }
};

function delete_link(path)
{
    $url = base_url + 'delete/' + path;
    $("#delete_link").attr('href', $url);
}

function subscribe()
{
    $email = $("#email").val();

    //blank validation
    if ($email.length > 0)
    {
        //pattern matching
        var ptn = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if ($email.match(ptn))
        {
            $data = {email: $email};

            $path = base_url + 'backend/subscribe';
            $.post($path, $data, function (output)
            {
                if (output == 1)
                {
                    $("#email").val("");
                    $("#msg").notify("Thank You for Subscribe With Us.", {position: "button center", className: 'superblue'});
                }
                if (output == 2)
                {
                    $("#email").val("");
                    $("#msg").notify("You Already Subscribe With Us.", {position: "button center", className: 'superblue'});
                }
            });
        } else
        {
            $("#msg").notify("Please Enter valid Email.", {position: "button center", className: 'superblue'});
        }
    } else
    {
        $("#msg").notify("Please Enter Email.", {position: "button center", className: 'superblue'});
    }
}

function change_status(action, id)
{
    if ($("#status_" + id).hasClass("pre-post os-icon os-icon-toggle-right"))
    {
        $("#status_" + id).removeClass("pre-post os-icon os-icon-toggle-right").addClass("pre-icon os-icon os-icon-toggle-left");
        $("#status_" + id).attr('data-bs-original-title', 'Deactive');
        $("#status_" + id).attr('data-original-title', 'Deactive');
        $("#status_" + id).css('color', '#000');
    } else
    {
        $("#status_" + id).removeClass("pre-icon os-icon os-icon-toggle-left").addClass("pre-post os-icon os-icon-toggle-right");
        $("#status_" + id).attr('data-bs-original-title', 'Active');
        $("#status_" + id).attr('data-original-title', 'Active');
        $("#status_" + id).css('color', '#5156be');
    }
    $data = {action: action, id: id};
    $path = base_url + 'backend/change_status/';
    $.post($path, $data);

}


function order_status( bill_id,status )
{
    if( confirm('Are you sure want to perform this action on order ?'))
    {
        $data = {bill_id: bill_id, status: status};
        $path = base_url + 'backend/order_status/';
        $.post($path, $data ,function(output){
//            alert(output);
        $("#dataTable1").html(output);
        });
        
    }
}


// banner page - photo preview - js
document.getElementById('setPhoto').onchange = evt => {
    const [file] = document.getElementById('setPhoto').files;
    if (file) {
        $('#preview').css('display', 'block').show(500).attr('src', URL.createObjectURL(file));
    }
}
// change-profile -photo prevuew - js

document.getElementById('rounded-circle').onchange = evt => {
    const [file] = document.getElementById('rounded-circle').files;
    if (file) {
        $('#preview').show(500).attr('src', URL.createObjectURL(file));
        $('#ipreview').addClass('test');
    }
}



function change_image(id)
{
    
    $data = {id: id};
    $path = base_url + 'backend/change_image/';
    $.post($path, $data, function (output) {
        //alert(output);
        $("#color_preview").html(output);
    });
}

function cart_btn(id)
{
    
    $data = {id: id};
    $path = base_url + 'backend/cart_btn/';
    $.post($path, $data, function (output) {
        //alert(output);
        $("#cart_btn_area").html(output);
        stock_status(id);
    });
}

function stock_status(id)
{
    
    $data = {id: id};
    $path = base_url + 'backend/stock_status/';
    $.post($path, $data, function (output) {
        //alert(output);
        $("#stock_status").html(output);
    });
}


function add_wish(pid)
{
     if($("#wish_btn"+pid+" i").hasClass('ecicon eci-heart'))
    {
        $("#wish_btn"+pid+" i").removeClass('ecicon eci-heart').addClass('ecicon eci-heart-o');
        $("#wish_btn"+pid+" i").css('color','#888');
    }
    else
    {
        $("#wish_btn"+pid+" i").removeClass('ecicon eci-heart-o').addClass('ecicon eci-heart');
        $("#wish_btn"+pid+" i").css('color','red');
    }

    $data = {pid: pid};
    $path = base_url + 'backend/wishlist/';
    $.post($path, $data, function (output) {
        //alert(output);
    });

}

function add_cart(pid)
{
    if($("#cart_btn"+pid+" i").hasClass('ecicon eci-cart-arrow-down'))
    {
        $("#cart_btn"+pid+" i").removeClass('ecicon eci-cart-arrow-down').addClass('ecicon eci-cart-plus');
        $("#cart_btn"+pid+" i").css('color','#003eff');
    }
    

    $data = {pid: pid};
    $path = base_url + 'backend/add_cart/';
    $.post($path, $data, function (output) {
        if( output == 1 )
        {
            header_cart();
        }
    });

}

function apply_code()
{
    $code = $("#code").val();
    
    $data = { code:$code };
    $path = base_url + 'backend/apply_code/';
    $.post($path, $data, function (output) {
//        alert(output);
          if( output == 1 )
          {
              $("#codemsg").html('<font class="text-success">'+ $code +' Applied Successfully</font>');
              order_summary();
          }
          else
          {
              $("#codemsg").html('<font class="text-danger">Sorry, Invalid Promocode</font>');
          }
          $("#code").val('');
    });
}

function add_cart_detail(pid)
{
    $data = {pid: pid};
    $path = base_url + 'backend/add_cart/';
    $.post($path, $data, function (output) {
        if( output == 1 )
        {
            $("#cart_btn_area").html('<div class="ec-single-cart " style="cursor: pointer;"><button class="btn btn-primary" style="background: #000">Already Added Cart</button></div>');
            header_cart();
        }
    });
}


function header_cart(pid)
{

    $path = base_url + 'backend/header_cart/';
    $.post($path, $data, function (output) {
       $("#headercart_data").html(output);
    });

}

function change_qty( cart_id , qty)
{
    $data = { cart_id:cart_id , qty:qty };
    $path = base_url + 'backend/change_qty/';
    $.post($path, $data, function (output) {
       if( output == 1 )
       {
           cartdata();
       }
    });
}

function remove_cart( cart_id )
{
    if( confirm('Are you sure want to remove this item.'))
    {
        $data = { cart_id:cart_id };
    $path = base_url + 'backend/remove_cart/';
    $.post($path, $data, function (output) {
       if( output == 1 )
       {
           cartdata();
           header_cart();
       }
    });
    }
}

function remove_wish( wish_id )
{
    if( confirm('Are you sure want to remove this item.'))
    {
    $data = { wish_id:wish_id };
    $path = base_url + 'backend/remove_wish/';
    $.post($path, $data, function (output){
    location.reload(true);
    });
    }
}

function remove_review( review_id )
{
    if( confirm('Are you sure want to remove this item.'))
    {
    $data = { review_id:review_id };
    $path = base_url + 'backend/remove_review/';
    $.post($path, $data, function (output){
    location.reload(true);
    });
    }
}

function remove_address( shipment_id )
{
    if( confirm('Are you sure want to remove this item.'))
    {
    $data = { shipment_id:shipment_id };
    $path = base_url + 'backend/remove_address/';
    $.post($path, $data, function (output){
    location.reload(true);
    });
    }
}



function cartdata()
{    
    $path = base_url + 'backend/cartdata/';
    $.post($path, $data, function (output) {
       $("#cartdata").html(output);
    });   
}

function select_address( id )
{    
    $data = { id:id };
    $path = base_url + 'backend/select_address/';
    $.post($path, $data, function (output) {
       $("#shipment_area").html(output);
//    alert(output);
    });   
}

function order_summary( )
{    
    
    $path = base_url + 'backend/order_summary/';
    $.post($path, $data, function (output) {
       $("#order_summary").html(output);
//    alert(output);
    });   
}


function product_data( action , id , limit )
{
            
    var c = 0;
    
    $("#product-data").html("<div style='text-align: center;'><h2 class='ec-title-lds'><span><br/><br/><br/><br/><br/>Searching Products...</span></h2></div>");
    
    var cc = setInterval( function(){
        
        c++;
        if( c == 1)
        {
            clearInterval(cc);
            
            $filter_data = $("#filter-data").serializeArray();
            
            $data = { action:action,id:id,limit:limit, filter_data:$filter_data };
            $path = base_url + 'backend/product_data/';
            $.post($path, $data, function (output) {
            //alert(output);
            $("#product-data").html(output);
            
                }); 
        
        }
    },1000 )
    
}

function add_review(pid)
{
    var rate = $("#rate-value").val();
    var msg = $("#review-msg").val();
            
     if( rate == "" || msg == "" )
     {
      $("#msg").html('<span class="text-danger">Please select rating and enter review massege.</span>') 
     }
     else
     {
        $data = { rate:rate,msg:msg,pid:pid };
        $path = base_url + 'backend/add_review/';
        $.post($path, $data, function (output) {
        if( output == 1 )
        {
            $("#msg").html('<span class="text-success">Thank You For giving review.</span>');
            $("#rate-value").val('');
            $("#review-msg").val('');
        }
    });
     }
}

