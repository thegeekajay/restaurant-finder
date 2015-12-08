jQuery(document).ready(function($) {

    $('#login').on('submit', function(e) {
        $('#signin_spinner').css('display', 'inline');
        $.ajax({
            type: "POST",
            url: 'api/users/login.php',
            data: $("#login").serialize(),
            success: function(data) {
                data = $.parseJSON(data);
                if (data.status == "success") {
                    location.reload();
                } else {
                    $('#signin_spinner').css('display', 'none');
                    $string = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Error!</strong> <span id="signup_error">' + data.error_text + '</span></div>';
                    $('#signup_error_block').show();
                    $('#signup_error_block').html($string);
                }
            }
        });
        return false;
    });

    $('#register_form').on('submit', function(e) {
        $('#register_spinner').css('display', 'inline');
        $.ajax({
            type: "POST",
            url: './api/users/register.php',
            data: $("#register_form").serialize(), // serializes the form's elements.
            success: function(data) {
                data = $.parseJSON(data);
                if (data.status == "success") {
                    location.reload();
                } else {
                    $('#register_spinner').css('display', 'none');
                    $('#register_error_block').show();
                }
            }
        });
        return false;
    });

    $('#add_new_restaurant').on('submit', function(e) {
        $('#register_spinner').css('display', 'inline');
        $.ajax({
            type: "POST",
            url: './api/restaurant/createRestaurant.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                data = $.parseJSON(data);
                if (data.status == "success") {
                    $('#add_new_restaurant')[0].reset();
                    $(location).attr('href', '/dashboard.php');
                } else {
                    $('#register_spinner').css('display', 'none');
                }
            }
        });
        return false;
    });

    $('#edit_restaurant').on('submit', function(e) {
        $('#register_spinner').css('display', 'inline');
        $.ajax({
            type: "POST",
            url: './api/restaurant/editRestaurant.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                data = $.parseJSON(data);
                console.log(data);
                if (data.status == "success") {
                    $(location).attr('href', '/dashboard.php');
                } else {
                    $('#register_spinner').css('display', 'none');
                }
            }
        });
        return false;
    });

    $('.delete-restaurant').on('click', function(e) {
        e.preventDefault();
        var $ele = $(this);
        var restaurant_id = $ele.attr('restaurant-id');
        $.ajax({
            type: "POST",
            url: './api/restaurant/deleteRestaurant.php',
            data: {
                id: restaurant_id
            },
            success: function(data) {
                data = $.parseJSON(data);
                if (data.status == "success") {
                    var item = $ele.parent().parent();
                    item.next().remove();
                    item.remove();
                } else {

                }
            }
        });
        return false;
    });

    $('#add_menu_item').on('submit', function(e) {
        $('#menu_spinner').css('display', 'inline');
        $.ajax({
            type: "POST",
            url: './api/restaurant/menu/addMenuItem.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                data = $.parseJSON(data);
                if (data.status == "success") {
                    if ($('.no_menu_item').length) {
                        $('.no_menu_item').remove();
                    }
                    var str = '<div class="row" menu-id="' + data.menu.id + '"><div class="col-sm-2"><img src="' + data.menu.image + '" class="img-responsive" style="border-radius:10px"></div><div class="col-sm-8"><h4>' + data.menu.item + ' - $' + data.menu.price + '</h4><h5>' + data.menu.detail + '</h5></div><div class="col-sm-2" menu-item-id="' + data.menu.id + '" restaurant-id="' + data.menu.restaurant_id + '" menu-item-item="' + data.menu.item + '" menu-item-detail="' + data.menu.detail + '" menu-item-price="' + data.menu.price + '"><button class="btn btn-sm btn-info menu_item_edit"><i class="fa fa-pencil"></i></button> <button class="btn btn-sm btn-danger menu_item_delete"><i class="fa fa-trash-o"></i></button></div></div><hr>';
                    $('.menu_item').append(str);
                    $('#add_menu_item')[0].reset();
                    $('#menu_spinner').css('display', 'none');

                } else {
                    $('#menu_spinner').css('display', 'none');
                }
            }
        });
return false;
});

$('body').on('click', '.menu_item_edit', function(e) {
    var $menuid = $(this).parent().attr('menu-item-id');
    var $item = $(this).parent().attr('menu-item-item');
    var $detail = $(this).parent().attr('menu-item-detail');
    var $price = $(this).parent().attr('menu-item-price');

    $("#menu-item-edit input[name=menu_id]").val($menuid);
    $("#menu-item-edit input[name=item]").val($item);
    $("#menu-item-edit input[name=detail]").val($detail);
    $("#menu-item-edit input[name=price]").val($price);

    $('.edit-menu-item').modal('show');

});

$('body').on('click', '.menu_item_delete', function(e) {
    var $id = $(this).parent().attr('menu-item-id');
    var $restaurant_id = $(this).parent().attr('restaurant-id');
    $.ajax({
        type: "POST",
        url: './api/restaurant/menu/deleteMenuItem.php',
        data: {
            id: $id,
            restaurant_id: $restaurant_id
        },
        success: function(data) {
            data = $.parseJSON(data);
            if (data.status == "success") {
                var menu_item = $('div[menu-id=' + $id + ']');
                menu_item.next().remove();
                menu_item.remove();
            } else {

            }
        }
    });
});

$('#menu-item-edit').on('submit', function(e) {
    $('#menu-item-edit-spinner').css('display', 'inline');
    $.ajax({
        type: "POST",
        url: './api/restaurant/menu/editMenuItem.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            data = $.parseJSON(data);
            if (data.status == "success") {
                var menuid = $('#menu-item-edit input[name=menu_id]').val();
                var str = '<div class="col-sm-2"><img src="' + data.menu.image + '" class="img-responsive" style="border-radius:10px"></div><div class="col-sm-8"><h4>' + data.menu.item + ' - $' + data.menu.price + '</h4><h5>' + data.menu.detail + '</h5></div><div class="col-sm-2" menu-item-id="' + data.menu.id + '" menu-item-item="' + data.menu.item + '" menu-item-detail="' + data.menu.detail + '" menu-item-price="' + data.menu.price + '"><button class="btn btn-sm btn-info menu_item_edit"><i class="fa fa-pencil"></i></button> <button class="btn btn-sm btn-danger menu_item_delete"><i class="fa fa-trash-o"></i></button></div>';
                $('[menu-id=' + menuid + ']').html(str);
                $('.edit-menu-item').modal('hide');
                $('#menu-item-edit')[0].reset();
                $('#menu-item-edit-spinner').css('display', 'none');
            } else {
                $('#menu-item-edit-spinner').css('display', 'none');
            }
        }
    });
return false;
});
$.fn.myFunction = function() {
    var total = 0;
    $('.price').each(function() {
        total = total + parseInt($(this).html());
    });
    $('#order_total').html(total);

}
$('.add-menu-item').on('click', function(e) {
    var itemId = parseInt($(this).attr('item-id'));
    var itemName = $(this).attr('item-name');
    var itemPrice = parseInt($(this).attr('item-price'));
        if ($('.order div[item-id=' + itemId + ']').length > 0) //items exist
        {
            var quantity = $('.order [item-id="' + itemId + '"] .quantity').html();
            quantity = parseInt(quantity) + 1;
            var price = parseInt(itemPrice) * parseInt(quantity);
            $('.order [item-id="' + itemId + '"] .quantity').html(quantity);
            $('.order div[item-id="' + itemId + '"]').attr('item-quantity',quantity);
            $('.order [item-id="' + itemId + '"] .price').html(price);
        } else {
            var $str = '<div item-id="' + itemId + '" item-quantity="1" item-name="' + itemName + '" item-price="' + itemPrice + '"><div class="row"><div class="col-sm-2"><button class="btn btn-default quantity">1</button></div><div class="col-sm-10"><b>' + itemName + '</b></div></div><br><div class="row"><div class="col-sm-4"><div class="btn-group" role="group" aria-label="..."><button type="button" class="btn btn-default item-minus" item-id="' + itemId + '"><i class="fa fa-minus"></i></button><button type="button" class="btn btn-default item-add" item-id="' + itemId + '"><i class="fa fa-plus"></i></button></div></div><div class="col-sm-8"><h3>$<span class="price">' + itemPrice + '</span></h3></div></div></div><hr>';
            $('.order').append($str);
        }
        $.fn.myFunction();
    });

$('body').on('click', '.item-add', function() {
    var itemId = parseInt($(this).attr('item-id'));
    var itemPrice = parseInt($(this).closest('[item-price]').attr('item-price'));
    var quantity = $('.order [item-id="' + itemId + '"] .quantity').html();
    quantity = parseInt(quantity) + 1;
    var price = parseInt(itemPrice) * parseInt(quantity);
    $('.order [item-id="' + itemId + '"] .quantity').html(quantity);
    $('.order div[item-id="' + itemId + '"]').attr('item-quantity',quantity);
    $('.order [item-id="' + itemId + '"] .price').html(price);
    $.fn.myFunction();

});

$('body').on('click', '.item-minus', function() {
    var itemId = parseInt($(this).attr('item-id'));
    var itemPrice = parseInt($(this).closest('[item-price]').attr('item-price'));
    var quantity = parseInt($('.order [item-id="' + itemId + '"] .quantity').html());
    if (quantity > 1) {
        quantity = parseInt(quantity) - 1;
        var price = parseInt(itemPrice) * parseInt(quantity);
        $('.order [item-id="' + itemId + '"] .quantity').html(quantity);
        $('.order div[item-id="' + itemId + '"]').attr('item-quantity',quantity);
        $('.order [item-id="' + itemId + '"] .price').html(price);
    } else {
        var ele = $('.order div[item-id="' + itemId + '"]');
        ele.next().remove();
        ele.remove();
    }
    $.fn.myFunction();
});

$('.checkout').on('click',function(e){
  e.preventDefault();
  var url = '/api/restaurant/orders/newOrder.php';
  var form = '<form id="checkout-form" action="' + url + '" method="post">';
  $('.order>div').each(function(){
    var itemId = $(this).attr('item-id');
    var itemQuantity = $(this).attr('item-quantity');
    var itemPrice = $(this).attr('item-price'); 
    form+='<input type="hidden" name="'+itemId+'" value="'+itemQuantity+','+itemPrice+'"></input>';
});
  var restaurantId = $('.order').attr('restaurant-id');
  form+='<input type="hidden" name="restaurant_id" value="'+restaurantId+'"></input>';
  form+='</form>';
  $('body').append(form);
  $('#checkout-form').submit();
});

$('#credit_card').on('submit', function(e) {
    $('#credit_card_spinner').css('display', 'inline');
    $.ajax({
        type: "POST",
        url: './api/users/newCreditCard.php',
        data: $("#credit_card").serialize(),
        success: function(data) {
            data = $.parseJSON(data);
            if (data.status == "success") {
                $('#credit_card')[0].reset();
                location.reload();
            } else {
                $('#credit_card_spinner').css('display', 'none');
            }
        }
    });
    return false;
});

$('#delivery_address').on('submit', function(e) {
    $('#delivery_address_spinner').css('display', 'inline');
    $.ajax({
        type: "POST",
        url: './api/users/newDeliveryAddress.php',
        data: $("#delivery_address").serialize(),
        success: function(data) {
            data = $.parseJSON(data);
            if (data.status == "success") {
                $('#delivery_address')[0].reset();
                location.reload();
            } else {
                $('#delivery_address_spinner').css('display', 'none');
            }
        }
    });
    return false;
});

$('.address').on('click',function(){
    var ele = $(this);
    $('.address').each(function(){
        $(this).removeClass('selected-div').addClass('not-selected-div');
    });
    ele.addClass('selected-div');
});
$('.card').on('click',function(){
    var ele = $(this);
    $('.card').each(function(){
        $(this).removeClass('selected-div').addClass('not-selected-div');
    });
    ele.addClass('selected-div');
});

$('.confirm-payment').on('click',function(){
    if($('.address.selected-div').length == 0)
    {
        $('#address_error').show();
    }
    else{
        $('#address_error').hide();
    }
    if($('.card.selected-div').length == 0)
    {
        $('#card_error').show();
    }
    else{
        $('#card_error').hide();
    }
    if($('.card.selected-div').length == 1 && $('.address.selected-div').length == 1 )
    {
        var url = '/api/restaurant/orders/confirm-payment.php';
        var form = '<form id="confirm-payment" action="' + url + '" method="post">';
        var orderId = getUrlParameter('order-id');
        var cardId = $('.card.selected-div').attr('card-id') ;
        var addressId = $('.address.selected-div').attr('address-id') ;
        form+='<input type="hidden" name="id" value="'+orderId+'"></input>';
        form+='<input type="hidden" name="card_id" value="'+cardId+'"></input>';
        form+='<input type="hidden" name="address_id" value="'+addressId+'"></input>';
        form+='</form>';
        $('body').append(form);
        $('#confirm-payment').submit();
    }

});

$('#new-review').on('submit', function(e) {
        $('#review_spinner').css('display', 'inline');
        $.ajax({
            type: "POST",
            url: 'api/restaurant/reviews/addReview.php',
            data: $("#new-review").serialize(),
            success: function(data) {
                data = $.parseJSON(data);
                if (data.status == "success") {
                    location.reload();
                } else {
                    $('#review_spinner').css('display', 'none');
                }
            }
        });
        return false;
    });

});


var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};